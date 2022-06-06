<?php include "conexion.php";
session_start();
if (isset($_SESSION['matricula'])) {
    include("header.php");
?>

    <body class="center">
        <div class="container p-16">
            <hr style="margin-top:20px;margin-bottom: 20px; ">
            <div class="row">
                <div class="col-md-4">
                    <?php if (isset($_SESSION['massage'])) {    ?>
                        <div class="alert alert-<?= $_SESSION['massage_type'];  ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['massage']  ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php }
                    session_unset();
                    session_reset();
                    ?>

                    <div class="card card-body">
                        <form action="save.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="matricula" class="form-control" placeholder="Matricula" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="save" value="GUARDAR">
                        </form>
                    </div>

                </div>

    </body>

<?php
    include("futter.php");
} else {
    header("location: ../HOME.php");
}
?>