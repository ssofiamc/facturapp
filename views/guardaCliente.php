<?php
include '../models/Model.php';
include '../models/Cliente.php';
include '../controllers/DataBaseController.php';
include '../controllers/ClienteController.php';

use App\controllers\ClienteController;
use App\models\Cliente;

$controller = new ClienteController();
$id = $controller->verificaCliente($_POST['numeroDocumento']);
$cliente = new Cliente();
$cliente->set('nombreCompleto', $_POST['nombreCompleto']);
$cliente->set('tipoDocumento', $_POST['tipoDocumento']);
$cliente->set('numeroDocumento', $_POST['numeroDocumento']);
$cliente->set('email', $_POST['email']);
$cliente->set('telefono', $_POST['telefono']);
$cliente->set('id', $id);
$result = empty($cliente->get('id'))
    ? $controller->create($cliente)
    : $controller->update($cliente);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar cliente</title>
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="icon" href="../imagen/registro.png">
</head>
<body>
    <?php
        if (!empty($id)) {
            echo "<h1>El cliente ya se encuentra registrado, los datos han sido actualizados</h1>";
        } else {
            echo $result ? "<h1>Datos guardados correctamente</h1>": "<h1>Error al guardar el registro</h1>";
        }
    ?>
    <br>
        <form action="guardaFactura.php" method="post">
            <input type="hidden" name="refencia" value="<?php echo  $refencia; ?>">
            <input type="hidden" name="idCliente" value="<?php echo  $id; ?>">
            <div>
                <label>Fecha: </label>
                <input type="date" name="fecha" required>
            </div>
            <input type="hidden" name="idCliente" value="<?php echo  $id; ?>">
            <div>
                <label>Valor total de la factura: </label>
                <input type="number" name="valorFactura" required>
            </div>
            <button type="submit">Guardar Factura</button>
        </form>

    <a href="inicio.php">Volver</a>
</body>
</html>