<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['id'];
if (isset($_SESSION['id'])) {
    $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql);
    include("headeralum.php");
?>

    <body class="text-center">
        <div class="container">
            <main role="main" class="inner cover">
                <br>
                <br>
                <br>
                <h2 class="cover-heading">Bienvenido <?php echo ucwords($filas['Nombre']) ?></h2>
                <p class="lead" style="text-align: justify;">Bienvenido a la app web UMBFILES, que pretende implementar competencias digitales en la UES Xalatlaco, fungiendo en esta primera fase como auxiliar en el proceso de evaluación docente, por favor dirígete al apartado de EVALUACIÓN DOCENTE, si existen dudas puedes descargar la guía rápida para conocer un poco más el sistema,es un gusto que utilices el sistema, es tuyo y es para crecer como universidad, excelente día.
                </p>
                <p class="lead">
                    <a href="../archivos/Manuales/Guia.pdf" download="Manual de uso Alumno" class="btn btn-lg btn-info">
                        Descargar</a>
                    <i class="fas fa-file-download"></i>
                </p>
            </main>
        </div>
    </body>

    </html>
<?php

} else {
    include("futteralum.php");
    header("location: ../index.php");
}
include("futteralum.php");



?>