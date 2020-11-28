<?php

require '../connection/UserDbh.php';

class User extends Dbh
{

    private $id;
    private $name;
    private $username;
    private $pwd;
    private $email;

    /**
     * User constructor.
     * @param $name
     * @param $username
     * @param $pwd
     * @param $email
     */
    public function __construct( $name="", $username="", $pwd="", $email="")
    {
        $this->name = $name;
        $this->username = $username;
        $this->pwd = $pwd;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd): void
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function insert($user){
        try {
            $sql = "INSERT INTO user(userName, userPwd, userUid, userEmail) VALUES(?, ?, ?, ?);";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user->getName(),$user->getPwd(),$user->getUsername(),$user->getEmail()]);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function update($user){

    }

    public function delete($user){

    }

    public function getUserById($user_id){

    }

    public function getAllUsers(){

    }



}