<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpavanzado";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Clase Producto
class Producto {
    public $codigo;
    public $nombre;
    public $descripcion;
    public $precio;

    public function __construct($codigo, $nombre, $descripcion, $precio) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public function listar_producto() {
        return "Código: $this->codigo | Producto: $this->nombre | Descripción: $this->descripcion | Precio: $this->precio <button onclick=\"agregarProducto({$this->codigo}, '{$this->nombre}', '{$this->descripcion}', {$this->precio})\">Comprar</button><br>";
    }
}

// Clase Carrito
class Carrito {
    private $compras = [];

    public function introducir_compra($producto) {
        $this->compras[] = $producto;
        global $conn;
        $codigo = $producto['codigo'];
        $nombre = $producto['nombre'];
        $descripcion = $producto['descripcion'];
        $precio = $producto['precio'];

        $sql = "INSERT INTO compras (codigo, producto, descripcion, precio) VALUES ('$codigo', '$nombre', '$descripcion', '$precio')";
        $conn->query($sql);
    }

    public function eliminar_compra($index) {
        if (isset($this->compras[$index])) {
            unset($this->compras[$index]);
            global $conn;
            $id = $index + 1; 
            $sql = "DELETE FROM compras WHERE id_compra=$id";
            $conn->query($sql);
        }
    }

    public function listar_compra() {
        return $this->compras;
    }
}

// Función para obtener los productos de la base de datos
function obtenerProductos() {
    global $conn;
    $sql = "SELECT * FROM compras";
    $result = $conn->query($sql);

    $productos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = new Producto($row['codigo'], $row['producto'], $row['descripcion'], $row['precio']);
        }
    }

    return $productos;
}

// Función para mostrar los productos disponibles
function mostrarProductos($productos) {
    foreach ($productos as $producto) {
        echo $producto->listar_producto();
    }
}

// Procesamiento de la acción de compra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comprar'])) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = new Carrito();
        }
        $carrito = $_SESSION['carrito'];

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        $producto = ['codigo' => $codigo, 'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio];
        $carrito->introducir_compra($producto);
    } elseif (isset($_POST['eliminar'])) {
        $carrito = $_SESSION['carrito'];
        $carrito->eliminar_compra($_POST['index']);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilos.css">
</head>
 
<body>
 
<div class="container">
    <header>
        <h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
        <nav>
            <?php include("botonera.php"); ?>
        </nav>
    </header>
    <section>
        <h2>Compras</h2>
        <?php
        // Obtener productos de la base de datos
        $productos = obtenerProductos();

        // Mostrar los productos disponibles
        echo "<h3>Productos Disponibles</h3>";
        mostrarProductos($productos);
        ?>

        <!-- Función JavaScript para agregar producto al carrito -->
        <script>
            function agregarProducto(codigo, nombre, descripcion, precio) {
                document.getElementById("form_comprar").innerHTML += `
                    <input type="hidden" name="codigo" value="${codigo}">
                    <input type="hidden" name="nombre" value="${nombre}">
                    <input type="hidden" name="descripcion" value="${descripcion}">
                    <input type="hidden" name="precio" value="${precio}">
                `;
                document.getElementById("form_comprar").submit();
            }
        </script>

        <!-- Formulario para realizar compras -->
        <form id="form_comprar" method="post">
            <input type="submit" name="comprar" style="display: none;">
        </form>
    </section>
    <aside>
        <h2>Carrito</h2>
        <?php
        // Mostrar contenido del carrito
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
            $compras_en_carrito = $carrito->listar_compra();
            foreach ($compras_en_carrito as $index => $producto) {
                echo $producto->listar_producto() . " <form method='post'><input type='hidden' name='index' value='$index'><input type='submit' name='eliminar' value='Eliminar'></form><br>";
            }
        }
        ?>
    </aside>
    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>
</div>
</body>
</html>
