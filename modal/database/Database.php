<?php

class Database{

    private static $con;

    public function __construct() {
        
        if(!isset(self::$con)){
            try{
               self::$con = new PDO("mysql:host=localhost;dbname=instagram;charset=utf8","root","");   
            }catch(\Exception $e){
                echo $e->getMessage();
            }
        }else{
            echo "oluşturulmuş";
        }
    }


    public function addNewAccound($username,$password){
        $sql = "INSERT INTO accounds (username,password) VALUES (?,?)";
        $result = self::$con->prepare($sql);
        $result->execute([$username,$password]);

        if($result->rowCount()){
            $lastID = self::$con->lastInsertId();
            $this->createNewAccoundData($lastID);
        }
    }

    public function createNewAccoundData($id){
        $sql = "INSERT INTO accound_data (id,accound_follower,accound_following) VALUES (?,?,?)";
        $result = self::$con->prepare($sql);
        $result->execute([$id,0,0]);

        if($result->rowCount()){
            echo 'ok';            
        }
    }

    public function updateAccoundData($id,$follower,$following){
        $sql = "UPDATE accound_data SET accound_follower=?, accound_following WHERE id=?";
        $result = self::$con->prepare($sql);
        $result->execute([$id,$follower,$following]);
    }
    public function getAccounds(){
        $sql ="SELECT * FROM accounds";
        $users = array();
        foreach(self::$con->query($sql) as $user){
            $accound_data = self::$con->prepare('SELECT * FROM accound_data WHERE id=?');
            $accound_data->execute([$user['id']]);
            $x = $accound_data->fetch();
            array_push($users,array($user['id'],$user['username'],$user['password'],$x['accound_follower'],$x['accound_following']));
        }
        return $users;
    }
     public function getAccound($id){
        $sql ="SELECT * FROM accounds WHERE id=?";
        $userf = self::$con->prepare($sql);
        $userf->execute([$id]);
        $user = $userf->fetch();
        $accound_data = self::$con->prepare('SELECT * FROM accound_data WHERE id=?');
        $accound_data->execute([$id]);
        $x = $accound_data->fetch();
        $accound =  array($user['username'],$user['password'],$x['accound_follower'],$x['accound_following']);
       
        return $accound;
    }
   
}

?>
