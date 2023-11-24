<?php
     require_once('html/header.html');
     require_once('html/menu.html');
?>
<main class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form method="post" action="validarUsuario.php" class="card p-3 mt-2">
                <label> Email</label>
                <input name="email" type="email" class="form-control">

                <label>Contraseña </label>
                <input name="password" type="password" class="form-control">

                <button type="submit" class="btn btn-success mt-2">Guardar</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</main>