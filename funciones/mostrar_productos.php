<?php
$conn = new mysqli("localhost", "root", "", "tienda_tecnologia");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$categoria = isset($_GET['categoria']) ? $conn->real_escape_string($_GET['categoria']) : '';
$buscar = isset($_GET['buscar']) ? $conn->real_escape_string($_GET['buscar']) : '';

if ($buscar) {
    $sql = "SELECT * FROM products WHERE nombre LIKE '%$buscar%'";
} else if ($categoria) {
    $sql = "SELECT * FROM products WHERE categoria = '$categoria'";
} else {
    $sql = "SELECT * FROM products";
}

$result = $conn->query($sql);

// Muestra las tarjetas de los productos, con un while

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<article class="tarjeta">';
        echo '<div class="tarjeta-img" style="background-image: url(\'imagenes/' . $row["imagen"] . '\');"></div>';
        echo '<div class="tarjeta-info">';
        echo '<span class="etiqueta">' . $row["categoria"] . '</span>';
        echo '<h3 class="nombre">' . $row["nombre"] . '</h3>';
        echo '<p class="precio">$' . $row["precio"] . '</p>';
        // Botón agregar al carrito
        echo '<button class="btn-carrito" onclick="agregarAlCarrito('
            . $row["id"] . ', \'' . addslashes($row["nombre"]) . '\', '
            . $row["precio"] . ', \'' . $row["imagen"] . '\')">Agregar al carrito</button>';
        echo '</div></article>';
    }

} else {
    echo '<p>No se encontraron productos.</p>';
}

$conn->close();
?>