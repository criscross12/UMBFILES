<?php
include "conexion.php";
session_start();
$matricula = $_POST['matricula'];
$contrasena = $_POST['contrasena'];
$q = "SELECT  COUNT(*) as contar from alumno where id = '$matricula' and contrasena = '$contrasena' ";
$sq = "SELECT  COUNT(*) as conta from ce where matricula = '$matricula' and contrasena = '$contrasena' ";
$queryCC = "SELECT COUNT(*) as contador from administradores where Matricula='$matricula' and password = '$contrasena' ";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);
$pro = mysqli_query($conexion,$sq);
$proy = mysqli_fetch_array($pro);
$ConsultaCC = mysqli_query($conexion,$queryCC);
$Result = mysqli_fetch_array($ConsultaCC);
if($array['contar']>0 ){
    session_start();
    // $_SESSION['matricula']= $matricula;
    $sqlid = "SELECT id FROM `alumno` where id = '$matricula' and contrasena = '$contrasena' ";
    $consultaid = mysqli_query($conexion,$sqlid);
    $idusuario = mysqli_fetch_row($consultaid)[0];
    $_SESSION['id'] = $idusuario;
    header("location: inicio.php");
}else if($proy['conta']>0 )
{
    $_SESSION['matricula']= $matricula;
    $sqlid = "SELECT id FROM `ce` where matricula = '$matricula' and contrasena = '$contrasena' ";
    $consultid = mysqli_query($conexion,$sqlid);
    $idusuario = mysqli_fetch_row($consultid)[0];
    $_SESSION['id'] = $idusuario;   
    header("location: index.php");
}else if($Result['contador']>0 )
{
    // $_SESSION['matricula']= $matricula;
    $sqlid = "SELECT Id_admin FROM `administradores` where Matricula = '$matricula' and password = '$contrasena' ";
    $consultid = mysqli_query($conexion,$sqlid);
    $idusuario = mysqli_fetch_row($consultid)[0];
    $_SESSION['Id_admin'] = $idusuario;   
    header("location: index.php");
}else{
    echo "<script>
    alert('!!ERROR!!');
    </script>";
    header("location: ../index.php");
}


?>