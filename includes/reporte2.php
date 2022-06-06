<?php include "conexion.php";
require('../fpdf/includes/jpgraph/src/jpgraph.php');
require('../fpdf/includes/jpgraph/src/jpgraph_bar.php');
session_start();
if (isset($_SESSION['Id_admin'])) {
    $Id_admin = $_SESSION['Id_admin'];
    $sql = mysqli_query($conexion, "SELECT * FROM `administradores` where Id_admin = '$Id_admin'");
    $filas = mysqli_fetch_assoc($sql);
    include("header.php");
?>
    <!-- Reporte Start-->
    <?php
    $id = $_GET['Id_encuesta'];
    echo $id;
    $query5 = "SELECT AVG(P1) as PR1,AVG(P2) as PR2,AVG(P3) as PR3,AVG(P4) as PR4,AVG(P5) as PR5,AVG(P6) as PR6,AVG(P7) as PR7,AVG(P7) as PR8,AVG(P9) as PR9,AVG(P10) as PR10,AVG(P11) as PR11,AVG(P12) as PR12,AVG(P13) as PR13,AVG(P14) as PR14,AVG(P15) as PR15,AVG(P16) as PR16,AVG(P17) as PR17,AVG(P18) as PR18,AVG(P19) as PR19,AVG(P20) as PR20,AVG(P21) as PR21,AVG(P22) as PR22,AVG(P23) as PR23,AVG(P24) as PR24,AVG(Promedio) as Prom FROM encuesta_respuestas where Id_encuesta = '$id'";
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
    $prom = $row5['Prom'];
    //área de gráficos
    //datos
    $data1y = array($p1, $p2, $p3, $p4, $p5, $p6);
    $data2y = array($p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $p16, $p17);
    $data3y = array($p18, $p19, $p20, $p21, $p22, $p23, $p24);
    $data4y = array($prom);
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
    $graph->title->Set("Sobre la Clase");
    // Display the graph
    $graph->Stroke(_IMG_HANDLER);
    $fileName1 = "temp/graf1.png";
    $fileName1 = "..";
    $graph->img->Stream($fileName1);
    // //grafic0 2
    // $graph = new Graph(300, 200, 'auto');
    // $graph->SetScale("textlin");
    // $theme_class = new UniversalTheme;
    // $graph->SetTheme($theme_class);
    // $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    // $graph->SetBox(false);
    // $graph->ygrid->SetFill(false);
    // $graph->xaxis->SetTickLabels(array('P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15', 'P16', 'P17'));
    // $graph->yaxis->HideLine(false);
    // $graph->yaxis->HideTicks(false, false);
    // // Create the bar plots
    // $b2plot = new BarPlot($data2y);
    // $gbplot2 = new GroupBarPlot(array($b2plot));
    // // ...and add it to the graPH
    // $graph->Add($gbplot2);
    // $b1plot->SetColor("white");
    // $b1plot->SetFillColor("#00FFFF");
    // $graph->title->Set("Actitud del Docente");
    // // Display the graph
    // $graph->Stroke(_IMG_HANDLER);
    // $fileName2 = "temp/graf2.png";
    // $graph->img->Stream($fileName2);
    // //grafic0 3
    // $graph = new Graph(300, 200, 'auto');
    // $graph->SetScale("textlin");
    // $theme_class = new UniversalTheme;
    // $graph->SetTheme($theme_class);
    // $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    // $graph->SetBox(false);
    // $graph->ygrid->SetFill(false);
    // $graph->xaxis->SetTickLabels(array('P18', 'P19', 'P20', 'P21', 'P22', 'P23', 'P24'));
    // $graph->yaxis->HideLine(false);
    // $graph->yaxis->HideTicks(false, false);
    // // Create the bar plots
    // $b3plot = new BarPlot($data3y);
    // $gbplot = new GroupBarPlot(array($b3plot));
    // // ...and add it to the graPH
    // $graph->Add($gbplot);
    // $b1plot->SetColor("white");
    // $b1plot->SetFillColor("#00FFFF");
    // $graph->title->Set("Actividades y Evaluación");
    // // Display the graph
    // $graph->Stroke(_IMG_HANDLER);
    // $fileName3 = "temp/graf3.png";
    // $graph->img->Stream($fileName3);
    // //grafic0 2
    // $graph = new Graph(300, 200, 'auto');
    // $graph->SetScale("textlin");
    // $theme_class = new UniversalTheme;
    // $graph->SetTheme($theme_class);
    // $graph->yaxis->SetTickPositions(array(1, 2, 3, 4, 5), array(1, 2, 3, 4, 5));
    // $graph->SetBox(false);
    // $graph->ygrid->SetFill(false);
    // $graph->xaxis->SetTickLabels(array('Promedio'));
    // $graph->yaxis->HideLine(false);
    // $graph->yaxis->HideTicks(false, false);
    // // Create the bar plots
    // $b4plot = new BarPlot($data4y);
    // $gbplot2 = new GroupBarPlot(array($b4plot));
    // // ...and add it to the graPH
    // $graph->Add($gbplot2);
    // $b1plot->SetColor("white");
    // $b1plot->SetFillColor("#00FFFF");
    // $graph->title->Set("Promedo General");
    // // Display the graph
    // $graph->Stroke(_IMG_HANDLER);
    // $fileName4 = "temp/graf4.png";
    // $graph->img->Stream($fileName4);
    ?>
    <!-- Reporte End -->

    <body class="text-center">
        <div class="container">
            <main role="main" class="inner cover">

            </main>
        </div>
    </body>
<?php
    include("futter.php");
} else {
    header("location: ../index.php");
}
?>