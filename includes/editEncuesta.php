<?php
session_start();
if (isset($_SESSION['matricula'])) {
?>
<?php include 'conexion.php';
  if (isset($_GET['Id_encuesta'])) {
    $id = $_GET['Id_encuesta'];
    $query = "SELECT * FROM `encuesta` INNER join materias on encuesta.Materia= materias.ID INNER JOIN maestros on encuesta.Docente= maestros.ID WHERE Id_encuesta = $id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['Nombre_Docente'];
      $matricula = $row['Nombre'];
      // $contrasena = $row['Contrasena'];
      $status = $row[4];
    }
  if (isset($_POST['update'])) {
    $id = $_GET["Id_encuesta"];
    $status = $_POST['Status'];
    $query = "UPDATE `encuesta` SET `Status` = '$status' WHERE Id_encuesta=$id";
    mysqli_query($conexion, $query);
      echo "<script>
     alert('!Actualizado Correctamente :)!');
     window.location= 'encuestas.php'
     </script>";
  }
}
  ?>

<?php include 'header.php' ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editEncuesta.php?Id_encuesta=<?php echo $_GET["Id_encuesta"]; ?>" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Nombre del Docente</label>
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>"
                            placeholder="Update Nombre" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Materia</label>
                        <input name="matricula" type="text" class="form-control" value="<?php echo $matricula; ?>"
                            placeholder="Update Nombre" disabled>
                    </div>
                    <div class="form-group">
                        <?php 
                        if ($status == 1) {
                          echo ' <label class="font-weight-bold">Estado actual: Activado</label>';
                        }else{
                          echo '  <label class="font-weight-bold">Estado actual: Desactivado</label>';
                        }
                        ?>
                        <select class="form-control" name="Status">
                            <option value="1">Activar</option>
                            <option value="2">Desactivar</option>
                        </select>
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
  header("location: ../index.php");
}
include("futter.php");
?>