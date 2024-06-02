<?php
$id = empty($_GET['id']) ? 0 : $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagen/registro.png">
    <link rel="stylesheet" href="../css/inicio.css">
    <title>Tienda Deportiva</title>
</head>
<body>
    <h2>Sesión Iniciada Correctamente</h2>
    <h1>Registro de Clientes</h1>
    <form action="guardaCliente.php" method="post">
        <input type="hidden" name="id" value="<?php echo  $id; ?>">
        <div>
            <label>Nombre Completo: </label>
            <input placeholder="Ingrese su nombre completo" type="text" name="nombreCompleto" required>
        </div>
        <div>
            <label>Tipo de Documento: </label>
            <select name="tipoDocumento" required>
                <option value="CC">Cedula de ciudadanía</option>
                <option value="TI">Tarjeta de identidad</option>
                <option value="CE">Cédula de extranjería</option>
                <option value="NIT">NIT</option>
            </select>
        </div>
        <div>
            <label>Número de Documento: </label>
            <input placeholder="Ingrese su número de documento" type="text" name="numeroDocumento" required>
        </div>
        <div>
            <label>Email: </label>
            <input placeholder="Ingrese su dirección email" type="email" name="email" required>
        </div>
        <div>
            <label>Teléfono: </label>
            <input placeholder="Ingrese su número de teléfono" type="text" name="telefono" required>
        </div>
    <button type="submit">Guardar Cliente</button>
    </form>
    
    <a href='../controllers/CerrarSesionController.php'>Cerrar Sesión</a>
</body>
</html>
