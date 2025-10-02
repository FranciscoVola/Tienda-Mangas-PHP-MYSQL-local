<?php
require_once '../config/autoload.php';

$db = Database::getInstance()->getConnection();
$sql = "SELECT * FROM productos";
$stmt = $db->prepare($sql);
$stmt->execute();
$mangas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Mangas</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <h1>Listado de Mangas</h1>
    <div class="mangas">
        <?php foreach ($mangas as $manga) : ?>
            <div class="manga">
            <img src="../admin/<?php echo ($manga["portada"]); ?>" alt="Portada de <?php echo ($manga["nombre"]); ?>" width="150">
        
                <h2><?php echo ($manga['nombre']); ?></h2>
                <p>Precio: $<?php echo number_format($manga['precio'], 2); ?></p>
                <a href="detalle.php?id=<?php echo $manga['id']; ?>">Ver detalles</a>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
