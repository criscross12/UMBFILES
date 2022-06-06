<?php include "../conexion.php";
session_start();
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
if (isset($_POST['save'])) {
    $nombre = $_POST['nombre'];
    $AP = $_POST['Ap'];
    $AM =  $_POST['Am'];
    $matricula = $_POST['matricula'];
    if (is_numeric($matricula)) {
        $sql = "INSERT INTO `maestros` (`Nombre_Docente`, `Ap_Paterno`, `Ap_Materno`, `Matricula`)
         VALUES ('$nombre', '$AP', '$AM', '$matricula')";
        $consulta = mysqli_query($conexion, $sql);
        if (!$consulta) {
            die("query fail");
        } else {
            echo "<script>
            alert('Registro Exitoso :)');
            window.location= '../maestros.php'
            </script>";           
        }
    } else {
        echo "<script>
        alert('Matricula solo con valores numericos');
        window.location= '../maestros.php'
        </script>"; 
    }
}
