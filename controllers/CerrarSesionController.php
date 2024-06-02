<?php
session_start();
session_unset();
session_destroy();

header('Location: ../index.php');
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Sesión cerrada</h1>
    <br>
    <a href="../index.php">Volver a la página principal</a>
</body>
</html>
