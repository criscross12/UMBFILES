<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['Id_admin'];
if (isset($_SESSION['Id_admin'])) {
    $sql = mysqli_query($conexion, 'SELECT * FROM `administradores` where Id_admin= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql); 
    $id = $filas["Id_admin"];
    $nombre = $filas["Nombre"];
    $ap_paterno = $filas["A_paterno"];
    $ap_materno = $filas["A_materno"];
    $Contra = $filas["password"];
    $Matricula = $filas["Matricula"];
  include("header.php");
?>

<body class="bg-light">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-success rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4">Control Escolar</h2>
                            <p>Editar información</p>
                            <a href="editProfileCE.php?id=<?php echo $id ?>" class="btn btn-primary">
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
                                <h6 class="text-muted">
                                    <?php echo $nombre,"  ",$ap_paterno, "  ",$ap_materno ?>
                                </h6>
                                <p class="font-weight-bold">Contraseña:</p>
                                <h6 class="text-muted"><?php echo $Contra ?></h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Matrícula:</p>
                                <h6 class="text-muted"><?php echo $Matricula ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
} else {
  header("location: ../index.php");
}
include("futter.php");
  ?>