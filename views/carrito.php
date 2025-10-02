<?php
require_once __DIR__ . '/../models/Carrito.php';
require_once __DIR__ . '/../includes/header.php';

$carrito = new Carrito();
$productosEnCarrito = $carrito->obtenerProductos();
$total = $carrito->obtenerTotal();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-info text-center"><i class="fas fa-shopping-cart"></i> Tu Carrito</h1>

        <?php if (empty($productosEnCarrito)): ?>
            <div class="alert alert-warning text-center mt-4">Tu carrito está vacío.</div>
        <?php else: ?>
            <table class="table table-dark table-hover mt-4">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productosEnCarrito as $producto): ?>
                        <tr>
                            <td><?php echo ($producto['nombre']); ?></td>
                            <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td>$<?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></td>
                            <td>
                                <a href="carrito.php?quitar=<?php echo $producto['id']; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i> Quitar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3 class="text-end mt-3">Total: <span class="text-success">$<?php echo number_format($total, 2); ?></span></h3>

            <div class="d-flex justify-content-between mt-4">
                <a href="listado.php" class="btn btn-outline-light">
                    <i class="fas fa-arrow-left"></i> Seguir comprando
                </a>
                <a href="finalizar_compra.php" class="btn btn-success">
                    <i class="fas fa-check"></i> Finalizar Compra
                </a>
            </div>
        <?php endif; ?>
    </div>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
