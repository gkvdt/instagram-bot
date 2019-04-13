<?php
include_once 'AccoundHandler.php';
class Actions{
    public function followPending(){
        $pending_users = getPendingFriendship();
        foreach($pending_users as $user){
            sendFollow($user['user']['pk']);
        }
        echo "ok";
    }
}


if($_GET){
    $act = new Actions();
    if($_GET['typ'] == "followpending"){
        $act->followPending();
    }else if($_GET['typ'] == 'unfollow'){
        unfAll();
    }
}


?>