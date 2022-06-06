<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require "includes/fpdf/fpdf.php";
class PDF extends FPDF{
    function Header(){
        switch(date('m')){
            case 1:
                $mes="enero";
                break;
            case 2:
                $mes="febrero";
                break;
            case 3:
                $mes="marzo";
                break;
            case 4:
                $mes="abril";
                break;
            case 5:
                $mes="mayo";
                break;
            case 6:
                $mes="junio";
                break;
            case 7:
                $mes="julio";
                break;
            case 8:
                $mes="agosto";
                break;
            case 9:
                $mes="septiembre";
                break;
            case 10:
                $mes="octubre";
                break;
            case 11:
                $mes="noviembre";
                break;
            case 12:
                $mes="diciembre";
                break;
        }
		global $title;
		$w = $this->GetStringWidth($title)+6;
    	$this->SetX((35-$w)/2);
        $this->Image('includes/fpdf/img/cabecera-reporte.jpg', 0, 0, 215.9, 35);
        $this->Ln(25);
        $this->SetFont('Arial','B',10);
        $this->Cell(195.9,1,"Calle Los Capulines S/N, Barrio de San Juan, Xalatlaco ".utf8_decode('México')." a ".date('d')." de ".$mes." de ".date('Y').".",0,0,'R');
    }
    function Footer(){
        // Posición: a 1,5 cm del final
    	$this->SetY(-10);
    	// Arial italic 8        
		$this->SetTextColor(0,0,0);
    	$this->SetFont('Arial','',8);
        $this->Cell(195.9,10,utf8_decode('Evaluación Docente, Formato No. 1, Revisión No. 1, Octubre 2021. Página '.$this->PageNo().'/{nb}'),0,0,'R');
    }
    function Mybody(){
        //uso de libreria para gráficos
        require ('includes/jpgraph/src/jpgraph.php');
		require ('includes/jpgraph/src/jpgraph_bar.php');
        include '../includes/conexion.php';
        $id = $_GET['idencu'];
        $query1= "SELECT * FROM encuesta where Id_Encuesta = $id";
        $res = $conexion->query($query1);
        $row = $res->fetch_assoc();
        $idDocente = $row['Docente'];
        $idMateria = $row['Materia'];
        $fecha1= $row['Fecha'];
        $fecha2 = $row['FechaFin'];
        $gpo = $row['Grupo'];
        $query2= "SELECT * FROM maestros where ID = '$idDocente'";
        $res2 = $conexion->query($query2);
        $row2 = $res2->fetch_assoc();
        $docente = $row2['Nombre_Docente'] . " " .$row2['Ap_Paterno']. " " .$row2['Ap_Materno'];
        $cvedocte = $row2['Matricula'];
        $query3= "SELECT * FROM materias where ID = '$idMateria'";
        $res3 = $conexion->query($query3);
        $row3 = $res3->fetch_assoc();
        $asignatura = $row3['Nombre'];
        $carrera="ISC";
        $sem="PRIMERO";
        // $cvedocte="04213";
        // $gpo="22SC111";
        $periodo="20-21/1";
        // $tamues=11;
        $hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
        $fechahoy= $hora->format("d-m-Y");
        $coordinador="I.S.C. Anibal Arellano Aparicio";

        $query4= "SELECT COUNT(Id_encuesta) as contador FROM encuesta_respuestas where Id_encuesta = '$id'";
        $res4 = $conexion->query($query4);
        $row4 = $res4->fetch_assoc();
        $tamues = $row4['contador'];

        $query5= "SELECT AVG(P1) as PR1,AVG(P2) as PR2,AVG(P3) as PR3,AVG(P4) as PR4,AVG(P5) as PR5,AVG(P6) as PR6,AVG(P7) as PR7,AVG(P7) as PR8,AVG(P9) as PR9,AVG(P10) as PR10,AVG(P11) as PR11,AVG(P12) as PR12,AVG(P13) as PR13,AVG(P14) as PR14,AVG(P15) as PR15,AVG(P16) as PR16,AVG(P17) as PR17,AVG(P18) as PR18,AVG(P19) as PR19,AVG(P20) as PR20,AVG(P21) as PR21,AVG(P22) as PR22,AVG(P23) as PR23,AVG(P24) as PR24,AVG(Promedio) as Prom FROM encuesta_respuestas where Id_encuesta = '$id'";
        $res5 = $conexion->query($query5);
        $row5 = $res5->fetch_assoc();
         
        //valores para la gráfica
        $p1=$row5['PR1']; 
        $p2=$row5['PR2'];
        $p3=$row5['PR3'];
        $p4=$row5['PR4'];
        $p5=$row5['PR5'];
        $p6=$row5['PR6'];
        $p7=$row5['PR7'];
        $p8=$row5['PR8'];
        $p9=$row5['PR9'];
        $p10=$row5['PR10'];
        $p11=$row5['PR11'];
        $p12=$row5['PR12'];
        $p13=$row5['PR13'];
        $p14=$row5['PR14'];
        $p15=$row5['PR15'];
        $p16=$row5['PR16'];
        $p17=$row5['PR17'];
        $p18=$row5['PR18'];
        $p19=$row5['PR19'];
        $p20=$row5['PR20'];
        $p21=$row5['PR21'];
        $p22=$row5['PR22'];
        $p23=$row5['PR23'];
        $p24=$row5['PR24'];
        $prom=$row5['Prom'];

        //area de tabla de datos

        $this->Ln(10);
        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->MultiCell(168,5,utf8_decode("  A continuación, se presentan la información recopilada en el periodo de ".$fecha1." al ".$fecha2." del desempeño laboral realizado al docente ".utf8_encode($docente)." por parte de los alumnos al cual imparte la asignatura ".utf8_encode($asignatura)."."),0,"J");
        $this->Ln(5);
        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->Cell(30,5,utf8_decode("Carrera:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->Cell(54,5,utf8_decode($carrera),1,0,"L",0);
        $this->SetFont('Arial','',10);
        $this->Cell(30,5,utf8_decode("Semestre:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->Cell(54,5,utf8_decode($sem),1,1,"L",0);

        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->Cell(30,5,utf8_decode("Clave Docente:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->Cell(54,5,utf8_decode($cvedocte),1,0,"L",0);
        $this->SetFont('Arial','',10);
        $this->Cell(30,5,utf8_decode("Grupo:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->Cell(54,5,utf8_decode($gpo),1,1,"L",0);

        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->Cell(30,5,utf8_decode("Nombre Docente:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->CellFitSpace(54,5,($docente),1,0,"L",0);
        $this->SetFont('Arial','',10);
        $this->Cell(30,5,utf8_decode("Fecha Reporte:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->Cell(54,5,utf8_decode($fechahoy),1,1,"L",0);

        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->Cell(30,5,utf8_decode("Periodo:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->CELL(54,5,utf8_decode($periodo),1,0,"L",0);
        $this->SetFont('Arial','',10);
        $this->Cell(30,5,utf8_decode("Tamaño Muestra:"),1,0,"L",0);
        $this->SetFont('Arial','B',10);
        $this->Cell(54,5,utf8_decode($tamues),1,1,"L",0);

        $this->Ln(5);
        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->Cell(169,5,utf8_decode("Muestra de los indicadores"),0,1,"L",0);

        //área de gráficos
        //datos
        $data1y=array($p1,$p2,$p3,$p4,$p5,$p6);
        $data2y=array($p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17);
        $data3y=array($p18,$p19,$p20,$p21,$p22,$p23,$p24);
        $data4y=array($prom);
        //grafic0 1
        $graph = new Graph(300,200,'auto');
		$graph->SetScale("textlin");
		$theme_class=new UniversalTheme;
		$graph->SetTheme($theme_class);
		$graph->yaxis->SetTickPositions(array(1,2,3,4,5), array(1,2,3,4,5));
		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels(array('P1','P2','P3','P4','P5','P6'));
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);
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
		$fileName1 = "includes/temp/graf1.png";
		$graph->img->Stream($fileName1);
        //grafic0 2
        $graph = new Graph(300,200,'auto');
		$graph->SetScale("textlin");
		$theme_class=new UniversalTheme;
		$graph->SetTheme($theme_class);
		$graph->yaxis->SetTickPositions(array(1,2,3,4,5), array(1,2,3,4,5));
		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels(array('P7','P8','P9','P10','P11','P12','P13','P14','P15','P16','P17'));
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);
		// Create the bar plots
		$b2plot = new BarPlot($data2y);
        $gbplot2 = new GroupBarPlot(array($b2plot));
        // ...and add it to the graPH
		$graph->Add($gbplot2);
		$b1plot->SetColor("white");
		$b1plot->SetFillColor("#00FFFF");		
		$graph->title->Set("Actitud del Docente");
		// Display the graph
		$graph->Stroke(_IMG_HANDLER);
		$fileName2 = "includes/temp/graf2.png";
		$graph->img->Stream($fileName2);
        //grafic0 3
        $graph = new Graph(300,200,'auto');
		$graph->SetScale("textlin");
		$theme_class=new UniversalTheme;
		$graph->SetTheme($theme_class);
		$graph->yaxis->SetTickPositions(array(1,2,3,4,5), array(1,2,3,4,5));
		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels(array('P18','P19','P20','P21','P22','P23','P24'));
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);
		// Create the bar plots
		$b3plot = new BarPlot($data3y);
        $gbplot = new GroupBarPlot(array($b3plot));
        // ...and add it to the graPH
		$graph->Add($gbplot);
		$b1plot->SetColor("white");
		$b1plot->SetFillColor("#00FFFF");		
		$graph->title->Set("Actividades y Evaluación");
		// Display the graph
		$graph->Stroke(_IMG_HANDLER);
		$fileName3 = "includes/temp/graf3.png";
		$graph->img->Stream($fileName3);
        //grafic0 2
        $graph = new Graph(300,200,'auto');
		$graph->SetScale("textlin");
		$theme_class=new UniversalTheme;
		$graph->SetTheme($theme_class);
		$graph->yaxis->SetTickPositions(array(1,2,3,4,5), array(1,2,3,4,5));
		$graph->SetBox(false);
		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels(array('Promedio'));
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);
		// Create the bar plots
		$b4plot = new BarPlot($data4y);
        $gbplot2 = new GroupBarPlot(array($b4plot));
        // ...and add it to the graPH
		$graph->Add($gbplot2);
		$b1plot->SetColor("white");
		$b1plot->SetFillColor("#00FFFF");		
		$graph->title->Set("Promedo General");
		// Display the graph
		$graph->Stroke(_IMG_HANDLER);
		$fileName4 = "includes/temp/graf4.png";
		$graph->img->Stream($fileName4);


        //mostrar graficas
		$this->Image($fileName1,10,90,85,75,'png');		
		$this->Image($fileName2,110,90,85,75,'png');
        $this->Ln(1);
        $this->Image($fileName3,10,155,85,75,'png');		
		$this->Image($fileName4,110,155,85,75,'png');
        $this->Ln(130);
        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->Cell(190,5,utf8_decode("Nota:Vease Anexo 1 para coocer las preguntas"),0,1,"L",0);
        $this->Ln(10);
        $this->SetFont('Arial','B',10);
        $this->Cell(15.4,5,"");
        $this->Cell(15.4,5,"");
        $this->Cell(54,5,utf8_decode("Elaboró:"),"T",0,"C",0);
        $this->Cell(30,5,"",0,0,"L",0);
        $this->Cell(54,5,utf8_decode("Revisó:"),"T",1,"C",0);
        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->Cell(15.4,5,"");
        $this->Cell(54,5,utf8_decode($coordinador),0,0,"C",0);
        $this->Cell(30,5,"",0,0,"L",0);
        $this->Cell(54,5,utf8_decode("Mtra. Verónica García Arriaga"),0,1,"C",0);
        $this->Cell(15.4,5,"");
        $this->Cell(15.4,5,"");
        $this->Cell(54,5,utf8_decode("Coordinador de Carrera"),0,0,"C",0);
        $this->Cell(30,5,"",0,0,"L",0);
        $this->Cell(54,5,utf8_decode("Coordinadora de la UESX"),0,1,"C",0);
        
        ///SEGUNDA PÁGINA, ANEXO 1, PREGUNTAS       
        
        $this->SetFont('Arial','B',10);
        $this->Cell(15.4,5,"");
        $this->Cell(190,5,"",0,1,"C",0);
        $this->Cell(15.4,5,"");
        $this->Cell(160,5,utf8_decode("ANEXO 1: PREGUNTAS DE LA ENCUESTA."),0,1,"C",0);
        $this->Ln(10);
        $this->SetFont('Arial','',10);
        $this->Cell(15.4,5,"");
        $this->MultiCell(168,5,utf8_decode("Esta es la lista de preguntas aplicadas a los alumnos del grupo ".$gpo." de la carrera ".$carrera),0,"J");
        $this->Ln(5);
        $this->SetFont('Arial','B',10);
        $this->Cell(15.4,5,"");
        $this->Cell(190,5,utf8_decode("Sección 1: Sobre la Clase."),0,1,"J",0);
        //Preguntas
        $sql = "SELECT * FROM preguntas where categoria=1";
        $pre = mysqli_query($conexion, $sql);
        $i = 1;
        while ($mostrarP = mysqli_fetch_array($pre)){
            $this->SetFont('Arial','',10);
            $this->Cell(15.4,5,"");
            $this->Cell(190,5,("P$i: ".$mostrarP['Texto']),0,1,"J",0);
            $i++;
        }
        $this->SetFont('Arial','B',10);
        $this->Cell(15.4,5,"");
        $this->Cell(190,5,utf8_decode("Sección 2: Actitud del Docente."),0,1,"J",0);
        $sql = "SELECT * FROM preguntas where categoria=2";
        $pre = mysqli_query($conexion, $sql);
        $i = 7;
        while ($mostrarP = mysqli_fetch_array($pre)){
            $this->SetFont('Arial','',10);
            $this->Cell(15.4,5,"");
            $this->Cell(190,5,("P$i: ".$mostrarP['Texto']),0,1,"J",0);
            $i++;
        }
        $this->SetFont('Arial','B',10);
        $this->Cell(15.4,5,"");
        $this->Cell(190,5,utf8_decode("Sección 3: Actividades y Evaluación."),0,1,"J",0); 
        $sql = "SELECT * FROM preguntas where categoria=3";
        $pre = mysqli_query($conexion, $sql);
        $i = 18;
        while ($mostrarP = mysqli_fetch_array($pre)){
            $this->SetFont('Arial','',10);
            $this->Cell(15.4,5,"");
            $this->Cell(190,5,"P$i: ".$mostrarP['Texto'],0,1,"J",0);
            $i++;
        }
        
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P2: $docente"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P3:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P4:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P5:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P6:"),0,1,"J",0);
        // $this->SetFont('Arial','B',10);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("Sección 2: Actitud del Docente."),0,1,"J",0);
        // $this->SetFont('Arial','',10);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P7:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P8:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P9:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P10:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P11:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P12:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P13:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P14:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P15:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P16:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P17:"),0,1,"J",0);
        // $this->SetFont('Arial','B',10);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("Sección 3: Actividades y Evaluación."),0,1,"J",0);
        // $this->SetFont('Arial','',10);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P18:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P19:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P20:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P21:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P22:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P23:"),0,1,"J",0);
        // $this->Cell(15.4,5,"");
        // $this->Cell(190,5,utf8_decode("P24:"),0,1,"J",0);
    }
    //funcion para ajustar texto
	function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
	//termnino de la funcion para ajustar texto
}
$pdf = new PDF('P','mm','letter');
$title=utf8_decode("Reporte Docente");
$pdf->SetTitle($title);
$pdf->SetAuthor('UEX Xalatlaco');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Mybody();
$pdf->Output();
unlink("includes/temp/graf1.png");
unlink("includes/temp/graf2.png");
unlink("includes/temp/graf3.png");
unlink("includes/temp/graf4.png");
?>