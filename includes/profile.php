<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['id'];
if (isset($_SESSION['id'])) {
    // $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
    // $filas = mysqli_fetch_assoc($sql);
    include("headeralum.php");
?>
<?php
   $sql = "SELECT alumno.id as id,carrera.Nombre_Carrera as NombreCarrera, alumno.Nombre as NombreAlumno,alumno.A_paterno as AP,semestre.nombre_semestre as semestre, alumno.A_Materno AS AM, alumno.Matricula AS matricula,alumno.Contrasena as contrasena FROM alumno INNER join carrera on alumno.Carrera = carrera.id INNER JOIN semestre on semestre.id = alumno.semestre where alumno.id= $idUsuario";
    if ($conexion->query($sql)->num_rows > 0) {
        foreach ($conexion->query($sql) as $filas) {
            $NombreAlum = $filas["NombreAlumno"];
            $AP = $filas["AP"];
            $AM = $filas["AM"];
            $Matricula = $filas["matricula"];
            $Contra = $filas["contrasena"];
            $carrera = $filas["NombreCarrera"];
            $semestre = $filas["semestre"];
            $id = $filas["id"];
        }
    }                

    ?>

<body class="bg-light">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-primary rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4">Alumno</h2>
                            <p>Editar información del alumno</p>
                            <a href="editProfile.php?id=<?php echo $id ?>" class="btn btn-success">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-light rounded-right">
                        <h2 class="mt-3 text-center fw-bold">Información</h2>
                        <hr class="badge-primary mt-0 w-25">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Nombre:</p>
                                <h6 class="text-muted"><?php echo strtoupper($AP),"", strtoupper($AM) ?></h6>
                                <h6 class="text-muted"><?php echo strtoupper($NombreAlum)  ?></h6>
                                <p class="font-weight-bold">Contraseña:</p>
                                <h6 class="text-muted"><?php echo $Contra ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Matrícula:</p>
                                <h6 class="text-muted"><?php echo $Matricula ?></h6>
                                <p class="font-weight-bold">Carrera:</p>
                                <h6 class="text-muted"><?php echo  $carrera ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Semestre:</p>
                                <h6 class="text-muted"><?php echo $semestre ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php

} else {
    include("futter.php");
    header("location: ../index.php");
}
include("futter.php");



?>