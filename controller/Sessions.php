<?php
include_once '../modal/database/Database.php';

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
        $_SESSION['followers']=$user[2];
        $_SESSION['following']=$user[3];
        print_r($user);
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
