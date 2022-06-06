<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['id'];
if (isset($_SESSION['id'])) {

  $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
  $filas = mysqli_fetch_assoc($sql);
  include("headeralum.php");
?>


<main role="main" class="container">
    <h4 class="cover-heading">Bienvenido Alumn@: <?php echo $filas['Nombre'] ?></h4>
    <div class="jumbotron">
        <h1>Cargar Archivos</h1>
        <div class="col-lg-6">
            <form method="POST" action="CargarFicheros.php" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <label class="btn btn-success" for="">
                        <input required="" class="form-control bg-success text-white text-white"  type="file" name="subir" accept="application/pdf" />
                    </label>
                </div>               
                <button class="btn btn-success" type="submit">Subir Archivo</button>
            </form>
        </div>

    </div>
</main>
<!-- -->
<?php

  $idUsuario = $_SESSION['id'];
  $sql = "SELECT archivos.id_archivo as Id_archivo, archivos.nombre as nombreArchivo, archivos.ruta as RUTA, usuario.id , usuario.Nombre as nombreAlumno\n"
    . "FROM `t_archivos` as archivos INNER join alumno as usuario on archivos.id_alumno = usuario.id and archivos.id_alumno = $idUsuario;";
  $result = mysqli_query($conexion, $sql);
  ?>

<main role="main" class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Mis Archivos</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="70%">Nombre del Archivo</th>
                            <th width="13%">Descargar</th>
                            <th width="10%">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            while ($mostrar = mysqli_fetch_array($result)) {
              $rutaDescarga = "../archivos/" . $idUsuario . "/" . $mostrar['nombreArchivo'];
              $nombreArchivo = $mostrar['nombreArchivo'];
              $idArchivo = $mostrar['Id_archivo'];

            ?>
                        <tr>
                            <!-- DESCARGAR ARCHIVO-->
                            <td><?php echo $mostrar['nombreArchivo']; ?></td>
                            <td>
                                <a href="<?php echo $rutaDescarga; ?>" download="<?php $nombreArchivo ?>"
                                    class="btn btn-info ">
                                    <i class="fas fa-file-download"></i>
                            </td>
                            <!-- ELIMINAR ARCHIVO-->
                            <td>
                                <a href="Eliminar.php?id_archivo=../archivos/<?php echo $idArchivo; ?>"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash-alt"
                                        onclick="return confirm('Esta seguro de eliminar al alumno?');"> <span
                                            class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- Fin tabla-->
    </div>
    </div>


</main>
<?php

} else {
  header("location: ../index.php");
}
include("futteralum.php");



?>