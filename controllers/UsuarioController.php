<?php
namespace App\controllers;

class UsuarioController {
    function validarUsuario($usuario) {
        $user = $usuario->get('usuario');
        $pwd = $usuario->get('pwd');
        $sql = "SELECT * FROM usuarios WHERE usuario='$user' and pwd='$pwd'";
        $db = new DataBaseController();
        $result = $db->execSql($sql);
        $cantidadRegistros = $result->num_rows;
        $db->close();
        return $cantidadRegistros>0;
    }
}