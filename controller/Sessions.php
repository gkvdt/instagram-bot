<?php
include_once '../modal/database/Database.php';
include_once 'AccoundHandler.php';



$database = new Database();
function sessionStart(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
}

sessionStart();

if(@$_GET){
    if(@$_GET['typ'] == 'login'){
        resetSession();
        $user = $database->getAccound($_GET['id']);
        $_SESSION['id']=$_GET['id'];
        $_SESSION['username']=$user[0];
        $_SESSION['password']=$user[1];
        updateAccoundDb();
        //print_r($user);
    }
    if(@$_GET['typ'] == 'logout'){
        resetSession();
    }
    header('location:../');
}
    function resetSession(){
        session_destroy();
        sessionStart();
    }

    
?>
