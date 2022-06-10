<?php include "conexion.php";
session_start();
if (isset($_SESSION['id'])) {
    $idUsuario = $_SESSION['id'];
    $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where id= "' . $idUsuario . '" ');
    $filas = mysqli_fetch_assoc($sql);
    include("headeralum.php");
    $sql = "SELECT * FROM preguntas WHERE categoria=3";
    $pre = mysqli_query($conexion, $sql);
    $sqlRes = "SELECT * FROM respuestas";
    $res = mysqli_query($conexion, $sqlRes);
?>
    <?php
    //Datos generales de la encuesta
    $id = $_POST['Id_encuesta'];
    $idEncuestaRes = $_POST['Id_Encuesta_Res'];
    $nombre_docente = $_POST['Nombre_docente'];
    $nombre_materia = $_POST['Nombre_materia'];

    // //Resultados de la encuesta: Primera parte
    $prom19 = $_POST['Prom19'];
    $p59 = $_POST['Pregunta59'];
    $p60 = $_POST['Pregunta60'];
    $p61 = $_POST['Pregunta61'];
    $p62 = $_POST['Pregunta62'];
    $p63 = $_POST['Pregunta63'];
    $prom20 = ($p59 + $p60 + $p61 + $p62 + $p63) / 5;
    $promFinal = $prom19 + $prom20;
    $sqlinsert1 = "UPDATE encuesta_respuestas set p59=" . $p59 . ", p60=" . $p60 . ",  p61=" . $p61 . ",  p62=" . $p62 . ", p63=" . $p63 . ", Promedio=" . $promFinal . ", Activo=" . 1 . "  where IdEncuestaRes=$idEncuestaRes";
    // $conexion->query($sqlinsert1) || die("Error:" );
    $consulta = mysqli_query($conexion, $sqlinsert1);
    if (!$consulta) {
        echo mysqli_error($conexion);
    }
    ?>

    <body class="text-center">
        <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand">Cover</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <h1 class="cover-heading">Contestado</h1>
                <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit
                    the text, and add your own fullscreen background photo to make it your own.</p>
                <p class="lead">
                    <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
                </p>
            </main>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
                </div>
            </footer>
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