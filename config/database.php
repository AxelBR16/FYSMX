<?php

class database{
    private $hostname = "";
    private $database = "fysmx";
    private $username = "root";
    private $password = "";
    private $chatset = "uft8";

    function conectar()
    {
        try{
        $conexion = "mysql:host=".$this->hostname."; dbname=".$this->database."; charset=".$this->chatset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($conexion, $this->username, $this->password, $options);

        return $pdo;
    } catch(PDOException $e) {
        echo 'Error conexion'.$e->getMessage();
        exit();
    }
    }
}
?>