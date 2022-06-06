<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
  $Id_admin = $_SESSION['Id_admin'];
  $sql = mysqli_query($conexion, "SELECT * FROM `administradores` where Id_admin = '$Id_admin'");
  $filas = mysqli_fetch_assoc($sql);
  include("header.php");
?>

  <body class="text-center">
    <div class="container">
      <main role="main" class="inner cover">
        <br>
        <h1 class="cover-heading">Bienvenido Lic. <?php echo $filas['Nombre'] ?></h1>
        <p class="lead" style="text-align: justify;">Bienvenido a UMBFILES, una app web pensada en el registro y control de la evaluación docente que se lleva a cabo dentro de la UES Xalatlaco.        
        El propósito de esta evaluación es generar estrategias y medidas de refuerzo relacionadas directamente con las oportunidades de mejora que presenta la práctica docente en nuestra Universidad. Las necesidades de cada docente son diferentes, lo cual requiere de un proceso de inclusión flexible para el alcance de los objetivos del proceso educativo de calidad. Esto permitirá a cada docente adquirir un grado de compromiso consigo mismos, con el proceso educativo y con la institución.
        </p>
        <p class="lead">
          <a href="http://sidiumb.umb.edu.mx:8088/" class="btn btn-lg btn-secondary">SIDIUMB</a>
        </p>
      </main>
    </div>
    <img src="t-1862x1862.jpg" alt="col" style="width: 250px; height: 500;">
  </body>
<?php
  include("futter.php");
} else {
  header("location: ../index.php");
}
?>