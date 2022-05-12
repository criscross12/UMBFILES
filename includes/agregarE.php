<?php include "conexion.php";
session_start();
if (isset($_SESSION['matricula'])) {
    include("header.php");
    $sqlMaestros = "SELECT * FROM maestros";
    $resultMaestros = mysqli_query($conexion, $sqlMaestros);
    $sqlMaterias = "SELECT * FROM materias";
    $resultMaterias = mysqli_query($conexion, $sqlMaterias);
    $sql = "SELECT * FROM estatus";
?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form method="POST" action="encuestas/saveEncuesta.php">
                        <h3>Agregar Encuesta</h3>
                        <hr>
                        <div class="form-group">
                            <label class="font-weight-bold">Titulo</label>
                            <input name="Titulo" type="text" class="form-control" placeholder="Ingrese el titulo">
                        </div>
                        <!--   PRUEBA CON SELECT  -->
                        <div class="form-group">
                            <label class="font-weight-bold">Docente</label>
                            <select class="form-control" name="Docente">
                                <option value="0">Seleccione:</option>
                                <?php
                                while ($filasCa = mysqli_fetch_array($resultMaestros)) {
                                    echo '<option value="' . $filasCa["ID"] . '">' . $filasCa["Nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Materia</label>
                            <select class="form-control" name="Materia">
                                <option value="0">Seleccione:</option>
                                <?php
                                while ($filasMa = mysqli_fetch_array($resultMaterias)) {
                                    echo '<option value="' . $filasMa["ID"] . '">' . $filasMa["Nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Estatus</label>
                            <select class="form-control" name="Status">
                                <option value="0">Seleccione:</option>
                                <?php
                                
                                $res = mysqli_query($conexion,$sql);
                                if ($res) {
                                    echo "good?";
                                }else{
                                    echo "fail";
                                }
                                while ($filasS = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $filasS["Id"] . '">' . $filasS["Status"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <div class="fl">
                                <label class="font-weight-bold">Nº de opciones:</label>
                                <select name="respuestas" class="form-control">
                                  
                                </select>
                            </div> -->
                        <div class="container">
                            <input type="submit" class="btn btn-success btn-block" name="save" value="GUARDAR">
                            <a href="encuestas.php" class="btn btn-info btn-block">← Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
} else {
    header("location: ../index.php");
}
include("futter.php");
?>