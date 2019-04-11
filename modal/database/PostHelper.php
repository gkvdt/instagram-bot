<?php

include_once 'Database.php';

$db = new Database();

if($_POST){
    if($_POST['posttype']=='newaccound'){
        $db->addNewAccound($_POST['username'],$_POST['password']);
    }
}

?>