<?php
namespace App\controllers;
use mysqli;

class DataBaseController {
    private $host = 'localhost';
    private $user  = 'root';
    private $pwd = '';
    private $db = 'facturacion_tienda_db';
    private $conex;

    function __construct() {
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->pwd,
            $this->db
        );
    }

    function execSql($sql) {
        if ($this -> conex -> connect_error){
            die("Conexión fallida: " . $this->conex->connect_error);
        }
        return $this->conex->query($sql);
    }

    function close() {
        $this->conex->close();
    }
}