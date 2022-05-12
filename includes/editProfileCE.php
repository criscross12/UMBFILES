<?php include "conexion.php";
session_start();
$idCE = $_SESSION['matricula'];
if (isset($_SESSION['matricula'])) {
?>
<?php
    $sql = mysqli_query($conexion, 'SELECT * FROM `ce` WHERE Matricula = '.$idCE.' ');
    $filas = mysqli_fetch_assoc($sql);
    $nombre = $filas['Nombre'];
    $Ap_Paterno = $filas['Ap_Paterno'];
    $Ap_Materno = $filas['Ap_Materno'];
    $matricula = $filas['Matricula'];
    $password = $filas['Contrasena'];
    ?>
<?php include 'header.php' ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="CE_CRUD/UptadeProfileCe.php" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Nombre</label>
                        <input name="nombre" type="text" class="form-control" value="<?= utf8_encode($nombre); ?>"
                            placeholder="Update Nombre">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Apellido Paterno</label>
                        <input name="AP" type="text" class="form-control" value="<?= utf8_encode($Ap_Paterno); ?>"
                            placeholder="Update Nombre">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Apellido Materno</label>
                        <input name="AM" type="text" class="form-control" value="<?=utf8_encode($Ap_Materno)  ?>"
                            placeholder="Update Nombre">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Matricula</label>
                        <input name="Matricula" type="text" class="form-control" value="<?=$matricula ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Contraseña</label>
                        <input name="password" type="text" class="form-control" value="<?= $password ?>">
                    </div>
                    <input type="hidden" name="idCe" value="<?=$idCE?>">
                    <!--   PRUEBA CON SELECT  -->
                    <div class="container text-center">
                        <button class="btn btn-success" name="update">
                            Actualizar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php

} else {
    include("futter.php");
    header("location: ../index.php");
}
include("futter.php");



?>