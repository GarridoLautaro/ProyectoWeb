<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "INSERT INTO users (nombre, email, password_hash, role)
            VALUES ('$nombre', '$email', '$pass', 'user')";

    if (mysqli_query($conexion, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
</head>

<body>

    <h2>Crear cuenta</h2>

    <form method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <button type="submit">Registrarse</button>
    </form>

    <?php if (isset($error)) {
        echo "<p>$error</p>";
    } ?>

    <p>¿Ya tenés cuenta? <a href="login.php">Iniciar sesión</a></p>

</body>

</html>