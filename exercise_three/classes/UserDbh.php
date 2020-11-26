<?php

require 'Dbh.php';

class UserDbh  extends  Dbh{


    /**
     * Sin statment
     */
    public function getUsers(){
        $sql = "SELECT * FROM user";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()){
            echo $row['userName'];
        }
    }

    public function insertUser($name,$pwd,$username,$email){
        $sql = "INSERT INTO user(userName, userPwd, userUid, userEmail) VALUES(?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$pwd);
        $stmt->bindParam(3,$username);
        $stmt->bindParam(4,$email);
        $stmt->execute();

    }

    public function login($username,$email,$pwd){
        $sql = "SELECT * FROM user WHERE userName = ? OR userEmail = ? AND userPwd = ?;";
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$username,$email,$pwd]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        print_r($user);

    }


    public function getUsersStmt(){
        $sql = "SELECT * FROM user WHERE userName = ?";

        $stmt = $this->connect()->query($sql);

        while ($row = $stmt->fetch()){
            echo $row['name'];
        }
    }





}
