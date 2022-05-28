<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
  include("header.php");
  $sqlEncuestas = "SELECT * FROM encuesta INNER join materias on encuesta.Materia= materias.ID";
  $res = mysqli_query($conexion, $sqlEncuestas);
  $sqlMaestros = "SELECT * FROM maestros";
  $resultMaestros = mysqli_query($conexion, $sqlMaestros);
  $sqlMaterias = "SELECT * FROM materias";
  $resultMaterias = mysqli_query($conexion, $sqlMaterias);
//   $sql = "SELECT * FROM estatus";
//   $resultStatus = mysqli_query($conexion, $sql);
?>
<div class="alert alert-success" role="alert">
    <div class="container">
        <h3 class="alert-heading text-center">EVALUACIÓN DOCENTE!</h3>
        <hr>
        <p style="text-align: justify;">Modulo para crear encuestas referentes a la evaluación docente que integra la
            UMB UES Xalatlaco</p>
    </div>
</div>
<br>

<main role="main" class="container">
    <!-- Button trigger modal -->
    <div class="col-lg-5">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Agregar nueva encuesta
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Agregar Encuesta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="encuestas/saveEncuesta.php">
                        <!--   PRUEBA CON SELECT  -->
                        <div class="form-group">
                            <label class="font-weight-bold">Docente</label>
                            <select class="form-control" name="Docente" autofocus required>
                                <option value="0">Seleccione:</option>
                                <?php
                                while ($filasCa = mysqli_fetch_array($resultMaestros)) {
                                    echo '<option value="' . $filasCa["ID"] . '">' . utf8_encode($filasCa["Nombre_Docente"]) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Materia</label>
                            <select class="form-control" name="Materia" autofocus required>
                                <option value="0">Seleccione:</option>
                                <?php
                                while ($filasMa = mysqli_fetch_array($resultMaterias)) {
                                    echo '<option value="' . $filasMa["ID"] . '">' . utf8_encode($filasMa["Nombre"]) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label class="font-weight-bold">Estatus</label>
                            <select class="form-control" name="Status" autofocus required>
                                <option value="0">Seleccione:</option>
                                <option value="1">Activar</option>
                                <option value="2">Desactivar</option>                             
                            </select>
                        </div> -->
                        <!-- <div class="form-group">
                            <div class="fl">
                                <label class="font-weight-bold">Nº de opciones:</label>
                                <select name="respuestas" class="form-control">
                                  
                                </select>
                            </div> -->
                        <div class="container">
                            <input type="submit" class="btn btn-success btn-block" name="save" value="GUARDAR">
                            <button type="button" class="btn btn-info btn-block" data-bs-dismiss="modal">←
                                Volver</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
</main>



<main role="main" class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Encuestas</h3>
        </div>
        <div class="table-responsive-sm">

            <table class="table">
                <thead>
                    <tr>
                        <th width="70%">Título</th>
                        <th width="13%">Editar</th>
                        <th width="13%">Reporte</th>
                        <th width="10%">Eliminar</th>
                        <th width="10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            while ($mostrar = mysqli_fetch_array($res)) {
              $status = $mostrar['Status'];
            ?>
                    <tr>
                        <td><?php echo utf8_encode($mostrar['Nombre']);?></td>
                        <td>
                            <a href="editEncuesta.php?Id_encuesta= <?php echo $mostrar["Id_encuesta"]; ?>"
                                class="btn btn-info ">
                                <i class="fas fa-edit"></i>
                        </td>
                        <td>
                            <a href="../fpdf/reporte2.php?Id_encuesta= <?php echo $mostrar["Id_encuesta"]; ?>"
                                class="btn btn-info ">
                                <i class="fas fa-file-signature"></i>
                        </td>
                        <!-- ELIMINAR ARCHIVO-->
                        <td>
                            <a href="encuestas/deleteEncuesta.php?id=<?php echo $mostrar['Id_encuesta'] ?>"
                                class="btn btn-danger">
                                <i class="fas fa-trash-alt"
                                    onclick="return confirm('Esta seguro de eliminar al alumno?');"> <span
                                        class="glyphicon glyphicon-trash" aria-hidden="true"></span></i>
                            </a>
                        </td>
                        <?php
                if ($status == "1") {
                  echo  '<td>
                  <a  class="btn btn-info ">
                    <i class="fas fa-check-square"></i>
                   </td>'
                ?>
                        <?php } elseif ($status == "2") {
                  echo  '<td>
                  <a  class="btn btn-danger ">
                    <i class="fas fa-times"></i>
                   </td>'
                ?>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
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
include("futter.php");
?>