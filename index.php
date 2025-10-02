<?php
session_start();
require_once __DIR__ . '/config/autoload.php';

// Sección por defecto
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'home';

// Lista de secciones permitidas
$secciones_permitidas = ['home', 'listado', 'detalle', 'carrito', 'perfil', 'login', 'registro', 'contacto', 'categorias'];

if (!in_array($seccion, $secciones_permitidas)) {
    $seccion = 'home'; // Si la sección no es válida, se carga la home
}

require_once __DIR__ . '/views/template.php';
