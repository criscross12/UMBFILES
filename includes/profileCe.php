<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['matricula'];
if (isset($_SESSION['matricula'])) {
    $sql = mysqli_query($conexion, 'SELECT * FROM `ce` where Matricula= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql); 
    $id = $filas["id"];
    $nombre = $filas["Nombre"];
    $ap_paterno = $filas["Ap_Paterno"];
    $ap_materno = $filas["Ap_Materno"];
    $Contra = $filas["Contrasena"];
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
                                    <?php echo utf8_encode(strtoupper($nombre)),"  ",utf8_encode( strtoupper($ap_paterno)), "  ",utf8_encode( strtoupper($ap_materno)) ?>
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