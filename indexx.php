<?php
use function GuzzleHttp\json_decode;
include 'controller/UserHelper.php';

require 'vendor/autoload.php';
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
$instagram = new \InstagramAPI\Instagram();
$username = "gk_yazilim";
$password = "23695921030";
$userHelper = new \UserHelper();

try{

    $instagram->login($username,$password);
}catch(\Exception $e){
    $e->getMessage();
}

try{
    $rankToken = \InstagramAPI\Signatures::generateUUID();
    $data= $instagram->people->getSelfFollowing($rankToken);
    $userData = json_decode($data,true);
    //print_r($userData);   
    echo $userData['users'][0]['pk'];
}catch(\Exception $e){
    echo $e->getMessage();
}





?>