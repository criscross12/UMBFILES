<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
  include("header.php");
?>

  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand"></h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#"></a>
            <a class="nav-link" href="#"></a>
            <a class="nav-link" href="#"></a>
          </nav>
        </div>
      </header>

      <div class="container">
        <main role="main" class="inner cover">
          <h1 class="cover-heading">Acerca de</h1>
          <p class="lead" style="text-align: justify;">El sistema fue desarrollado por el alumno de la carrera Ingenieria en Sistemas Computacionales de la UESX, Cristian Enrique Villa Morales.
            Se pone en disposición contactos del mismo para cualquier duda o aclaración del sistema, e igualmente de apoyo de cualquier tipo.
          </p>
        </main>

        <footer class="mastfoot mt-auto">
          <div class="inner">
            <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
          </div>
          <div>
            <a href="https://github.com/criscross12" class="btn btn-info">
              <i class="fab fa-github"></i>
            </a>
          </div>        
        </footer>
      </div>

    </div>

  <?php
} else {
  header("location: ../index.php");
}
include("futter.php");
  ?>