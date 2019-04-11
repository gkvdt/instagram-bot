var cUsername = true;
var cPassword = true;
$('#add-accound').submit(function(){
    var username = $('#username').val();
    var password = $('#password').val();
    var postType = 'newaccound';

    contUsername(username);
    contPassword(password);

    if(cUsername && cPassword){
        var values = {
            'posttype':postType,
            'username':username,
            'password':password
        };
    
        $.ajax({
            url:'modal/database/PostHelper.php',
            type:'post',
            data:values,
            success:function(response){
                console.log(response);
                
                if(response == 'ok'){
                    postSuccess();
                }else{
                    postError();
                }
            }
        })
    }else{
        dataNull();
    }
    return false;
});

function postSuccess(){
    alert('success');
}

function postError(){
    alert('error');
}
function contUsername(username){
    var leng = username.toString().length
    if (leng > 3) {
        cUsername=true;
    }else {
        cUsername = false;
    }
    return false;

}
function contPassword(password){
    var leng = password.toString().length
    if (leng > 3) {
        cPassword=true;
    }else {
        cPassword = false;
    }
    return false;
}

function dataNull() {
    alert("data null");
}