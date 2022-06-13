<?php
include "../conexion.php";

$idCe = $_POST['idCe'];
$nombre = utf8_encode($_POST['nombre']);
$ap_paterno = utf8_encode($_POST['AP']);
$ap_materno = utf8_encode($_POST['AM']);
$password = $_POST['password'];

// $sql = mysqli_query($conexion, 'SELECT * FROM `administradores` where Id_admin= "' . $idCe . '" ');
// $filas = mysqli_fetch_assoc($sql);
// $id = $filas['id'];

$query = "UPDATE `administradores` SET `Nombre`='$nombre',`A_paterno`='$ap_paterno',`A_materno`='$ap_materno',`password`='$password' WHERE `administradores`.`Id_admin` = $idCe";
$consulta = mysqli_query($conexion, $query);
if (isset($consulta)) {
    echo "<script>
    alert('!Actualizado Correctamente :)!');
    window.location= '../profileCe.php'
    </script>"; 
}else{
    echo "mal";
}


?>