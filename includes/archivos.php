<?php
session_start();
if (isset($_SESSION['matricula'])) {
?>
<?php include("header.php") ?>
<?php include "conexion.php";

  if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    $sql = "SELECT archivos.id_archivo, archivos.nombre as nombreArchivo,archivos.ruta as RUTA, usuario.id , usuario.Nombre as nombreAlumno\n"
      . "FROM `t_archivos` as archivos INNER join alumno as usuario on archivos.id_alumno = usuario.id and archivos.id_alumno = $idUsuario;";
    $result = mysqli_query($conexion, $sql);
  }
  ?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <br>
            <h3 class="panel-title">Descargas Disponibles</h3>
        </div>
        <div class="panel-body">
            <!--  PRUEBA TABLA CON BOOSTRAP -->
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th width="70%">Nombre del Archivo</th>

                            <th width="13%">Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            while ($mostrar = mysqli_fetch_array($result)) {
              $rutaDescarga = "../archivos/" . $idUsuario . "/" . $mostrar['nombreArchivo'];
              $nombreArchivo = $mostrar['nombreArchivo'];
              //$fecha = $mostrar['Fecha'];
              $idArchivo = $mostrar['id_archivo'];
            ?>
                        <tr>
                            <!-- DESCARGAR ARCHIVO-->
                            <td><?php echo $mostrar['nombreArchivo']; ?></td>

                            <td>
                                <a href="<?php echo $rutaDescarga; ?>" download="<?php $nombreArchivo ?>"
                                    class="btn btn-info ">
                                    <i class="fas fa-file-download"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
            }

            ?>
                    </tbody>
                </table>
            </div>

        </div>


        <!--  PRUEBA TABLA CON BOOSTRAP -->
        <?php

  } else {
    header("location: ../index.php");
  }
  include("futter.php");



    ?>