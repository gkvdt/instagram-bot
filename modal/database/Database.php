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
}

?>