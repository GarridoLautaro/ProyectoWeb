<?php
header("Content-Type: application/json");

// Incluimos la conexión a la base de datos
include "db.php"; // si db.php no está en BD, ajustar ruta: include "../db.php";

$q = $_GET["q"] ?? "";
$q = mysqli_real_escape_string($conexion, $q);

// Consulta a la tabla products
$sql = "SELECT nombre FROM products WHERE nombre LIKE '%$q%' LIMIT 6";
$result = mysqli_query($conexion, $sql);

$sugerencias = [];
while ($row = mysqli_fetch_assoc($result)) {
    $sugerencias[] = $row;
}

echo json_encode($sugerencias);
?>