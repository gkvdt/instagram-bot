<?php
use function GuzzleHttp\json_decode;
include_once '../controller/UserHelper.php';
include_once '../modal/session.php';
require '../vendor/autoload.php';
include_once '../modal/database/Database.php'; 

\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
$instagram = new \InstagramAPI\Instagram();

$userHelper = new UserHelper();
$database = new Database();
function loginAccound(){
    global $instagram;
    try{
        $instagram->login(@$_SESSION['username'],@$_SESSION['password']);
    }catch(\Exception $e){
        $e->getMessage();
    }
}

function getSelfFollowers(){
    loginAccound();

    global $instagram;

    try{
        $rankToken = \InstagramAPI\Signatures::generateUUID();
        $data= $instagram->people->getSelfFollowers($rankToken);
        $userData = json_decode($data,true);
        //print_r($userData);   
        return $userData;
    }catch(\Exception $e){
        echo $e->getMessage();
        return null;
    }
}
function getSelfFollowing(){
    loginAccound();

    global $instagram;

    try{
        $rankToken = \InstagramAPI\Signatures::generateUUID();
        $data= $instagram->people->getSelfFollowing($rankToken);
        $userData = json_decode(json_encode($data),true);
        //print_r($userData);   
        return $userData['users'];
    }catch(\Exception $e){
        echo $e->getMessage();
        return null;
    }
}
function getSelfFollowingCount(){
    global $userHelper;

    $following =$userHelper->getMyFollowersID(getSelfFollowing());

    return count($following);
}
function getSelfFollowersCount(){
    global $userHelper;

    $followers =$userHelper->getMyFollowersID(getSelfFollowers());

    return count($followers);
}
function updateAccoundDb(){
    global $database;
    $followersCount = getSelfFollowersCount();
    $followingCount = getSelfFollowingCount();
    $database->updateAccoundData($_SESSION['id'],$followersCount,$followingCount);
    $_SESSION['followers']=$followersCount;
    $_SESSION['following']=$followingCount;
}
function getPendingFriendship(){
    global $instagram;
    loginAccound();

    $pendingfriend = $instagram->people->getPendingFriendships();
    $jsonn = json_decode(json_encode($pendingfriend),true);
    return $jsonn['suggested_users']['suggestions'];
}   
function sendFollow($id){
    global $instagram;
    try {
        
        $instagram->people->follow($id);
    }catch(\Exception $e){
        echo $e->getMessage();
    }
    
}
function unfAll(){
    global $instagram;
    $following_users = getSelfFollowing();
    foreach($following_users as $user){
        $instagram->people->unfollow($user['pk']);  
    }
}

?>