<?php include "../conexion.php";               
session_start();
$idUsuario = $_SESSION['id'];
$id = $_POST['ID'];
$array=[$_POST['Pregunta1'],$_POST['Pregunta2'],$_POST['Pregunta3'],
$_POST['Pregunta4'], $_POST['Pregunta5'],
$_POST['Pregunta6'], $_POST['Pregunta7'],
$_POST['Pregunta8'], $_POST['Pregunta9'],
$_POST['Pregunta10'],$_POST['Pregunta11'],
$_POST['Pregunta12'],$_POST['Pregunta13'],
$_POST['Pregunta14'],$_POST['Pregunta15'],
$_POST['Pregunta16'],$_POST['Pregunta17'], 
$_POST['Pregunta18'],$_POST['Pregunta19'],
$_POST['Pregunta20'],$_POST['Pregunta21'],
$_POST['Pregunta22'],$_POST['Pregunta23'],
$_POST['Pregunta24']];
// $remedio = $_POST['Pregunta1'];
// $sql = "INSERT INTO `respuestas` (`id_encuesta`, `id_alumno`, `id_pregunta`, `respuesta`) VALUES ('$id', '$idUsuario', '1', '$remedio')";
// $sqlvo = mysqli_query($conexion,$sql);         
if (isset($_POST['Enviar'])) {
    $num = 1;
for($i=0; $i <=23; $i++){
    //Obtenemos el texto de la respuesta
    $idP = $num++;
    $preg = $array[$i];  
    // echo $preg;      
    // Y lo insertamos
            # code..        
            $sql = "INSERT INTO `respuestas` (`id_encuesta`, `id_alumno`, `id_pregunta`, `respuesta`) VALUES ('$id', '$idUsuario', '$idP', '$preg')";
            $sqlvo = mysqli_query($conexion,$sql);                    
}
if (isset($sqlvo)) {
    echo "<script>
    alert('Exitoso :)');
    window.location= '../publicacines.php'
    </script>";  
}else{
    echo "bad";
}
}