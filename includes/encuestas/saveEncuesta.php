<?php include "../conexion.php";
session_start();
if (isset($_POST['save'])) {
    // $titulo = $_POST['Titulo'];
    date_default_timezone_set('America/Mexico_city');
    $Docente = $_POST['Docente'];
    $Materia =  $_POST['Materia'];
    $fechafin = $_POST['FechaFin'];
    $status = 1;
    $fecha = date('Y-m-d');
    //TODO Busqueda de grupo por la materia
    $consultaGrupo = mysqli_query($conexion, "SELECT * FROM `materias` where ID = '$Materia'");
    $filas = mysqli_fetch_assoc($consultaGrupo);
    $grupo = $filas['grupo'];
    //TODO Insertar nueva encuesta
    $sql = "INSERT INTO `encuesta`(`Docente`, `Fecha`, `FechaFin`, `Materia`, `Grupo`, `Status`)
     VALUES ('$Docente', '$fecha', '$fechafin','$Materia','$grupo','$status')";
    $consulta = mysqli_query($conexion, $sql);
    echo $consulta;
    if (!$consulta) {
        echo mysqli_error($conexion);
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
