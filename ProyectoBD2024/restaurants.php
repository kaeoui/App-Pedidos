<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurantes</title>
    <link rel="stylesheet" href="css/styles.css">

    <style>

.grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .restaurante {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 10px;
            background-color: #f9f9f9;

        }

        .restaurante h2 {
            margin: 0 0 10px;
            font-size: 24px;
        }

        .restaurante p {
            margin: 5px 0;
            font-size: 16px;
        }

        .restaurante img {
            max-width: 50%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
        }
        .selectRestaurant {
            background-color: #4CAF50; /* Verde */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 10px;
        }
        .selectRestaurant:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Restaurantes Disponibles</h2>

<div class="grid-container">

    <?php
    
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "App_Pedidos2";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_restaurante, nombre_restaurante, direccion, tipo_comida, imagen FROM restaurantes";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta SQL: " . $conn->error);
}


if ($result->num_rows > 0) {
    // Mostrar cada restaurante
    
    while($row = $result->fetch_assoc()) {
        echo"<div class='restaurante'>";
        if ($row["imagen"]) {
            echo"<img src='" . $row["imagen"] . "' alt='Imagen de " . $row["nombre_restaurante"] . "'>";
        }
        echo"<h2>" . $row["nombre_restaurante"] . "</h2>";
        echo"<p>Dirección: " . $row["direccion"] . "</p>";
        echo"<p>Tipo de Comida: " . $row["tipo_comida"] . "</p>";
        
        echo'<a href="foods.html?id_restaurante=' . urlencode($row["id_restaurante"]) . '">';
        echo'<button class="selectRestaurant"> Ver Menú </button>';

        echo"</div>";
    }
} else {
    echo"No hay restaurantes disponibles.";
}

$conn->close();
?>

</div>
    
</body>
</html>
