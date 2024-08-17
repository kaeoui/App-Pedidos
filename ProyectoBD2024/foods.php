<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Restaurante</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2 id="restaurantName">Nombre del Restaurante</h2>
    <div id="foodItems"></div>
    <button id="viewCartButton">Ver Carrito (<span id="cartCount">0</span>)</button>
    <script src="js/foods.js"></script>


<div class="grid-container">

    <?php
    // Configuración de la base de datos
    
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "App_Pedidos2";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los restaurantes
$sql = "SELECT id_producto, id_restaurante, nombre_producto, descripcion, precio, imagen FROM productos";
$result = $conn->query($sql);

// Verificar si la consulta se ejecutó correctamente

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}

// Verificar si hay resultados

if ($result->num_rows > 0) {
    // Mostrar cada restaurante
    
    while($row = $result->fetch_assoc()) {
        echo"<div class='producto'>";
        if ($row["imagen"]) {
            echo"<img src='" . $row["imagen"] . "' alt='Imagen de " . $row["nombre_producto"] . "'>";
        }
        echo"<h2>" . $row["nombre_producto"] . "</h2>";
        echo"<p>Descripcion: " . $row["descripcion"] . "</p>";
        echo"<p>Precio: " . $row["precio"] . "</p>";
        
        echo'<a href="foods.html?id_restaurante=' . urlencode($row["id_restaurante"]) . '">';
        echo'<button class="selectRestaurant"> Agregar al carrito </button>';

        echo"</div>";
    }
} else {
    echo"No hay restaurantes disponibles.";
}

// Cerrar la conexión

$conn->close();
?>

</body>
</html>