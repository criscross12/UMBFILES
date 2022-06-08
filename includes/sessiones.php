<?php

session_start();
$idUsuario = $_SESSION['id'];
if (isset($_SESSION['id'])) {
    $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql);
    $nombre = $filas['Nombre'];
    $a_pat = $filas['A_paterno'];
    $a_mat = $filas['A_Materno'];
    $idCarrera = $filas['Carrera'];
    $idSemestre = $filas['semestre'];
    $grupo = $filas['grupo'];
}else{
    ?>
<script>
top.location.href = "../index.php";
</script>
<?php 

}
$hoy = new DateTime("now", new DateTimeZone('America/Mexico_City'));
$today = $hoy->format("Y-m-d");
?>