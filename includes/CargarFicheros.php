<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['id'];
$tamaño = $_FILES['subir']['size']; 
$limite_kb = 1001;
if($_FILES['subir']['type']=='application/pdf'){
    if($tamaño <= $limite_kb * 1024){
        $carpetaUsuario = '../archivos/'.$idUsuario;
        if(!file_exists($carpetaUsuario)){
            mkdir($carpetaUsuario, 0777, true);
        }
            $nombreArchivo = $_FILES['subir']['name'];
            // Validar que no se repita el nombre del archivo            
            $sql = "SELECT * FROM `t_archivos` where id_alumno = $idUsuario";
            $result = mysqli_query($conexion, $sql);
            if (!$result) {
                echo "bad sentencia";
            }else{
            $datos = mysqli_fetch_assoc($result);
            if (isset($datos['nombre']) || $datos== null) {
                if ($datos['nombre'] == $nombreArchivo) {
                    echo "<script>
                    alert('!!Nombre del archivo ya registrado!!');
                    window.location= 'AlumArchi.php'
                    </script>";
                }else{
                $explode = explode('.',$nombreArchivo);
                $tipoArchivo = array_pop($explode);
        
                $rutaAlmacenamiento = $_FILES['subir']['tmp_name'];
                $rutaFinal = $carpetaUsuario .'/'. $nombreArchivo;
               
                if(move_uploaded_file($rutaAlmacenamiento,$rutaFinal)){
                    $sql = "INSERT INTO `t_archivos` (`id_alumno`, `nombre`, `ruta`) VALUES (?,?,?)";
                    $stmt = mysqli_prepare($conexion, $sql);
                    $stmt->bind_param('sss', $idUsuario, $nombreArchivo, $rutaAlmacenamiento);
                    //ejecutamos la sentencia
                    if(mysqli_stmt_execute($stmt)){
                        echo "<script>
                        alert('Subido con éxito');
                        window.location= 'AlumArchi.php'                  
                        </script>";
                        //header("Location: " . $_SERVER["HTTP_REFERER"]);
                    }else{
                        echo "Chanfle, hubo un problema y no se guardo el archivo. ". mysqli_stmt_error($stmt)."<br/>";
                    }  
                        mysqli_stmt_close($stmt);
                        mysqli_close($conexion);
                            }
                        }
            }else{
                echo "bad";
            }
                }        
    }else{
        echo "<script>
                    alert('No se puede subir archivos mayores a 1MB');
                    window.location= 'AlumArchi.php'                  
        </script>";
    }
}else{
    echo "<script>
    alert('Solo se admiten archivos PDF');
    window.location= 'AlumArchi.php'
   
</script>";
}
?>