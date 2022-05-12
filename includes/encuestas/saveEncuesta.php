<?php include "../conexion.php";
session_start();
if (isset($_POST['save'])) {
    // $titulo = $_POST['Titulo'];
    date_default_timezone_set('America/Mexico_city');
    $Docente = $_POST['Docente'];
    $Materia =  $_POST['Materia']; 
    $status = 1;  
    $fecha = date('Y-m-d');
        $sql = "INSERT INTO `encuesta` (`Docente`, `Materia`,`Fecha`, `Status`)
         VALUES ('$Docente', '$Materia','$fecha','$status')";
        $consulta = mysqli_query($conexion, $sql);
        if (!$consulta) {
            echo "<script>
            alert('Registro incompleto');
            window.location= '../encuestas.php'
            </script>";  
        } else {
            echo "<script>
            alert('Registro de Materia Exitoso :)');
            window.location= '../encuestas.php'
            </script>";           
        }
}