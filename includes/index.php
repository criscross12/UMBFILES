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
        <p class="lead" style="text-align: justify;">Éste es el sistema gestor de archivos para uso exclusivo de la UESX, debido a la contingencia provocada por el COVID-19 el sistema será
          auxiliar en la gestión de archivos tanto para el encargado de control escolar como el alumno evitando el contacto social para reducir cualquier posibilidad de contagios.
          Aqui tendra a la disposición los archivos de los alumnos de recien ingreso para su manipulación dentro del siste SIDIUMB, que puede ingresar en el enlace de abajo.
        </p>
        <p class="lead">
          <a href="http://sidiumb.umb.edu.mx:8088/" class="btn btn-lg btn-secondary">SIDIUMB</a>
        </p>
      </main>
    </div>
    <img src="colibri.jpg" alt="col" style="width: 500px; height: 250px;">
  </body>
<?php
  include("futter.php");
} else {
  header("location: ../index.php");
}
?>