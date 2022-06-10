<?php
include "conexion.php";
include "sessiones.php";
$sqlEncuestas = "SELECT * FROM encuesta WHERE Status= 1";
$res = mysqli_query($conexion, $sqlEncuestas);
$sqlMaterias = "SELECT * FROM `materias` where Carrera = '$idCarrera' and Semestre ='$idSemestre' ";
$resMaterias = mysqli_query($conexion, $sqlMaterias);
$sqlNameM = "SELECT * FROM `encuesta` INNER JOIN materias on materias.ID= encuesta.Materia INNER JOIN maestros on maestros.ID = encuesta.Docente where materias.Carrera = '$idCarrera' and materias.Semestre = '$idSemestre'";
$resMa = mysqli_query($conexion, $sqlNameM);

include("headeralum.php");
?>

<body class="text-center">
    <main role="main" class="inner cover">
        <div class="alert alert-success" role="alert">
            <div class="container">
                <h3 class="alert-heading text-center">EVALUACIÓN DOCENTE!</h3>
                <hr>
                <p style="text-align: justify;">Modulo para constestar encuestas acerca del desempeño de los docentes en sus respectivas materias que te impartierón durante este semestre, por favor se lo más objetivo</p>
            </div>
        </div>
        <main role="main" class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Encuestas</h3>
                </div>
                <div class="panel-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="13%">Materia</th>
                                <th width="13%">Docente</th>
                                <th width="13%">Fecha de Publicación</th>
                                <th width="13%">Fecha Limite</th>
                                <th width="13%">Contestar</th>
                                <th width="10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($mostrar = mysqli_fetch_array($resMa)) {
                                $status = $mostrar['Status'];
                                $fecha = $mostrar['Fecha'];
                                $idDocente = $mostrar['Docente'];
                                $idMateria = $mostrar['Materia'];
                                $idSemestre = $mostrar['Semestre'];
                            ?>
                                <tr>
                                    <td><?php echo $mostrar['Nombre']; ?></td>
                                    <td><?php echo $mostrar['Nombre_Docente'] . " " . $mostrar['Ap_Paterno'] . " " . $mostrar['Ap_Materno']; ?></td>
                                    <td><?php echo $fecha;  ?></td>
                                    <td><?php echo $mostrar['FechaFin'];  ?></td>
                                    <td>
                                        <form action="form.php" method="post">
                                            <input type="hidden" name="Id_encuesta" value="<?= $mostrar['Id_encuesta'] ?>">
                                            <input type="hidden" name="iddocente" value="<?= $idDocente ?>">
                                            <input type="hidden" name="idasignatura" value="<?= $idMateria ?>">
                                            <input type="hidden" name="idcarrera" value="<?= $idCarrera ?>">
                                            <input type="hidden" name="idsemestre" value="<?= $idSemestre ?>">
                                            <input type="submit" value="contestar">
                                        </form>

                                        <!-- <a href="form.php?Id_encuesta=<?php echo $mostrar['Id_encuesta'] ?>">
                                        <i class="fas fa-pencil-alt"></i> -->
                                    </td>
                                    <?php
                                    if ($status == "1") {
                                        echo  '<td>
                                    <a  class="btn btn-success">
                                        <i class="fas fa-check-square"></i>
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
    </main>

</body>

</html>