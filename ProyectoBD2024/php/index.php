<?php
session_start();
include_once "bd.php";

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

if (isset($_POST['registrar'])) {
    $nombre_usuario = $conexion->real_escape_string($_POST['nombre_usuario']);
    $correo_electronico = $conexion->real_escape_string($_POST['correo_electronico']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $contraseña = $conexion->real_escape_string($_POST['contraseña']);

    // Verificar si el usuario ya está registrado
    $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo "El usuario ya está registrado. Por favor, elija otro nombre de usuario.";
    } else {
        // Insertar nuevo cliente
        $insertQuery = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contraseña, telefono, direccion) 
                        VALUES ('$nombre_usuario', '$correo_electronico','$contraseña','$telefono', '$direccion')";

        if ($conexion->query($insertQuery)) {
            echo "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error al registrar: " . $conexion->error;
        }
    }
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
</head>
<body>
    <h2>Registro de Cliente</h2>
    <form method="post" action="">
        <label>Nombre de Usuario:</label><br>
        <input type="text" name="nombre_usuario" required><br>
        <label>Correo:</label><br>
        <input type="email" name="correo_electronico" required><br>
        <label>Teléfono:</label><br>
        <input type="text" name="telefono" required><br>
        <label>Dirección:</label><br>
        <input type="text" name="direccion" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="contraseña" required><br><br>
        <input type="submit" name="registrar" value="Registrar">
    </form>
</body>
</html>
