<?php

// DEBUG: Verificar qué valor tiene $seccion y qué archivo intenta cargar
var_dump($seccion);
$ruta = __DIR__ . "/secciones/{$seccion}.php";
var_dump($ruta);


require_once __DIR__ . '/../config/autoload.php';
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    die("Acceso denegado.");
}

// Obtener la sección de la URL (por defecto, 'dashboard')
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'dashboard';

// Lista de secciones permitidas
$secciones_permitidas = ['dashboard', 'productos', 'usuarios'];

if (!in_array($seccion, $secciones_permitidas)) {
    $seccion = 'dashboard'; // Si la sección no es válida, se carga el dashboard
}

?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body class="bg-dark">

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container mt-5">
        <h1 class="text-center mb-5">Panel de Administración</h1>

        <nav class="mb-4">
            <a href="index.php?seccion=dashboard" class="btn btn-primary">Inicio</a>
            <a href="index.php?seccion=productos" class="btn btn-success">Productos</a>
            <a href="index.php?seccion=usuarios" class="btn btn-info">Usuarios</a>
            <a href="../index.php" class="btn btn-warning">Volver al Sitio</a>
            <a href="../logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </nav>

        <?php
        $ruta = __DIR__ . "/secciones/{$seccion}.php";
        if (file_exists($ruta)) {
            include $ruta;
        } else {
            echo "<p class='text-center text-danger'>Sección no encontrada.</p>";
        }
        ?>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
