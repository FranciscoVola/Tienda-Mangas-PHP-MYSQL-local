<?php
require_once __DIR__ . '/../models/Producto.php';
session_start();

if (!isset($_GET['id'])) {
    die("ID de producto no dado xd.");
}

$producto = new Producto();
$manga = $producto->obtenerPorId($_GET['id']);

if (!$manga) {
    die("Manga no encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $manga['id'];
    $nombre = $manga['nombre'];
    $precio = $manga['precio'];
    
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] += 1;
    } else {
        $_SESSION['carrito'][$id] = ['nombre' => $nombre, 'precio' => $precio, 'cantidad' => 1];
    }
}
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($manga['nombre']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <img src="../admin/<?php echo ($manga["portada"]); ?>" class="img-fluid rounded shadow" alt="Portada de <?php echo ($manga["nombre"]); ?>">
            </div>
            <div class="col-md-7">
                <h1 class="text-info"><?php echo ($manga['nombre']); ?></h1>
                <p class="text-muted">Volumen: <strong><?php echo ($manga['volumen']); ?></strong></p>
                <p class="text-muted">Autor: <strong><?php echo ($manga['autor']); ?></strong></p>
                <p class="text-muted">Fecha de Publicación: <strong><?php echo ($manga['fecha_publicacion']); ?></strong></p>
                <h3 class="text-danger">$<?php echo number_format($manga['precio'], 2); ?></h3>
                
                <a href="carrito.php?agregar=<?php echo $manga['id']; ?>" class="btn btn-success btn-lg mt-3">
                    <i class="fas fa-cart-plus"></i> Agregar al Carrito
                </a>
                
                <a href="listado.php" class="btn btn-outline-light btn-lg mt-3">
                    <i class="fas fa-arrow-left"></i> Volver al listado
                </a>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>