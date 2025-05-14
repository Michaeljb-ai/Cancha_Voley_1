<?php
session_start();
require_once '../model/Usuarios.php';

// Creamos un objeto de la clase Usuario
$obj = new Usuario();
$resultado = $obj->getLoginUsuario();

// Obtenemos los datos enviados desde el formulario
$correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : '';
$pass = isset($_POST["pass"]) ? trim($_POST["pass"]) : '';

// Validamos que los campos no estén vacíos
if (empty($correo) || empty($pass)) {
    $_SESSION["login_error"] = "Por favor, completa todos los campos.";
    header("Location: ../modules/login.php");
    exit();
}

// Creamos una variable para verificar si se encuentra el cliente
$encontrados = 0;

// Recorremos los resultados de la consulta
while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
    if ($fila['correo'] == $correo && $fila['contrasena'] == $pass) {
        // Iniciamos sesión
        $_SESSION["usuario_sesion"] = $fila;
        $encontrados = 1;

        // Redirigimos al panel del cliente
        header("Location: ../html/panel_cliente.php");
        exit();
    }
}

// Si no se encuentra el cliente o las credenciales son incorrectas
if (!$encontrados) {
    $_SESSION["login_error"] = "Usuario o contraseña incorrectos.";
    header("Location: ../modules/login.php");
    exit();
}
?>