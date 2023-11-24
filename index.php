<?php
    require_once('conexion.php');

    if( isset( $_GET['id_categoria'] ) ){
        $id_categoria = $_GET['id_categoria'];
        
        $sql = "SELECT id_producto, nombre, precio, fotourl 
                FROM productos
                WHERE id_categoria = $id_categoria";
    } else {
        $sql = "SELECT id_producto, nombre, precio, fotourl 
                FROM productos";
    }


    $resultado = mysqli_query($conexion, $sql);

    require_once('html/header.html');
    require_once('html/menu.html');
?>


    <main class="container">
        <div class="row d-flex justify-content-evenly gap-3 mt-4">

        <?php
                 
                while( $array = mysqli_fetch_assoc( $resultado)) {
                     $id_producto = $array['id_producto'];
                     $nombre = $array['nombre'];
                     $foto = $array['fotourl'];

                    echo("<div class='col-md-3 col-lg-2 card p-2'>
                            <img src='$foto' alt='$nombre'>
                            <h4 class='text-center'>$nombre</h4>
                            <a href='productoDetalle.php?id=$id_producto' class='btn btn-success'> Ver</a>
                        </div>");
                 }
        ?>

        </div>
    </main>
<?php
    require_once('html/footer.html');
?>
