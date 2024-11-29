

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="estilos/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Document</title>

</head>
<body>
<div>
  <form action="../controlador/login_validacion.php" method="post">
      <div class="imgcontainer">
        <img src="vista/media/user.png" class="avatar">
      </div>
      <?php
if (isset($_GET['error'])) {
    echo '<div style="color: white; text-align: center; margin-top: 20px;">';
    switch ($_GET['error']) {
        case '1':
            echo "Todos los campos son obligatorios.";
            break;
        case '2':
            echo "Credenciales inválidas.";
            break;
        default:
            echo "Error desconocido.";
    }
    echo '</div>';
}
?>

      <div class="container">
        <label for="uer"><b>Usuario:</b></label>
        <input type="text" placeholder="Ingrese su Usuario" name="user" required id="user">
    
        <label for="password"><b>Contraseña:</b></label>
        <input type="password" placeholder="Ingrese la Contraseña" name="password" required id="password">
    
        <button type="submit">Ingresar</button>
       
      </div>
    
  
    </form>
  </div>  
    
</body>
</html>



