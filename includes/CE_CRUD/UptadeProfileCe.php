<?php
include "../conexion.php";

$idCe = $_POST['idCe'];
$nombre = utf8_encode($_POST['nombre']);
$ap_paterno = utf8_encode($_POST['AP']);
$ap_materno = utf8_encode($_POST['AM']);
$password = $_POST['password'];

$sql = mysqli_query($conexion, 'SELECT * FROM `ce` where Matricula= "' . $idCe . '" ');
$filas = mysqli_fetch_assoc($sql);
$id = $filas['id'];

$query = "UPDATE `ce` SET `Ap_Materno` = '$ap_materno',`Ap_Paterno` = '$ap_paterno',`Nombre` = '$nombre' WHERE `ce`.`id` = $id";
$consulta = mysqli_query($conexion, $query);
if (isset($consulta)) {
    echo "<script>
    alert('!Actualizado Correctamente :)!');
    window.location= '../profileCE.php'
    </script>"; 
}else{
    echo "mal";
}


?>