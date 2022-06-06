<?php include "conexion.php";
    session_start();
    $idUsuario = $_SESSION['id'];
    $sql = "SELECT archivos.id_archivo as idArchivo, archivos.nombre as nombreArchivo, archivos.ruta as RUTA, usuario.id , usuario.Nombre as nombreAlumno\n"
    . "FROM `t_archivos` as archivos INNER join alumno as usuario on archivos.id_alumno = usuario.id and archivos.id_alumno = $idUsuario;";
  $result = mysqli_query($conexion,$sql);
  $datos = mysqli_fetch_array($result);
  $idArchivo = $datos['idArchivo'];
  $nombreArchivo = $datos['nombreArchivo'];
  $ruta = $datos['RUTA'];
    
      $rutaeliminar = "../archivos/".$idUsuario."/".$nombreArchivo;
      $borar = unlink($rutaeliminar);
      if($borar){
        $sqlD = "DELETE FROM `t_archivos` WHERE `id_archivo` = ?";
        $stmt = mysqli_prepare($conexion, $sqlD);
        $stmt->bind_param('i', $idArchivo);  
        if(mysqli_stmt_execute($stmt)){
          header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
            echo "Chanfle, hubo un problema y no se borro el archivo. ". mysqli_stmt_error($stmt)."<br/>";
        }  
            mysqli_stmt_close($stmt);
            mysqli_close($conexion);

      }else{
        echo "Chanfle, hubo un problema y no se borro el archivo ";
      }
      
?>