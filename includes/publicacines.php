<?php
 include "conexion.php";
    include "sessiones.php";
    
    
    $sqlEncuestas = "SELECT * FROM encuesta WHERE Status= 1";
    $res = mysqli_query($conexion, $sqlEncuestas);
    $sqlNameM = "SELECT * FROM `encuesta` INNER join materias on encuesta.Materia= materias.ID where Status=1";
    $resMa = mysqli_query($conexion, $sqlNameM);

    include("headeralum.php");
?>

<body class="text-center">
    <main role="main" class="inner cover">
        <h1 class="cover-heading">Publicaciones <?php echo $filas['Nombre'] ?></h1>
        <main role="main" class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Encuestas</h3>
                </div>
                <div class="panel-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="13%">Título</th>
                                <th width="13%">Fecha de Publicación</th>
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

                                <td><?php echo utf8_encode($mostrar['Nombre']); ?></td>
                                <td><?php echo $fecha;  ?></td>
                                <td>
                                    <form action="form.php" method="post">
                                        <input type="hidden" name="Id_encuesta" value="<?=$mostrar['Id_encuesta']?>">
                                        <input type="hidden" name="iddocente" value="<?=$idDocente ?>">
                                        <input type="hidden" name="idasignatura" value="<?=$idMateria ?>">
                                        <input type="hidden" name="idcarrera" value="<?=$idCarrera ?>">
                                        <input type="hidden" name="idsemestre" value="<?=$idSemestre ?>">
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