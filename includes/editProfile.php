<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['id'];
if (isset($_SESSION['id'])) {
    $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql);
    $sqlc = mysqli_query($conexion, 'SELECT carrera.Nombre_Carrera FROM `alumno` INNER JOIN carrera on Carrera = carrera.id WHERE alumno.id = "' . $idUsuario . '" ');
    $filaC = mysqli_fetch_assoc($sqlc);
    if (isset($_POST['update'])) {
        $id = $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $AP = $_POST['AP'];
        $AM = $_POST['AM'];
        $contrasena = $_POST['Contrasena'];
        $carrera = $filas['Carrera'];
        if ($carrera == '1') {
            $query = "UPDATE `alumno` SET `Nombre` = '$nombre',`A_paterno` = '$AP',`A_Materno` = '$AM' , `Contrasena` = '$contrasena' , `Carrera`= '$carrera' WHERE id=$id";
            mysqli_query($conexion, $query);
            echo "<script>
     alert('!Actualizado Correctamente :)!');
     window.location= 'profile.php'
     </script>";
        } else if ($carrera == '2') {
            $query = "UPDATE `alumno` SET `Nombre` = '$nombre',`A_paterno` = '$AP',`A_Materno` = '$AM' , `Contrasena` = '$contrasena' , `Carrera`= '$carrera' WHERE id=$id";
            mysqli_query($conexion, $query);
            echo "<script>
     alert('!Actualizado Correctamente :)!');
     window.location= 'profile.php'
     </script>";
        } else if ($carrera == '3') {
            $query = "UPDATE `alumno` SET `Nombre` = '$nombre',`A_paterno` = '$AP',`A_Materno` = '$AM' , `Contrasena` = '$contrasena' , `Carrera`= '$carrera' WHERE id=$id";
            mysqli_query($conexion, $query);
            echo "<script>
     alert('!Actualizado Correctamente :)!');
     window.location= 'profile.php'
     </script>";
        }
    }

    include("headeralum.php");
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editProfile.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Nombre</label>
                        <input name="nombre" type="text" class="form-control" value="<?php echo $filas['Nombre']; ?>"
                            placeholder="Update Nombre" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Apellido Paterno</label>
                        <input name="AP" type="text" class="form-control" value="<?php echo $filas['A_paterno']; ?>"
                            placeholder="Update Nombre" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Apellido Materno</label>
                        <input name="AM" type="text" class="form-control" value="<?php echo $filas['A_Materno']; ?>"
                            placeholder="Update Nombre" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Matricula</label>
                        <input name="Matricula" type="text" class="form-control"
                            value="<?php echo $idUsuario ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Contraseña</label>
                        <input name="Contrasena" type="text" class="form-control"
                            value="<?php echo $filas['Contrasena']; ?>" placeholder="Update Nombre">
                    </div>
                    <!--   PRUEBA CON SELECT  -->
                    <div class="form-group">
                        <label class="font-weight-bold">Carrera Actual:</label>
                        <input name="matricula" type="text" class="form-control"
                            value="<?php echo $filaC['Nombre_Carrera'] ?>" disabled>
                    </div>

                    <!--   PRUEBA CON SELECT  -->
                    <div class="container text-center">
                        <button class="btn btn-success" name="update">
                            Actualizar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php

} else {
    include("futter.php");
    header("location: ../index.php");
}
include("futter.php");



?>