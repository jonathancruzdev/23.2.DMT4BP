<?php
    require_once('html/header.html');
    require_once('html/menu.html');

?>
    <main>
        <h2 class="text-center"> Nuevo Producto</h2>

        <div class="row mt-3">
            <div class="col"></div>
            <div class="col">
                <form action="" class="card p-2">
                    <label for="">nombre</label>
                    <input type="text" class="form-control">

                    <label for="">Precio</label>
                    <input type="text" class="form-control">

                    <label for="">Foto</label>
                    <input type="text" class="form-control">
                </form>
            </div>
            <div class="col"></div>
        </div>
    </main>

<?php
    require_once('html/footer.html');
?>