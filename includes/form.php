<?php include "conexion.php";
session_start();
if (isset($_SESSION['id'])) {
    $idUsuario = $_SESSION['id'];
    $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql);
    include("headeralum.php");
    $sql = "SELECT * FROM preguntas WHERE categoria= 1";
    $pre = mysqli_query($conexion, $sql);
    $sqlRes = "SELECT * FROM respuestas";
    $res = mysqli_query($conexion, $sqlRes);
?>
    <?php
    $id = $_POST['Id_encuesta'];
    $idDocente = $_POST['iddocente'];
    $IdMateria  = $_POST['idasignatura'];
    $idCarrera = $_POST['idcarrera'];
    $IdSemestre = $_POST['idsemestre'];
    $hoy = new DateTime("now", new DateTimeZone('America/Mexico_City'));
    $today = $hoy->format("Y-m-d");
    $Anio  = $hoy->format("Y");
    $query = "SELECT * FROM `encuesta` INNER join materias on encuesta.Materia= materias.ID INNER JOIN maestros on encuesta.Docente= maestros.ID WHERE Id_encuesta = $id";
    $encuesta = mysqli_query($conexion, $query);
    $enc = mysqli_fetch_assoc($encuesta);
    $nombre_materia =  $enc["Nombre"];
    $nombre_docente =  $enc['Nombre_Docente'];
    $select  = "SELECT MAX(IdEncuestaRes) as ELMAX from encuesta_respuestas";
    $max = $conexion->query($select);
    $row = $max->fetch_assoc();
    $idEncuestaRes = $row['ELMAX'] + 1;

    $inserta = "INSERT INTO `encuesta_respuestas`(`IdEncuestaRes`, `Id_encuesta`, `IdUsuario`, `IdCarrera`, `IdSemestre`, `IdDocente`, `IdAsignatura`, `FechaEncuesta`, `Revisado`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `P8`, `P9`, `P10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `p24`, `p25`, `p26`, `p27`, `p28`, `p29`, `p30`, `p31`, `p32`, `p33`, `p34`, `p35`, `p36`, `p37`, `p38`, `p39`, `p40`, `p41`, `p42`, `p43`, `p44`, `p45`, `p46`, `p47`, `p48`, `p49`, `p50`, `p51`, `p52`, `p53`, `p54`, `p55`, `p56`, `p57`, `p58`, `p59`, `p60`, `p61`, `p62`, `p63`, `Promedio`, `Activo`, `IdEncuestaInterna`, `Anio`) VALUES 
    ( $idEncuestaRes , $id,$idUsuario,$idCarrera,$IdSemestre,$idDocente,$IdMateria,'$today',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,$Anio)";
    $conexion->query($inserta) || die($conexion->error);

    ?>

    <body class="text-center">
        <main role="main" class="inner cover">
            <h1 class="cover-heading">Encuesta de <?= $nombre_materia ?></h1>
            <main role="main" class="container">
                <div class="panel panel-primary">
                    <div class="alert alert-success" role="alert" style="text-align: justify;">
                        Objetivo: Evaluar el desempeño docente en las clases impartidas en la UES Xalatlaco, para detectar
                        deficiencias, en el proceso enseñanza aprendizaje para la retroalimentación
                        correspondiente al Docente para mejorar las técnicas y métodos utilizados en la cátedra. </div>
                    <div class="alert alert-success" role="alert" style="text-align: justify;">
                        Indicaciones: Contesta lo siguiente a fin de evaluar el desempeño del docente:
                        <?= $nombre_docente ?></div>
                    <div class="panel-body">
                        <div class="alert alert-primary" role="alert">
                            Sobre las clases
                        </div>
                        <form action="form2.php?Id_encuesta=<?php echo $id ?>" method="POST">
                            <table class="table table-primary  table-striped">
                                <thead>
                                    <tr>
                                        <th width="25%"></th>
                                        <th width="13%">Totalmente en desacuerdo</th>
                                        <th width="13%">Desacuerdo</th>
                                        <th width="13%">Ni en acuerdo ni en desacuerdo</th>
                                        <th width="13%">De acuerdo</th>
                                        <th width="13%">Totalmente de acuerdo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($mostrarP = mysqli_fetch_array($pre)) {
                                    ?>
                                        <tr>

                                            <td><?php echo $mostrarP['Texto'] ?></td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="Pregunta<?php echo $mostrarP[0] ?>" id="flexRadioDefault1" value="1">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="Pregunta<?php echo $mostrarP[0] ?>" id="flexRadioDefault1" value="2">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="Pregunta<?php echo $mostrarP[0] ?>" id="flexRadioDefault1" value="3">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="Pregunta<?php echo $mostrarP[0] ?>" id="flexRadioDefault1" value="4">
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="Pregunta<?php echo $mostrarP[0] ?>" id="flexRadioDefault1" value="5" checked>
                                            </td>
                                        <tr> <input TYPE="HIDDEN" NAME="pre<?php echo $mostrarP[0] ?>" value="<?php echo $mostrarP[0] ?>"></tr>
                                        </tr>
                                    <?php } ?>
                                    <tr> <input TYPE="HIDDEN" NAME="Id_encuesta" value="<?= $idEncuestaRes ?>"></tr>
                                    <tr> <input TYPE="HIDDEN" NAME="Nombre_materia" value="<?= $nombre_materia ?>"></tr>
                                    <tr> <input TYPE="HIDDEN" NAME="Nombre_docente" value="<?= $nombre_docente ?>"></tr>
                                    <tr> <input TYPE="HIDDEN" NAME="Id_Encuesta_Res" value="<?= $idEncuestaRes ?>"></tr>
                                </tbody>
                            </table>
                            <div class="container">
                                <button class="btn btn-info" name="Siguiente">
                                    Siguiente
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Fin tabla-->
                </div>
                </div>
            </main>
        </main>
    </body>

    </html>
<?php
} else {
    include("futter.php");
    header("location: ../index.php");
}
include("futter.php");
?>