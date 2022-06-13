<?php include "conexion.php";
session_start();
$idUsuario = $_SESSION['id'];
if (isset($_SESSION['id'])) {
  $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
  $filas = mysqli_fetch_assoc($sql);
  include("headeralum.php");
?>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="cover.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <!-- <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand"></h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#"></a>
            <a class="nav-link" href="#"></a>
            <a class="nav-link" href="#"></a>
          </nav>
        </div>
      </header> -->
      <div class="container ">
        <main role="main" class="inner cover">
          <h1 class="cover-heading">Acerca de</h1>
          <p class="lead" style="text-align: justify;">El sistema fue desarrollado por el alumno de la carrera Ingenieria en Sistemas Computacionales de la UESX, Cristian Enrique Villa Morales.
            Se pone en disposición contactos del mismo para cualquier duda o aclaración del sistema, e igualmente de cualquier apoyo de cualquier tipo.
          </p>
        </main>
      </div>
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
  <?php
} else {
  include("futter.php");
  header("location: ../index.php");
}
include("futter.php");
  ?>