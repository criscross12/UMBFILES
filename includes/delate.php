<?php include 'conexion.php';
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = "DELETE FROM `alumno` WHERE `id` = $id";
        $consulta = mysqli_query($conexion,$delete);

        if(!$consulta){
            die("query fail"); 
        }
    echo "<script>
     alert('!Elimidado Correctamente!');
     window.location= 'modificar.php'
     </script>";
    }
?>