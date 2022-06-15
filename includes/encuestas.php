<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
    $Id_admin = $_SESSION['Id_admin'];
    $sql = mysqli_query($conexion, "SELECT * FROM `administradores` where Id_admin = '$Id_admin'");
    $filas = mysqli_fetch_assoc($sql);
    $id_admin_carrera = $filas['Carrera'];
    include("header.php");
    $sqlEncuestas = "SELECT * FROM encuesta INNER join materias on encuesta.Materia= materias.ID INNER join semestre on semestre.id = materias.Semestre INNER JOIN carrera on carrera.id = materias.Carrera";
    $res = mysqli_query($conexion, $sqlEncuestas);
    $sqlMaestros = "SELECT * FROM maestros";
    $resultMaestros = mysqli_query($conexion, $sqlMaestros);
    $sqlMaterias = "SELECT * FROM materias WHERE Carrera = '$id_admin_carrera'";
    $resultMaterias = mysqli_query($conexion, $sqlMaterias);
    //TODO BUSQUEDA DE SEMESTRES
    $sqlSemestre = "SELECT * FROM `semestre` WHERE mod(id,2) = 0";
    $resultSemestre = mysqli_query($conexion, $sqlSemestre);
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
                + Crear nuevas encuestas
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
                        <div class="alert alert-warning" role="alert">
                            <div class="container">
                                <h5 class="alert-heading text-center">AVISO IMPORTANTE</h5>
                                <hr>
                                <p style="text-align: justify;">Al seleccionar un semestre, dara de alta todas las materias que pertenescan a este por todas las carreras con las que cuenta la UESX</p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="encuestas/saveEncuesta.php">
                            <!--   PRUEBA CON SELECT  -->
                            <div class="form-group">
                                <label class="font-weight-bold">Semestre</label>
                                <select class="form-control" name="Semestre" autofocus required>
                                    <option value="0">Seleccione:</option>
                                    <?php
                                    while ($filasMa = mysqli_fetch_array($resultSemestre)) {
                                        $id_semestre = $filasMa['id'];
                                        $nombre_semestre = $filasMa['nombre_semestre'];
                                        echo $id_semestre;
                                        echo $nombre_semestre;                                  
                                        echo '<option value="' . $id_semestre . '">' . $nombre_semestre . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label class="font-weight-bold">Fecha limite</label>
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                <input type="date" name="FechaFin" class="form-control" required>
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
                            <th width="70%">Materia</th>
                            <th width="13%">Semestre</th>
                            <th width="13%">Carrera</th>
                            <th width="13%">Editar</th>
                            <!-- <th width="13%">Reporte</th> -->
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
                                <td><?php echo $mostrar['Nombre'] ?></td>
                                <td><?php echo $mostrar['nombre_semestre'] ?></td>
                                <td><?php echo $mostrar['Nombre_Carrera'] ?></td>
                                <td>
                                    <a href="editEncuesta.php?Id_encuesta= <?php echo $mostrar["Id_encuesta"]; ?>" class="btn btn-info ">
                                        <i class="fas fa-edit"></i>
                                </td>
                                <!-- Generar encuesta -->
                                <!-- <td>
                                    <a href="reporte2.php?Id_encuesta= <?php echo $mostrar["Id_encuesta"]; ?>" class="btn btn-info ">
                                        <i class="fas fa-file-signature"></i>
                                </td> -->
                                <!-- ELIMINAR ARCHIVO-->
                                <td>
                                    <a href="encuestas/deleteEncuesta.php?id=<?php echo $mostrar['Id_encuesta'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt" onclick="return confirm('Esta seguro de eliminar al alumno?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></i>
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