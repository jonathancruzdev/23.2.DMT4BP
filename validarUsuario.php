<?php
  // 1. Requiero la conexion
  // 2.REcibio los datos
  // 3. REalizo el SEELCT
  require_once('html/header.html');
  require_once('html/menu.html');
  if( isset( $_POST['email']) &&  isset($_POST['password'] )){
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    require_once('conexion.php');
    $sql = "SELECT id_usuario, nombre, email, id_rol
            FROM usuarios
            WHERE email = '$email' AND pass = '$password'";
  
    $resultado = mysqli_query($conexion, $sql);
    $array = mysqli_fetch_assoc($resultado);
   
    if( $array ) {
      $_SESSION['id_usuario'] = $array['id_usuario'];
      $_SESSION['nombre'] = $array['nombre'];
      $_SESSION['id_rol'] = $array['id_rol'];


      header('Location: index.php');
    } else {
      $mensaje = 'Usuario o Contraseña ivalidos';
      require_once('html/mensaje.html');
    }
  

  } else {
    // Muestro el error
    $mensaje = 'Ocurrio un error :(';
    require_once('html/mensaje.html');
  }


  require_once('html/footer.html');



?>