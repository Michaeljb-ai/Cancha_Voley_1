<?php
//Escribimos el codigo
session_start();
if (isset($_SESSION["usuario_sesion"])) {
    header("Location: ../index.html");
} else {
}

// Si hay un error en sesión, lo almacenamos y luego lo eliminamos
$error = '';
if (isset($_SESSION["login_error"])) {
    $error = $_SESSION["login_error"];
    unset($_SESSION["login_error"]);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="views/assets/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        form {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        legend {
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form id="loginForm" action="../controller/UserController_user.php" method="POST">
        <fieldset>
            <legend>Iniciar Sesión</legend>
            <label for="user">Usuario</label>
            <input type="text" name="correo" id="correo" placeholder="Escribe tu usuario">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="pass" placeholder="Escribe tu contraseña">
            <input type="submit" value="Iniciar Sesión">
        </fieldset>
    </form>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            const correo = document.getElementById("correo").value.trim();
            const pass = document.getElementById("pass").value.trim();

            if (correo === "" || pass === "") {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos Vacíos',
                    text: 'Por favor, completa todos los campos.',
                    confirmButtonColor: '#007bff'
                });
            }
        });

        // Mostrar error si llega desde PHP
        <?php if (!empty($error)): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error de Autenticación',
                text: '<?= $error ?>',
                confirmButtonColor: '#d33'
            });
        <?php endif; ?>
    </script>
</body>

</html>