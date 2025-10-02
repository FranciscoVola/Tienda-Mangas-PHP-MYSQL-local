<?php
require_once __DIR__ . '/../config/autoload.php';
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] !== "admin") {
    header("Location: ../views/login.php");
    exit;
}

$db = Database::getInstance()->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $categoria = trim($_POST["categoria"]);
    $volumen = trim($_POST["volumen"]);
    $fecha_publicacion = trim($_POST["fecha_publicacion"]);
    $autor = trim($_POST["autor"]);
    $precio = trim($_POST["precio"]);
    $descripcion = trim($_POST["descripcion"]);

     // Manejo de la imagen
     $ruta_destino = null;
     if (isset($_FILES["portada"]) && $_FILES["portada"]["error"] == 0) {
         $directorio_subida = __DIR__ . "/uploads/";
         if (!is_dir($directorio_subida)) {
             mkdir($directorio_subida, 0777, true);
         }
 
         $nombre_archivo = time() . "_" . basename($_FILES["portada"]["name"]);
         $ruta_destino = "uploads/" . $nombre_archivo;
         move_uploaded_file($_FILES["portada"]["tmp_name"], $directorio_subida . $nombre_archivo);
     }



    $sql = "INSERT INTO productos (nombre, categoria, volumen, fecha_publicacion, autor, portada, precio, descripcion) 
            VALUES (:nombre, :categoria, :volumen, :fecha_publicacion, :autor, :portada, :precio, :descripcion)";

    $stmt = $db->prepare($sql);
    
    $stmt->execute([
        ":nombre" => $nombre,
        ":categoria" => $categoria,
        ":volumen" => $volumen,
        ":fecha_publicacion" => $fecha_publicacion,
        ":autor" => $autor,
        ":portada" => $ruta_destino,
        ":precio" => $precio,
        ":descripcion" => $descripcion
    ]);

    header("Location: index.php?seccion=productos&success=1");
    exit;
}
?>
