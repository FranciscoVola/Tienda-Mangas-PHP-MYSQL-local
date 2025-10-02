//clase para carrito//
<?php
require_once '../config/autoload.php';
$db = Database::getInstance()->getConnection();

class Carrito {
    private $db;
    private $usuario_id;

    public function __construct() {
        session_start();
        $this->usuario_id = $_SESSION['usuario_id'] ?? null;
    }

    // Agregar producto al carrito
    public function agregarProducto($producto_id, $cantidad = 1) {
        if (!$this->usuario_id) {
            return false;
        }

        // Verificar si el producto ya está en el carrito
        $query = "SELECT cantidad FROM carrito WHERE id_usuario = :usuario_id AND id_producto = :producto_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['usuario_id' => $this->usuario_id, 'producto_id' => $producto_id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Si ya está en el carrito, actualizar la cantidad
            $nuevaCantidad = $resultado['cantidad'] + $cantidad;
            $query = "UPDATE carrito SET cantidad = :cantidad WHERE id_usuario = :usuario_id AND id_producto = :producto_id";
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['cantidad' => $nuevaCantidad, 'usuario_id' => $this->usuario_id, 'producto_id' => $producto_id]);
        } else {
            // Si no está en el carrito, insertarlo
            $query = "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES (:usuario_id, :producto_id, :cantidad)";
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['usuario_id' => $this->usuario_id, 'producto_id' => $producto_id, 'cantidad' => $cantidad]);
        }
    }

    // Obtener productos en el carrito
    public function obtenerProductos() {
        if (!$this->usuario_id) {
            return [];
        }

        $query = "SELECT p.id, p.nombre, p.precio, c.cantidad 
                  FROM carrito c
                  JOIN productos p ON c.id_producto = p.id
                  WHERE c.id_usuario = :usuario_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['usuario_id' => $this->usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener total del carrito
    public function obtenerTotal() {
        if (!$this->usuario_id) {
            return 0;
        }

        $query = "SELECT SUM(p.precio * c.cantidad) AS total
                  FROM carrito c
                  JOIN productos p ON c.id_producto = p.id
                  WHERE c.id_usuario = :usuario_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['usuario_id' => $this->usuario_id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] ?? 0;
    }

    // Quitar un producto del carrito
    public function quitarProducto($producto_id) {
        if (!$this->usuario_id) {
            return false;
        }

        $query = "DELETE FROM carrito WHERE id_usuario = :usuario_id AND id_producto = :producto_id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['usuario_id' => $this->usuario_id, 'producto_id' => $producto_id]);
    }

    // Vaciar el carrito después de la compra
    public function vaciarCarrito() {
        if (!$this->usuario_id) {
            return false;
        }

        $query = "DELETE FROM carrito WHERE id_usuario = :usuario_id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['usuario_id' => $this->usuario_id]);
    }
}
?>
