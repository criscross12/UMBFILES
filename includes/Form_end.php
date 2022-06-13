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
    $promFinal = ($prom19 + $prom20);
    $fin  = $promFinal / 11;
    $sqlinsert1 = "UPDATE encuesta_respuestas set p59=" . $p59 . ", p60=" . $p60 . ",  p61=" . $p61 . ",  p62=" . $p62 . ", p63=" . $p63 . ", Promedio=" . $fin . ", Activo=" . 1 . "  where IdEncuestaRes=$idEncuestaRes";
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
                    <h3 class="masthead-brand"></h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <h1 class="cover-heading">!!!!Contestado!!!!</h1>
                <p class="lead">Gracias por tu participación, esperamos que tu experiencia fuera la más agradable, te invitamos a seguir contestando tus encuestas pendientes, en caso contrario, puedes finalizar tu sessión.</p>
                <p class="lead">
                    <a href="publicacines.php" class="btn btn-lg btn-success">Volver a encuetas -></a>
                </p>
            </main>
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