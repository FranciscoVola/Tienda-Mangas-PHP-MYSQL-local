<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="/tiendamanga/index.php" class="navbar-brand">
            <span class="text-info">Mundo</span><span class="text-danger">Manga</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/tiendamanga/index.php?seccion=inicio">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="/tiendamanga/index.php?seccion=listado">Todos los Mangas</a></li>
                <li class="nav-item"><a class="nav-link" href="/tiendamanga/index.php?seccion=categorias">Categorías</a></li>
                <li class="nav-item"><a class="nav-link" href="/tiendamanga/index.php?seccion=contacto">Contacto</a></li>

                <?php if (isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/tiendamanga/index.php?seccion=perfil">
                            <?php echo $_SESSION['usuario']['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tiendamanga/index.php?seccion=logout">Cerrar sesión</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="/tiendamanga/index.php?seccion=login">Login</a></li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="/tiendamanga/index.php?seccion=carrito">
                        Carrito <?php echo isset($_SESSION['carrito']) ? '('.count($_SESSION['carrito']).')' : ''; ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
