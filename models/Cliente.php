<?php
namespace App\models;

class Cliente extends Model {
    protected $id = 0; 
    protected $nombreCompleto = '';
    protected $tipoDocumento = '';
    protected $numeroDocumento = '';
    protected $email = '';
    protected $telefono = '';
}
?>