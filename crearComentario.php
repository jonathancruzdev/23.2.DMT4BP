<?php
    session_start();

    require_once('html/header.html');
    require_once('html/menu.html');
    require_once('conexion.php');
    if( isset( $_SESSION['id_usuario'] ) ){
        $id_producto = $_GET['id'];
        $detalle = $_POST['detalle'];
        $id_usuario = $_SESSION['id_usuario'];
    
        $sql = "INSERT INTO comentarios(detalle, fecha, id_usuario, id_producto)
                VALUES('$detalle', NOW(),  $id_usuario, $id_producto)";
        mysqli_query($conexion, $sql);
    
    
        header('Location: productoDetalle.php?id='.$id_producto);
    } else {
        $mensaje = 'No estas logueado';
        require_once('html/mensaje.html');
    }



?>