<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Admin Panel</a>
        <div class="navbar-nav">
            <a class="nav-link" href="index.php?seccion=productos">Productos</a>
            <a class="nav-link" href="index.php?seccion=usuarios">Usuarios</a>
            <a class="nav-link" href="../index.php">Volver al Sitio</a>
        </div>
    </div>
</nav>

