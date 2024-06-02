<?php
include '../models/Model.php';
include '../models/Factura.php';
include '../controllers/DataBaseController.php';
include '../controllers/FacturaController.php';

use App\controllers\FacturaController;
use App\models\Factura;


$controller = new FacturaController();
$descuento = $controller->verificaFactura($_POST['valorFactura']);
$factura = new Factura();
$factura->set('fecha', $_POST['fecha']);
$factura->set('idCliente', $_POST['idCliente']);
$factura->set('valorFactura', $_POST['valorFactura']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="icon" href="../imagen/registro.png">
</head>
<body>
    <h1>GUARDADO EXITOSO</h1>
    <br>
    <h2 class="texto">Valor total de la factura: <?php echo $descuento?></h2>
    <h2 class="texto">Valor de descuento: <?php echo $_POST['valorFactura']-$descuento?></h2>
    <br>
    <a href="inicio.php">Volver</a>
</body>
</html>