<?php
require '../models/Model.php';
require '../models/Usuario.php';
include '../controllers/DataBaseController.php';
include '../controllers/UsuarioController.php';

use App\models\Usuario;
use App\controllers\UsuarioController;

$usuario = new Usuario();
$usuario->set('usuario', $_POST['user']);
$usuario->set('pwd', $_POST['pwd']);
$controlador = new UsuarioController();
$iniciarSesion = $controlador->validarUsuario($usuario);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validar Sesión</title>
    </head>
    <body>
        <?php
            if ($iniciarSesion) {
            session_start();
            $_SESSION['iniciarSesion'] = true;
            header('Location: inicio.php');
            } else {
            echo '<h1>Datos incorrectos</h1>';
            echo '<br>';
            echo '<a href="../index.php">Volver</a>';
            }
        ?>
    </body>
</html>