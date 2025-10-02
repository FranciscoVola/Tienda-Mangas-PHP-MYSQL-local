<?php
require_once __DIR__ . '/../config/autoload.php';
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

$db = Database::getInstance()->getConnection();
$usuario_id = $_SESSION["usuario"]["id"];

// Obtener datos del usuario desde la base de datos
$sql = "SELECT nombre_usuario, email, fecha_registro FROM usuarios WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute([":id" => $usuario_id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "<p>Error: Usuario no encontrado en la base de datos.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

<?php include '../includes/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h3 class="text-center">Perfil de Usuario</h3>
        <p><strong>Nombre de usuario:</strong> <?= $usuario["nombre_usuario"]; ?></p>
        <p><strong>Email:</strong> <?= $usuario["email"]; ?></p>
        <p><strong>Fecha de Registro:</strong> <?= date("d/m/Y", strtotime($usuario["fecha_registro"])); ?></p>

        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
