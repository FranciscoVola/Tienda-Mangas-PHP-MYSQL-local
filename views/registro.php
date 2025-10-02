<?php
require_once __DIR__ . '/../config/autoload.php';
session_start();

$db = Database::getInstance()->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = trim($_POST["nombre_usuario"]);
    $email = trim($_POST["email"]);
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $rol = "usuario"; // Por defecto, los usuarios normales

    $sql = "INSERT INTO usuarios (nombre_usuario, email, contrasena, rol, fecha_registro) 
            VALUES (:nombre_usuario, :email, :contrasena, :rol, NOW())";
    
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ":nombre_usuario" => $nombre_usuario,
        ":email" => $email,
        ":contrasena" => $contrasena,
        ":rol" => $rol
    ]);

    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="bg-dark">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 30rem;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Registro de Usuario</h3>

                <form action="registro.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    </div>

                    <button type="submit" class="btn w-100">Registrarse</button>
                </form>

                <p class="mt-3 text-center text-light">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
            </div>
        </div>
    </div>

</body>
</html>

