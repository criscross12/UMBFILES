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
            <h1 class="cover-heading">Bienvenido <?php echo $filas['Nombre'] ?></h1>
            <p class="lead" style="text-align: justify;">Bienvenido a la prueba para la app web que pretende implementar
                competencias digitales
                en la UES Xalatlaco, en esta primera prueba se harán pruebas al módulo de archivos que
                consiste en que los alumnos suban a al sistema documentos digitalizados que son
                manipulados en el área de control escolar como lo son el acta de nacimiento, CURP, entre
                otros que son requeridos en esta área</p>
            <p class="lead">
                <a href="../archivos/Manuales/M2021.pdf" download="Manual de uso Alumno" class="btn btn-lg btn-info">
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