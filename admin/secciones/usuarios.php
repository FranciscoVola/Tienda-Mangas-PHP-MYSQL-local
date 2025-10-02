<?php
require_once __DIR__ . '/../../config/autoload.php';
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    die("Acceso denegado.");
}

$db = Database::getInstance()->getConnection();

// Obtener los usuarios
$sql = "SELECT id, nombre_usuario, email, rol, fecha_registro FROM usuarios";
$stmt = $db->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuarios</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Administrar Usuarios</h1>
    
    <table border="1">
        <tr>
            <th>Nombre de Usuario</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Fecha de Registro</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= htmlspecialchars($usuario['nombre_usuario']) ?></td>
            <td><?= htmlspecialchars($usuario['email']) ?></td>
            <td><?= htmlspecialchars($usuario['rol']) ?></td>
            <td><?= htmlspecialchars($usuario['fecha_registro']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="index.php">Volver al Panel</a>
</body>
</html>
