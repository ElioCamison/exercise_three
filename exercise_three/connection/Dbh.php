<?php

class Dbh extends PDO {


    private  $host = "localhost";
    private  $user = "root";
    private  $pwd = "";
    private  $dbName = "imf";


    public function __construct(){
        try{
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
//            $pdo = new PDO($dsn, $this->user, $this->pwd);
            parent::__construct($dsn, $this->user, $this->pwd);
        } catch (PDOException $exception){
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $exception->getMessage();
        }

//        $pdo = new PDO('mysql:host=localhost;dbname=imf','root','');
//        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//        return $pdo;
    }




}