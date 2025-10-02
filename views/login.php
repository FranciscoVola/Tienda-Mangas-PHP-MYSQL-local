<?php
require_once __DIR__ . '/../config/autoload.php';
session_start();

$db = Database::getInstance()->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute([":email" => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($contrasena, $usuario["contrasena"])) {
        $_SESSION["usuario"] = [
            "id" => $usuario["id"],
            "nombre_usuario" => $usuario["nombre_usuario"],
            "email" => $usuario["email"],
            "rol" => $usuario["rol"]
        ];

        if ($usuario["rol"] === "admin") {
            header("Location: ../admin/index.php");
        } else {
            header("Location: perfil.php");
        }
        exit;
    } else {
        $error = "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="bg-dark">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 30rem;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>

                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    </div>

                    <button type="submit" class="btn w-100">Ingresar</button>
                </form>

                <p class="mt-3 text-center text-light">¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
            </div>
        </div>
    </div>

</body>
</html>


