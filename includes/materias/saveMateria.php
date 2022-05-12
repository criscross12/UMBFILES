<?php include "../conexion.php";
session_start();
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
if (isset($_POST['save'])) {
    $NombreMateria = utf8_encode($_POST['NombreMateria']);
    $Carrera = $_POST['Carrera'];
    $Semestre =  $_POST['Semestre'];
    if (preg_match($patron_texto, $NombreMateria)) {
        $sql = "INSERT INTO `materias` (`Nombre`, `Carrera`, `Semestre`)
         VALUES ('$NombreMateria', '$Carrera', '$Semestre')";
        $consulta = mysqli_query($conexion, $sql);
        if (!$consulta) {
            die("query fail");
        } else {
            echo "<script>
            alert('Registro de Materia Exitoso :)');
            window.location= '../materias.php'
            </script>";           
        }
    } else {
        echo "<script>
        alert('Matricula solo con valores numericos');
        window.location= '../materias.php'
        </script>"; 
    }
}