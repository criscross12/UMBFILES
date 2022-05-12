<?php include "conexion.php";
session_start();
if (isset($_SESSION['matricula'])) {
    $id = $_GET['ID'];
    $query = "SELECT * FROM maestros WHERE ID = $id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['Nombre_Docente'];
      $matricula = $row['Matricula'];
    }
?>
    <?php include 'header.php' ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editMaestros.php" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold">Nombre</label>
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Nombre">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Apellido Paterno</label>
                            <input name="AP" type="text" class="form-control" value="<?php  echo $id; ?>" placeholder="Update Nombre">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Apellido Materno</label>
                            <input name="AM" type="text" class="form-control" value="<?php  ?>" placeholder="Update Nombre">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Matricula</label>
                            <input name="Matricula" type="text" class="form-control" value="<?php echo $matricula ?>" disabled>
                        </div>
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