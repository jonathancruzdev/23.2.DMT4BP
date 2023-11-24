<?php
  // 1. Requiero la conexion
  // 2.REcibio los datos
  // 3. REalizo el INSERT
  require_once('html/header.html');
  require_once('html/menu.html');

  if(  isset( $_POST['nombre'] ) && isset( $_POST['email'] ) && isset($_POST['password'] ) ){

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_rol = 2;  // Los usuarios que se registran son visitantes
  
    require_once('conexion.php');
    $sql = "INSERT INTO usuarios(nombre, email, pass, id_rol)
            VALUES('$nombre', '$email', '$password', $id_rol)";
    mysqli_query($conexion, $sql);
    $mensaje = 'Usuario registrado';
    require_once('html/mensaje.html');

  } else {
    // Muestro el error
    $mensaje = 'Ocurrio un error :(';
    require_once('html/mensaje.html');
  }


  require_once('html/footer.html');

?>