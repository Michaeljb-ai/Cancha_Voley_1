<?php

session_start();
if (isset($_SESSION["usuario_sesion"])) {
    $nombre_usuario = $_SESSION["usuario_sesion"]["nombre"];
} else {
    header("location: ../modules/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Cliente</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($nombre_usuario); ?>!</h1>
    <p>Este es tu panel de cliente.</p>
    <a href="../modules/logout.php">Cerrar Sesión</a>
</body>
</html>