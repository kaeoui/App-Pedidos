<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Sesión</title>
  <link rel="stylesheet" href="../css/styles.css">

</head>

<body>

  <div id="login">

    <form method="post" action="">
      <div class="form-outline form-white mb-4">

        <label class="form-label" for="user">Usuario</label>
        <input required type="text" name="nombre_usuario" class="form-control form-control-lg" />

      </div>

      <div class="form-outline form-white mb-4">
        <label class="form-label" for="passw">Contraseña</label>
        <input required type="password" name="contraseña" class="form-control form-control-lg" />
      </div>

      <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="#!">Olvidó la contraseña?</a></p>

      <input class="boton-inicio" name="boton-inicio" type="submit" value="Iniciar Sesión">

      <?php


                  $mysqli = new mysqli('localhost', 'root', '', 'app_pedidos2');

                  if (isset($_POST['boton-inicio'])) {
                  if ($_POST['nombre_usuario'] == '' or $_POST['contraseña'] == '') {
                  echo 'Por favor, ingrese usuario y contraseña.';
                  } else {
                  $nombre_usuario = $mysqli->real_escape_string($_POST['nombre_usuario']);
                  $contraseña = $mysqli->real_escape_string($_POST['contraseña']);

                  $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contraseña = '$contraseña'";
                  $result = $mysqli->query($query);

                  if ($result->num_rows > 0) {
                  session_start();

                  $usuarioData = $result->fetch_assoc();

                  $_SESSION['id_usuario'] = $usuarioData['id_usuario'];
                  $_SESSION['nombre_usuario'] = $usuarioData['nombre_usuario'];

                  // Redirigir a la página 
                  header('Location: ../restaurants.html');
                  exit();
                  } else {
                  echo "Credenciales incorrectas. Intente nuevamente.";
                  }
                  }
                  }

                  ?>


    </form>

    <br> </br>
    <p class="small mb-3 pb-lg-2"><a class="text-white" href="#!" onclick="abrirOtraPagina()">Crear una cuenta</a></p>

    <script>
      function abrirOtraPagina() {
        window.location.href = 'index.php';
      }
    </script>

  </div>

  </div>
</body>

</html>