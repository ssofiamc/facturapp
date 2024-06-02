<?php
namespace App\controllers;

use App\models\Cliente;
use App\controllers\DataBaseController;

class ClienteController extends DataBaseController{
    
    function verificaCliente ($numeroDocumento){
        $dataBase = new DataBaseController();
        $sql = "SELECT * FROM clientes WHERE numeroDocumento = '$numeroDocumento'";
        $result = $dataBase->execSql($sql);
        if ($result->num_rows == 0) {
            return null;
        }
        $item = $result->fetch_assoc();
        return $item['id'];
    }
    
    function read() {
        $dataBase = new DataBaseController();
        $sql = "SELECT * FROM clientes";
        $result = $dataBase->execSql($sql);
        $clientes = [];
        if ($result->num_rows == 0) {
            return $clientes;
        }
        while ($item = $result->fetch_assoc()) {
            $cliente = new Cliente();
            $cliente->set('id', $item['id']);
            $cliente->set('nombreCompleto', $item['nombreCompleto']);
            $cliente->set('tipoDocumento', $item['tipoDocumento']);
            $cliente->set('numeroDocumento', $item['numeroDocumento']);
            $cliente->set('email', $item['email']);
            $cliente->set('telefono', $item['telefono']);
            array_push($clientes, $cliente);
        }
        $dataBase->close();
        return $clientes;
    }

    function create($cliente) {
        $sql = "INSERT INTO clientes (nombreCompleto,tipoDocumento,numeroDocumento,email,telefono)values";
        $sql .= "(";
        $sql .= "'".$cliente->get('nombreCompleto')."',";
        $sql .= "'".$cliente->get('tipoDocumento')."',";
        $sql .= "'".$cliente->get('numeroDocumento')."',";
        $sql .= "'".$cliente->get('email')."',";
        $sql .= "'".$cliente->get('telefono')."'";
        $sql .= ")";
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function update($cliente) {
        $sql = "UPDATE clientes SET ";
        $sql .= "nombreCompleto = '".$cliente->get('nombreCompleto')."',";
        $sql .= "tipoDocumento = '".$cliente->get('tipoDocumento')."',";
        $sql .= "numeroDocumento = '".$cliente->get('numeroDocumento')."',";
        $sql .= "email = '".$cliente->get('email')."',";
        $sql .= "telefono = '".$cliente->get('telefono')."'";
        $sql .= " WHERE id = '".$cliente->get('id')."'";
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function delete($id) {
        $sql = "DELETE FROM clientes WHERE id = '".$id."'";
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }
}
?>