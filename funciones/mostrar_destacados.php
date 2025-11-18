<?php
$conn = new mysqli("localhost", "root", "", "tienda_tecnologia");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Seleccionar 4 productos al azar
$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
$result = $conn->query($sql);

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
    echo '<p>No hay productos disponibles</p>';
}

$conn->close();
