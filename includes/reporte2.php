<?php include 'conexion.php';
require('jpgraph/src/jpgraph.php');
require('jpgraph/src/jpgraph_bar.php');
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
    $Id_admin = $_SESSION['Id_admin'];
    $sql = mysqli_query($conexion, "SELECT * FROM `administradores` INNER JOIN carrera on administradores.Carrera = carrera.id where administradores.Id_admin = '$Id_admin'");
    $filas = mysqli_fetch_assoc($sql);
    $id_admin_carrera = $filas['Carrera'];
    $nombre_Coordinador_carrera = $filas['Nombre'] . " " . $filas['A_paterno'] . " " . $filas['A_materno'];
    $carrera_Admin = $filas['Nombre_Carrera'];

    //TODO Crear Graficas de encuesta    
    $query5 = "SELECT AVG(P1) as PR1,AVG(P2) as PR2,AVG(P3) as PR3,AVG(P4) as PR4,AVG(P5) as PR5,AVG(P6) as PR6,AVG(P7) as PR7,AVG(P8) as PR8,AVG(P9) as PR9,AVG(P10) as PR10,AVG(P11) as PR11,AVG(P12) as PR12,AVG(P13) as PR13,AVG(P14) as PR14,AVG(P15) as PR15,AVG(P16) as PR16,AVG(P17) as PR17,AVG(P18) as PR18,AVG(P19) as PR19,AVG(P20) as PR20,AVG(P21) as PR21,AVG(P22) as PR22,AVG(P23) as PR23,AVG(P24) as PR24,AVG(P24) as PR24,AVG(P25) as PR25,AVG(P26) as PR26,AVG(P27) as PR27,AVG(P28) as PR28,AVG(P29) as PR29,AVG(P30) as PR30,AVG(P31) as PR31,AVG(P32) as PR32,AVG(P33) as PR33,AVG(P34) as PR34,AVG(P35) as PR35,AVG(P36) as PR36,AVG(P37) as PR37,AVG(P38) as PR38,AVG(P39) as PR39,AVG(P40) as PR40,AVG(P41) as PR41,AVG(P42) as PR42,AVG(P43) as PR43,AVG(P44) as PR44,AVG(P45) as PR45,AVG(P46) as PR46,AVG(P47) as PR47,AVG(P48) as PR48,AVG(P49) as PR49,AVG(P50) as PR50,AVG(P51) as PR51,AVG(P52) as PR52,AVG(P53) as PR53,AVG(P54) as PR54,AVG(P54) as PR54,AVG(P55) as PR55,AVG(P56) as PR56,AVG(P57) as PR57,AVG(P58) as PR58,AVG(P59) as PR59,AVG(P60) as PR60,AVG(P61) as PR61,AVG(P62) as PR62,AVG(P63) as PR63,AVG(Promedio) as Prom FROM encuesta_respuestas where IdCarrera='$id_admin_carrera' and IdDocente= '" . $_GET['ID'] . "'";
    $res5 = $conexion->query($query5);
    $row5 = $res5->fetch_assoc();
    //valores para la gráfica
    $p1 = $row5['PR1'];
    $p2 = $row5['PR2'];
    $p3 = $row5['PR3'];
    $p4 = $row5['PR4'];
    $p5 = $row5['PR5'];
    $p6 = $row5['PR6'];
    $p7 = $row5['PR7'];
    $p8 = $row5['PR8'];
    $p9 = $row5['PR9'];
    $p10 = $row5['PR10'];
    $p11 = $row5['PR11'];
    $p12 = $row5['PR12'];
    $p13 = $row5['PR13'];
    $p14 = $row5['PR14'];
    $p15 = $row5['PR15'];
    $p16 = $row5['PR16'];
    $p17 = $row5['PR17'];
    $p18 = $row5['PR18'];
    $p19 = $row5['PR19'];
    $p20 = $row5['PR20'];
    $p21 = $row5['PR21'];
    $p22 = $row5['PR22'];
    $p23 = $row5['PR23'];
    $p24 = $row5['PR24'];
    $p25 = $row5['PR25'];
    $p26 = $row5['PR26'];
    $p27 = $row5['PR27'];
    $p28 = $row5['PR28'];
    $p29 = $row5['PR29'];
    $p30 = $row5['PR30'];
    $p31 = $row5['PR31'];
    $p32 = $row5['PR32'];
    $p33 = $row5['PR33'];
    $p34 = $row5['PR34'];
    $p35 = $row5['PR35'];
    $p36 = $row5['PR36'];
    $p37 = $row5['PR37'];
    $p38 = $row5['PR38'];
    $p39 = $row5['PR39'];
    $p40 = $row5['PR40'];
    $p41 = $row5['PR41'];
    $p42 = $row5['PR42'];
    $p43 = $row5['PR43'];
    $p44 = $row5['PR44'];
    $p45 = $row5['PR45'];
    $p46 = $row5['PR46'];
    $p47 = $row5['PR47'];
    $p48 = $row5['PR48'];
    $p49 = $row5['PR49'];
    $p50 = $row5['PR50'];
    $p51 = $row5['PR51'];
    $p52 = $row5['PR52'];
    $p53 = $row5['PR53'];
    $p54 = $row5['PR54'];
    $p55 = $row5['PR55'];
    $p56 = $row5['PR56'];
    $p57 = $row5['PR57'];
    $p58 = $row5['PR58'];
    $p59 = $row5['PR59'];
    $p60 = $row5['PR60'];
    $p61 = $row5['PR61'];
    $p62 = $row5['PR62'];
    $p63 = $row5['PR63'];
    $prom = $row5['Prom'];
    //graficos
    //datos generales
    $data1y = array($p1, $p2, $p3, $p4, $p5, $p6);
    $data2y = array($p7, $p8, $p9, $p10, $p11, $p12);
    $data3y = array($p13, $p14, $p15, $p16);
    $data4y = array($p17, $p18, $p19, $p20, $p21, $p22, $p23);
    $data5y = array($p24, $p25, $p26, $p27, $p28, $p29);
    $data6y = array($p30, $p31, $p32, $p33, $p34, $p35, $p36);
    $data7y = array($p37, $p38, $p39, $p40, $p41, $p42);
    $data8y = array($p43, $p44, $p45, $p46, $p47, $p48, $p49, $p50, $p51);
    $data9y = array($p52, $p53, $p54, $p55);
    $data10y = array($p56, $p57, $p58);
    $data11y = array($p59, $p60, $p61, $p62, $p63);
    $datapromy = array($prom);
    //grafic0 1
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P1', 'P2', 'P3', 'P4', 'P5', 'P6'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b1plot = new BarPlot($data1y);
    $gbplot = new GroupBarPlot(array($b1plot));
    // ...and add it to the graPH
    $graph->Add($gbplot);
    $b1plot->SetColor("white");
    $b1plot->SetFillColor("#00FFFF");
    $graph->title->Set("Grafica 1");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName1 = "img/graficas/graf1.png";
    $graph->img->Stream($fileName1);

    //grafic0 2
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P7', 'P8', 'P9', 'P10', 'P11', 'P12'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b2plot = new BarPlot($data2y);
    $gbplot2 = new GroupBarPlot(array($b2plot));
    // ...and add it to the graPH
    $graph->Add($gbplot);
    $b2plot->SetColor("white");
    $b2plot->SetFillColor("#00FFFF");
    $graph->title->Set("Grafica 2");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName2 = "img/graficas/graf2.png";
    $graph->img->Stream($fileName2);

    //grafic0 3
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P13', 'P14', 'P15', 'P16'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b3plot = new BarPlot($data3y);
    $gbplot3 = new GroupBarPlot(array($b3plot));
    // ...and add it to the graPH
    $graph->Add($gbplot3);
    $b3plot->SetColor("white");
    $b3plot->SetFillColor("#00CCFF");
    $graph->title->Set("Grafica 3");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName3 = "img/graficas/graf3.png";
    $graph->img->Stream($fileName3);

    //grafic0 4
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P17', 'P18', 'P19', 'P20', 'P21', 'P22', 'P23'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b4plot = new BarPlot($data4y);
    $gbplot4 = new GroupBarPlot(array($b4plot));
    // ...and add it to the graPH
    $graph->Add($gbplot4);
    $b4plot->SetColor("white");
    $b4plot->SetFillColor("#00FFAA");
    $graph->title->Set("Grafica 4");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName4 = "img/graficas/graf4.png";
    $graph->img->Stream($fileName4);

    //grafic0 5
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P24', 'P25', 'P26', 'P27', 'P28', 'P29'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b5plot = new BarPlot($data5y);
    $gbplot5 = new GroupBarPlot(array($b5plot));
    // ...and add it to the graPH
    $graph->Add($gbplot5);
    $b5plot->SetColor("white");
    $b5plot->SetFillColor("#AACCFF");
    $graph->title->Set("Grafica 5");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName5 = "img/graficas/graf5.png";
    $graph->img->Stream($fileName5);

    //grafic0 6
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P30', 'P31', 'P32', 'P33', 'P34', 'P35', 'P36'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b6plot = new BarPlot($data6y);
    $gbplot6 = new GroupBarPlot(array($b6plot));
    // ...and add it to the graPH
    $graph->Add($gbplot6);
    $b6plot->SetColor("white");
    $b6plot->SetFillColor("#0099AA");
    $graph->title->Set("Grafica 6");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName6 = "img/graficas/graf6.png";
    $graph->img->Stream($fileName6);

    //grafic0 7
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P37', 'P38', 'P39', 'P40', 'P41', 'P42'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b7plot = new BarPlot($data7y);
    $gbplot7 = new GroupBarPlot(array($b7plot));
    // ...and add it to the graPH
    $graph->Add($gbplot7);
    $b7plot->SetColor("white");
    $b7plot->SetFillColor("#BBAA00");
    $graph->title->Set("Grafica 7");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName7 = "img/graficas/graf7.png";
    $graph->img->Stream($fileName7);

    //grafic0 8
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P43', 'P44', 'P45', 'P46', 'P47', 'P48', 'P49', 'P50', 'P51'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b8plot = new BarPlot($data8y);
    $gbplot8 = new GroupBarPlot(array($b8plot));
    // ...and add it to the graPH
    $graph->Add($gbplot8);
    $b8plot->SetColor("white");
    $b8plot->SetFillColor("#11AA99");
    $graph->title->Set("Grafica 8");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName8 = "img/graficas/graf8.png";
    $graph->img->Stream($fileName8);

    //grafic0 9
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P52', 'P53', 'P54', 'P55'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b9plot = new BarPlot($data9y);
    $gbplot9 = new GroupBarPlot(array($b9plot));
    // ...and add it to the graPH
    $graph->Add($gbplot9);
    $b9plot->SetColor("white");
    $b9plot->SetFillColor("#005511");
    $graph->title->Set("Grafica 9");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName9 = "img/graficas/graf9.png";
    $graph->img->Stream($fileName9);

    //grafic0 10
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P56', 'P57', 'P58'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b10plot = new BarPlot($data10y);
    $gbplot10 = new GroupBarPlot(array($b10plot));
    // ...and add it to the graPH
    $graph->Add($gbplot10);
    $b10plot->SetColor("white");
    $b10plot->SetFillColor("#FFAA55");
    $graph->title->Set("Grafica 10");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName10 = "img/graficas/graf10.png";
    $graph->img->Stream($fileName10);

    //grafic0 11
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('P59', 'P60', 'P61', 'P62', 'P63'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $b11plot = new BarPlot($data11y);
    $gbplot11 = new GroupBarPlot(array($b11plot));
    // ...and add it to the graPH
    $graph->Add($gbplot11);
    $b11plot->SetColor("white");
    $b11plot->SetFillColor("#568475");
    $graph->title->Set("Grafica 11");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName11 = "img/graficas/graf11.png";
    $graph->img->Stream($fileName11);

    //grafic0 PROM
    $graph = new Graph(300, 200, 'auto');
    $graph->SetScale("textlin");
    $theme_class = new UniversalTheme;
    $graph->SetTheme($theme_class);
    $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    $graph->SetBox(false);
    $graph->ygrid->SetFill(false);
    $graph->xaxis->SetTickLabels(array('PROMEDIO'));
    $graph->yaxis->HideLine(false);
    $graph->yaxis->HideTicks(false, false);
    // Create the bar plots
    $bpromplot = new BarPlot($datapromy);
    $gbplotprom = new GroupBarPlot(array($bpromplot));
    // ...and add it to the graPH
    $graph->Add($gbplotprom);
    $bpromplot->SetColor("white");
    $bpromplot->SetFillColor("#CCFF33");
    $graph->title->Set("PROMEDIO GENERAL");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileNameprom = "img/graficas/grafprom.png";
    $graph->img->Stream($fileNameprom);
    //fin graficas
    $sqlCount  = "SELECT COUNT(IdDocente) as Total FROM `encuesta_respuestas` where IdDocente = '" . $_GET['ID'] . "' and IdCarrera = '$id_admin_carrera' ";
    $sqlconsultaCount  = mysqli_query($conexion, $sqlCount);
    $filasCount = mysqli_fetch_assoc($sqlconsultaCount);
    $N_Muestra = $filasCount['Total'];
    //Select Docente
    $ID_DOCENTE = $_GET['ID'];
    $sqlDocente  = "SELECT * FROM `MateriaDocente` INNER JOIN maestros on MateriaDocente.IdDocente = maestros.ID INNER JOIN materias on MateriaDocente.IdMateria = materias.Clave INNER join carrera on carrera.id = materias.Carrera  where maestros.ID = '" . $ID_DOCENTE . "' ";
    $sqlconsultaDocente  = mysqli_query($conexion, $sqlDocente);
    $filasDocente = mysqli_fetch_assoc($sqlconsultaDocente);
    $ClaveDocente = $ID_DOCENTE;
    $Periodo = $filasDocente['Periodo'];
    $NombreMateria = $filasDocente['Nombre'];
    $Carerra = $filasDocente['Nombre_Carrera'];
    $NombreDocente = $filasDocente['Nombre_Docente'] . " " . $filasDocente['Ap_Paterno'] . " " . $filasDocente['Ap_Materno'];
    $hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
    $time = $hora->format("d-m-Y");
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
                            <p class="text-justify">A continuación, se presentan la información recopilada en el periodo de 13 de Junio del 2022 al 17 de Junio del 2022 del desempeño laboral realizado al
                                docente <?php echo $NombreDocente ?> (<?= $ClaveDocente ?>)
                                por parte de los alumnos al cual imparte la asignatura <?php echo $NombreMateria ?>.
                            </p>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="3" align="center" valign="middle">
                            <table width="100%" border="1">
                                <tr>
                                    <td width="25%">Periodo: </td>
                                    <td width="29%"><?= $Periodo ?></td>
                                    <td width="23%">Tamaño muestra:</td>
                                    <td width="23%"><?= $N_Muestra ?></td>
                                </tr>
                                <tr>
                                    <td>Fecha de reporte:</td>
                                    <td><?= $time ?></td>
                                    <td>Carrera: </td>
                                    <td><?= $Carerra ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
                <br>
                <h2>Graficación de resultados</h2>
                <table width="100%" border="1">
                    <tr>
                        <td width="50%" align="center" valign="middle"><img src="<?= $fileName1; ?>"></td>
                        <td width="50%" align="center" valign="middle"><img src="<?= $fileName2; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle"><img src="<?= $fileName3; ?>"></td>
                        <td align="center" valign="middle"><img src="<?= $fileName4; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle"><img src="<?= $fileName5; ?>"></td>
                        <td align="center" valign="middle"><img src="<?= $fileName6; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle"><img src="<?= $fileName7; ?>"></td>
                        <td align="center" valign="middle"><img src="<?= $fileName8; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle"><img src="<?= $fileName9; ?>"></td>
                        <td align="center" valign="middle"><img src="<?= $fileName10; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle"><img src="<?= $fileName11; ?>"></td>
                        <td align="center" valign="middle"><img src="<?= $fileNameprom; ?>"></td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle">
                            <div align="center">
                            <br>
                                <hr style="width:50%;text-align:left;margin-left:25%;color:black;background-color:black">
                                <p> <strong>Elaboró:</strong><br>
                                Ing.
                                    <?=$nombre_Coordinador_carrera?><br>
                                    Coordinador(a) de <?=$carrera_Admin?></p>
                            </div>
                        </td>
                        <td align="center" valign="middle">
                            <div align="center">
                                <br>
                                <hr style="width:50%;text-align:left;margin-left:25%;color:black;background-color:black">
                                <p> <strong>Revisó:</strong><br>
                                    Mtra. Verónica García Arriaga
                                    <br>
                                    Coordinador(a) de la UESX
                                </p>
                            </div>
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