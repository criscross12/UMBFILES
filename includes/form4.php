<?php include "conexion.php";
session_start();
if (isset($_SESSION['id'])) {
    $idUsuario = $_SESSION['id'];
    $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql);
    include("headeralum.php");
    $sql = "SELECT * FROM `preguntas` INNER join Categoria_Pregunta on Categoria_Pregunta.id_cate_pre = preguntas.categoria WHERE preguntas.categoria = 4";
    $pre = mysqli_query($conexion, $sql);
    $sqlPre = "SELECT * FROM `preguntas` INNER join Categoria_Pregunta on Categoria_Pregunta.id_cate_pre = preguntas.categoria WHERE preguntas.categoria = 4";
    $cat = mysqli_query($conexion, $sqlPre);
    $filasCat = mysqli_fetch_assoc($cat);
?>
    <?php
    // Datos generales de la encuesta
    $id = $_POST['Id_encuesta'];
    $idEncuestaRes = $_POST['Id_Encuesta_Res'];
    $nombre_docente = $_POST['Nombre_docente'];
    $nombre_materia = $_POST['Nombre_materia'];

    // //Resultados de la encuesta: Tercera parte
    $prom3 = $_POST['Prom3'];
    $p13 = $_POST['Pregunta13'];
    $p14 = $_POST['Pregunta14'];
    $p15 = $_POST['Pregunta15'];
    $p16 = $_POST['Pregunta16'];
    $prom4 = ($p13 + $p14 + $p15 + $p16) / 4;
    $prom5 = $prom3 + $prom4;
    $sqlinsert1 = "UPDATE encuesta_respuestas set P13=" . $p13 . ", P14=" . $p14 . ",  P15=" . $p15 . ",  P16=" . $p16 . "  where IdEncuestaRes=$idEncuestaRes";
    $conexion->query($sqlinsert1) || die("Error: ");
    // 
    ?>

    <body class="text-center">
        <main role="main" class="inner cover">
            <h1 class="cover-heading">Encuesta </h1>
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
                            <?= $filasCat['Categoria'] ?>
                        </div>
                        <form action="form5.php?Id_encuesta=<?php echo $id ?>" method="POST">
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
                                        $preguntaTXT = $mostrarP['Texto'];
                                    ?>
                                        <tr>
                                            <td><?php echo $mostrarP['Id'] . "._" . " " . $preguntaTXT ?></td>
                                            <td>
                                                <input class="form-check-input" type="radio" name="Pregunta<?php echo $mostrarP[0] ?>" id="flexRadioDefault1" value="0" >
                                            </td>
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
                                                <input class="form-check-input" type="radio" name="Pregunta<?php echo $mostrarP[0] ?>" id="flexRadioDefault1" value="4" checked>
                                            </td>
                                        <tr> <input TYPE="HIDDEN" NAME="pre<?php echo $mostrarP[0] ?>" value="<?php echo $mostrarP[0] ?>"></tr>
                                        </tr>
                                    <?php } ?>
                                    <tr> <input TYPE="HIDDEN" NAME="Id_encuesta" value="<?= $id ?>"></tr>
                                    <tr> <input TYPE="HIDDEN" NAME="Nombre_materia" value="<?= $nombre_materia ?>"></tr>
                                    <tr> <input TYPE="HIDDEN" NAME="Nombre_docente" value="<?= $nombre_docente ?>"></tr>
                                    <tr> <input TYPE="HIDDEN" NAME="Id_Encuesta_Res" value="<?= $idEncuestaRes ?>"></tr>
                                    <tr> <input TYPE="HIDDEN" NAME="Prom5" value="<?= $prom5 ?>"></tr>
                                </tbody>
                            </table>
                            <div class="container">
                                <button class="btn btn-info" name="Enviar">
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