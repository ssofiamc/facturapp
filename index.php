<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="imagen/pluma.png">
        <link rel="stylesheet" href="css/index.css">
        <title>Facturas Tienda Deportiva</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <form action="views/validarInicioSesion.php" method="post">
        <label class="ingreso" for="">Usuario: </label>
        <input type="text" name="user" placeholder="Ingrese usuario" required>
        <br>
        <label class="ingreso" for="">Contraseña: </label>
        <input type="password" name="pwd" placeholder="Ingrese contraseña" required>
        <br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>