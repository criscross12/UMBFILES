<?php include "conexion.php";
session_start();
if (isset($_SESSION['matricula'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `materias`  WHERE ID = $id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['Nombre'];
      $carrera = $row['Carrera'];
      $semestre = $row['Semestre'];
    }
    $queryCarrera = "SELECT * FROM carrera WHERE id = '$carrera'";
    $result = mysqli_query($conexion,$queryCarrera);
    $row = mysqli_fetch_array($result);
    $carrera = $row['Nombre_Carrera'];
    $querySemestre = "SELECT * FROM semestre WHERE id = '$semestre'";
    $resultS = mysqli_query($conexion,$querySemestre);
    $row = mysqli_fetch_array($resultS);
    $semestre = $row['nombre_semestre'];
?>
<?php include 'header.php' ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editMaestros.php" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Nombre de la materia</label>
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>"
                            placeholder="Update Nombre">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Carrera</label>
                        <input name="AP" type="text" class="form-control" value="<?=$carrera ?>"
                            placeholder="Update Nombre">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Semestre</label>
                        <input name="AM" type="text" class="form-control" value="<?=$semestre  ?>"
                            placeholder="Update Nombre">
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