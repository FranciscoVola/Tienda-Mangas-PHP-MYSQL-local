<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MundoManga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body class="bg-dark">

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container my-5">
        <?php 
        $ruta = __DIR__ . "/../views/{$seccion}.php";
        if (file_exists($ruta)) {
            include $ruta;
        } else {
            include __DIR__ . '/../views/404.php'; // 
        }        
        ?>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
