<?php include "../conexion.php";
session_start();
//TODO datos del coordinador para conocer la carrera correspondiente
$idUsuario = $_SESSION['Id_admin'];
$sql = mysqli_query($conexion, 'SELECT * FROM `administradores` where Id_admin= "' . $idUsuario . '" ');
$filas = mysqli_fetch_assoc($sql);
$coordinador_carrera = $filas["Carrera"];

if (isset($_POST['save'])) {
    date_default_timezone_set('America/Mexico_city');
    $Semestre =  $_POST['Semestre'];
    $fechafin = $_POST['FechaFin'];
    $status = 1;
    $fecha = date('Y-m-d');
    //TODO BUSCAR LA RELACION MAESTRO-DOCENTE POR SEMESTRE Y CARRERA
    $sqlMateriasDocente = "SELECT * FROM `MateriaDocente` INNER JOIN materias on MateriaDocente.IdMateria = materias.Clave where materias.Semestre = '$Semestre' and materias.Carrera = '$coordinador_carrera'";
    $consultaMD = mysqli_query($conexion, $sqlMateriasDocente);
    $num_rows = mysqli_num_rows($consultaMD);
    // for ($i=0; $i <= $num_rows; $i++) { 
    //     # code...
    // }
    while ($arrayResult = mysqli_fetch_array($consultaMD)) {
        $Docente = $arrayResult['IdDocente'];
        $Materia = $arrayResult['ID'];
        echo $Docente;
        echo $Materia;
        $sql = "INSERT INTO `encuesta`(`Docente`, `Fecha`, `FechaFin`, `Materia`, `Status`)
        VALUES ('$Docente', '$fecha', '$fechafin','$Materia','$status')";
        $consulta = mysqli_query($conexion, $sql);
    }
    //FIN  BUSCAR LA RELACION MAESTRO-DOCENTE POR SEMESTRE Y CARRERA
    //TODO Insertar nueva encuesta
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
