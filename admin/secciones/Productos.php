<?php
require_once __DIR__ . '/../../config/autoload.php';
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    die("Acceso denegado.");
}

$db = Database::getInstance()->getConnection();
$stmt = $db->prepare("SELECT * FROM productos");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h1 class="text-center mb-5">Listado de Productos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Volumen</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto["nombre"]) ?></td>
                <td><?= htmlspecialchars($producto["categoria"]) ?></td>
                <td><?= htmlspecialchars($producto["volumen"]) ?></td>
                <td><?= htmlspecialchars($producto["autor"]) ?></td>
                <td>$<?= number_format($producto["precio"], 2) ?></td>
                <td>
                    <a href="editar.php?id=<?= $producto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="eliminar.php?id=<?= $producto['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
