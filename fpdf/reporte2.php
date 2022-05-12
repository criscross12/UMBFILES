<?php include '../includes/conexion.php';
session_start();
$idUsuario = $_SESSION['id'];
if (isset($_SESSION['id'])) {
  $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
  $filas = mysqli_fetch_assoc($sql);
  include("../includes/headeralum.php");
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
    <td colspan="3" align="right" valign="middle"> Calle Los Capulines S/N, Barrio de San Juan, Xalatlaco México a 09 de mayo de 2022.</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle"><p class="text-justify">A continuación, se presentan la información recopilada en el periodo de 2021-11-11 al 0000-00-00 del desempeño laboral realizado al docente Eduardo Legarreta Montes por parte de los alumnos al cual imparte la asignatura ProgramaciÃƒÂ³n orientada a objetos.</p></td>
  </tr>
  <tr>
    
    <td colspan="3" align="center" valign="middle">
      <table width="100%" border="1">
      <tr>
        <td width="22%">Carrera:</td>
        <td width="27%">&nbsp;</td>
        <td width="29%">Semestre:</td>
        <td width="22%">&nbsp;</td>
      </tr>
      <tr>
        <td>Clave Docente:</td>
        <td>&nbsp;</td>
        <td>Grupo:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Nombre Docente:</td>
        <td>&nbsp;</td>
        <td>Fecha Reporte:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Periodo:</td>
        <td>&nbsp;</td>
        <td>Tamaño Muestra:</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle">
      <table width="100%" border="0">
      <tr>
       <td colspan="2" width="50%"><img src="../includes/graf1.jpg" alt="Grafica 1" width="90%"></td>
        <td colspan="2"width="50%"><img src="../includes/graf2.jpg" alt="Grafica 3" width="90%"></td>
        
      </tr>
      <tr>
        <td colspan="2"><img src="../includes/graf3.jpg" alt="Grafica 3" width="90%"></td>
        <td colspan="2"><img src="../includes/graf4.jpg" alt="Grafica 4" width="90%"></td> 
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <p> <strong>Elaboró:</strong><br>
          I.S.C. Anibal Arellano Aparicio Legarreta Montes<br>
            Coodi </p>
        </div></td>
        <td colspan="2">&nbsp;</td>
        
      </tr>
    </table>
  </td>
  </tr>
</table>

            </div>
            <br>
            <script>
                function printDiv(nombreDiv){
                    var contenido=document.getElementById(nombreDiv).innerHTML;
                    var contenidoOriginal=document.body.innerHTML;
                    document.body.innerHTML=contenido;
                    window.print();
                    document.body.innerHTML=contenidoOriginal;
                }
            </script>
            <div class="text-center">
                <a href="#" onclick="printDiv('reportepdf')" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir Reporte</a>
            </div>        
    </div>
</body>

</html>
<?php

} else {
  include("../includes/futteralum.php");
  header("location: ../../index.php");
}
include("futteralum.php");



?>