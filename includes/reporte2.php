<?php include 'conexion.php';
require ('jpgraph/src/jpgraph.php');
require ('jpgraph/src/jpgraph_bar.php');
session_start();
$idUsuario = $_SESSION['Id_admin'];
//eliminar gráficos anteriores en la carpeta temporal
$files = glob('img/graficas/*'); //obtenemos todos los nombres de los ficheros
foreach ($files as $file) {
    if (is_file($file))
        unlink($file); //elimino el fichero
}
//fin
if (isset($_SESSION['Id_admin'])) {
    $sql = mysqli_query($conexion, 'SELECT * FROM `administradores` where Id_admin= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql);
    if (isset($_GET['Id_encuesta'])) {
        $id = $_GET['Id_encuesta'];
        $sqlCount = "SELECT COUNT(Id_encuesta) AS total FROM encuesta_respuestas where Id_encuesta = $id";
        $resultSQL = mysqli_query($conexion, $sqlCount);
        $data = mysqli_fetch_assoc($resultSQL);
        $query = "SELECT * FROM `encuesta` INNER join materias on encuesta.Materia= materias.ID INNER JOIN maestros on encuesta.Docente= maestros.ID INNER join semestre on materias.Semestre = semestre.id INNER JOIN carrera on materias.Carrera=carrera.id WHERE Id_encuesta = $id";
        $result = mysqli_query($conexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre_docente = $row['Nombre_Docente'];
            $nombre_materia = $row['Nombre'];
            $nombre_semestre = $row['nombre_semestre'];
            $nombre_carrera = $row['Nombre_Carrera'];
            $clave_docente = $row['ID'];
            $fecha_inicio = $row['Fecha'];
            $fecha_fin = $row['FechaFin'];
            $hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
            $time = $hora->format("d-m-Y");
        }
    } else {
        echo "bad";
    }
    include("header.php");
?>

    <body class="text-center">
        <div class="container">
            <div class="hojapdf" id="reportepdf">
                <table width="100%" border="0">
                    <tr>
                        <td width="20%" align="center" valign="middle"><img src="../includes/logo-edomex.png" alt="Estado de México" width="90%"></td>
                        <td width="60%" align="center" valign="middle">
                            <h1>Universidad Mexiquense del Bicentenario</h1>
                            <h2>Unidad de Estudios Superiores Xalatlaco</h2>
                            <h3>Coordinación de carrera</h3>

                        </td>
                        <td width="20%" align="center" valign="middle"><img src="../includes/logoumb.png" alt="Universidad Mexiquense del Bicentenario" width="90%"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right" valign="middle"> Calle Los Capulines S/N, Barrio de San Juan,
                            Xalatlaco México a <?php new DateTime() ?>.</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center" valign="middle">
                            <p class="text-justify">A continuación, se presentan la información recopilada en el periodo de <?php echo $fecha_inicio ?> al <?php echo $fecha_fin ?> del desempeño laboral realizado al
                                docente <?php echo $nombre_docente ?>
                                por parte de los alumnos al cual imparte la asignatura <?php echo $nombre_materia ?>.
                            </p>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="3" align="center" valign="middle">
                            <table width="100%" border="1">
                                <tr>
                                    <td width="22%">Carrera:</td>
                                    <td width="27%"><?php echo $nombre_carrera ?></td>
                                    <td width="29%">Semestre:</td>
                                    <td width="22%"><?php echo $nombre_semestre ?></td>
                                </tr>
                                <tr>
                                    <td>Clave Docente:</td>
                                    <td><?php echo $clave_docente ?></td>
                                    <td>Grupo:</td>
                                    <td><?php echo $nombre_carrera ?></td>
                                </tr>
                                <tr>
                                    <td>Nombre Docente:</td>
                                    <td><?php echo $nombre_docente ?></td>
                                    <td>Fecha Reporte:</td>
                                    <td><?php echo $time ?></td>
                                </tr>
                                <tr>
                                    <td>Periodo:</td>
                                    <td><?php echo "2021-2022" ?></td>
                                    <td>Tamaño Muestra:</td>
                                    <td><?php echo $data['total'] ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center" valign="middle">
                            <table width="100%" border="0">
                                <tr>
                                    <td colspan="2" width="50%"><img src="../includes/graf1.jpg" alt="Grafica 1" width="90%"></td>
                                    <td colspan="2" width="50%"><img src="../includes/graf2.jpg" alt="Grafica 3" width="90%"></td>

                                </tr>
                                <tr>
                                    <td colspan="2"><img src="../includes/graf3.jpg" alt="Grafica 3" width="90%"></td>
                                    <td colspan="2"><img src="../includes/graf4.jpg" alt="Grafica 4" width="90%"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div align="center">
                                            <p> <strong>Elaboró:</strong><br>
                                                I.S.C. Anibal Arellano Aparicio Legarreta Montes<br>
                                                Coodi </p>
                                        </div>
                                    </td>
                                    <td colspan="2"><?php echo $nombre_carrera ?></td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </div>
            <br>
            <script>
                function printDiv(nombreDiv) {
                    var contenido = document.getElementById(nombreDiv).innerHTML;
                    var contenidoOriginal = document.body.innerHTML;
                    document.body.innerHTML = contenido;
                    window.print();
                    document.body.innerHTML = contenidoOriginal;
                }
            </script>
            <div class="text-center">
                <a href="#" onclick="printDiv('reportepdf')" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir
                    Reporte</a>
            </div>
        </div>
    </body>

    </html>
<?php

} else {
    include("futteralum.php");
    header("location: ../index.php");
}
include("futteralum.php");



?>