<?php
    require_once('html/header.html');
    require_once('html/menu.html');
    require_once('conexion.php');

    if( isset( $_SESSION['id_usuario'])){
        $logueado =  true;
    } else {
        $logueado = false;
    }

    $id_producto = $_GET['id'];

    $sql = "SELECT id_producto, nombre, precio, fotourl 
            FROM productos
            WHERE id_producto = $id_producto";
    $resultado = mysqli_query($conexion, $sql);
    $array = mysqli_fetch_assoc( $resultado);

    $id_producto = $array['id_producto'];
    $nombre = $array['nombre'];
    $precio = $array['precio'];

    $foto = $array['fotourl'];

    // obtengo los comentarios del producto
    $sqlComentarios =  "SELECT id_comentario, fecha, detalle, comentarios.id_usuario, nombre
                        FROM comentarios
                        INNER JOIN usuarios ON usuarios.id_usuario = comentarios.id_usuario
                        WHERE id_producto = $id_producto";
    
    $resultComentarios = mysqli_query($conexion, $sqlComentarios);
   
?>
<main class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card p-3">
                <img src="<?php echo($foto); ?>" class="img-fluid" alt="Zapa">

            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <h2><?php echo($nombre); ?></h2>
            <h4>$<?php echo($precio); ?></h4>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, sed unde maxime aut est dolor accusamus voluptates numquam nam tempora cupiditate molestias officia repudiandae incidunt minima minus, fugit blanditiis ipsa?
            </p>
            <hr>
            <div class="comentarios">
                <ul class="list-group">
                    <?php
                        while( $arrayC = mysqli_fetch_assoc( $resultComentarios)) {
                            $id_comentario = $arrayC['id_comentario'];
                            $detalle = $arrayC['detalle'];
                            $id_usuario = $arrayC['id_usuario'];
                            $nombre = $arrayC['nombre'];
                            $fecha = $arrayC['fecha'];



                            echo("<li class='list-group-item'>
                                    <strong> $nombre </strong>
                                    $detalle 
                                </li>" );
                        }
                    ?>
                    

                </ul>
            </div>
            
            <?php
                if( $logueado == true ){

            ?>
                <form action="crearComentario.php?id=<?php echo($id_producto);?>" method="post" class="m-4">
                    <textarea name="detalle" class="form-control" cols="30" rows="3"></textarea>
                    <button class="btn btn-success mt-2" type="submit">Comentar</button>
                </form>
            <?php
                } else {

            ?>  

                <div class="alert alert-success mt-2" role="alert">
                    Para comentar tenes que inciar sesión
                    <a href="login.php"> Login </a>
                </div>

            <?php
                }
            ?>

        </div>

    </div>
</main>

<?php
  require_once('html/footer.html');

?>