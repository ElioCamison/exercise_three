<?php

class Dbh extends PDO {

    private  $user = "root";
    private  $pwd = "";
    private $dsn = 'mysql:host=localhost;dbname=imf';


    public function __construct($dsn, $user="root", $pwd=""){
        parent::__construct($dsn, $user, $pwd);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    //De esta manera no tendremos que instanciar la clase
    static function getConnection(){
        $conn = null;
        try {
            $conn = new Dbh('mysql:host=localhost;dbname=imf',"root","");
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
        return $conn;
    }

    // Pasamos el argumento por referencia para que cambie el valor,
    // si lo pasaramos sin & sólo cambiaría el valor dentro de la función
    static function closeConnection(&$conn){
        $conn = null;
    }


//    public function __construct(){
//        try{
//            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
//            parent::__construct($dsn, $this->user, $this->pwd);
//            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//        } catch (PDOException $exception){
//            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $exception->getMessage();
//            die();
//        }
//    }




}