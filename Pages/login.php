<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Como no hasheaste, comparamos directo:
        if ($pass === $user["password_hash"]) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["nombre"] = $user["nombre"];

            header("Location: index.html");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "El usuario no existe";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h2>Iniciar Sesión</h2>

    <form method="POST">
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <button type="submit">Ingresar</button>
    </form>

    <?php if (isset($error)) {
        echo "<p>$error</p>";
    } ?>

    <p>¿No tenés cuenta? <a href="register.php">Registrate acá</a></p>

</body>

</html>