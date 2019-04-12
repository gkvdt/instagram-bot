<?php
class UserHelper{
    public function getMyFollowersID($array){
        $users = array();
        for($i = 0 ; $i<sizeOf($array['users']);$i++){
            array_push($users,$array['users'][$i]['pk']);
        }
        return $users;
       //print_r($users);
    }


    
}

?>