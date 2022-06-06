<?php
session_start();
if (isset($_SESSION['matricula'])) {
?>
<?php include 'conexion.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM alumno WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombre = $row['Nombre'];
      $matricula = $row['Matricula'];
      $contrasena = $row['Contrasena'];
      $carrera = $row['Carrera'];
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $contrasena = $_POST['Contrasena'];
    $carrera = $_POST['Carrera'];
    if ($carrera == 'ISC') {
      $query = "UPDATE `alumno` SET `Nombre` = '$nombre', `Matricula` = '$matricula', `Contrasena` = '$contrasena' , `Carrera`= '$carrera' WHERE id=$id";
      mysqli_query($conexion, $query);
      echo "<script>
     alert('!Actualizado Correctamente :)!');
     window.location= 'modificar.php'
     </script>";
    } else if ($carrera == 'IMA') {
      $query = "UPDATE `alumno` SET `Nombre` = '$nombre', `Matricula` = '$matricula', `Contrasena` = '$contrasena' , `Carrera`= '$carrera' WHERE id=$id";
      mysqli_query($conexion, $query);
      echo "<script>
     alert('!Actualizado Correctamente :)!');
     window.location= 'modificar.php.php'
     </script>";
    } else if ($carrera == 'IGE') {
      $query = "UPDATE `alumno` SET `Nombre` = '$nombre', `Matricula` = '$matricula', `Contrasena` = '$contrasena' , `Carrera`= '$carrera' WHERE id=$id";
      mysqli_query($conexion, $query);
      echo "<script>
     alert('!Actualizado Correctamente :)!');
     window.location= 'modificar.php.php'
     </script>";
    }
  }
  ?>

<?php include 'header.php' ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Nombre</label>
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>"
                            placeholder="Update Nombre">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Matricula</label>
                        <input name="matricula" type="text" class="form-control" value="<?php echo $matricula; ?>"
                            placeholder="Update Nombre">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Contraseña</label>
                        <input name="Contrasena" type="text" class="form-control" value="<?php echo $contrasena; ?>"
                            placeholder="Update Nombre">
                    </div>
                    <!--   PRUEBA CON SELECT  -->
                    <div class="form-group">
                        <label class="font-weight-bold">Carrera Actual: <?php echo $carrera; ?></label>
                        <select class="form-control" name="Carrera">
                            <option value="ISC">ISC</option>
                            <option value="IMA">IMA </option>
                            <option value="IGE">IGE</option>
                        </select>
                    </div>

                    <!--   PRUEBA CON SELECT  -->
                    <div class="container">
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