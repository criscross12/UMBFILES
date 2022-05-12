<?php include "conexion.php";
session_start();
if (isset($_SESSION['matricula'])) {
    include("header.php");
    $sqlSemestre = "SELECT * FROM semestre";
    $result = mysqli_query($conexion, $sqlSemestre);
    $sqlCarrera = "SELECT * FROM carrera";
    $resultCarrera = mysqli_query($conexion, $sqlCarrera);
?>

<body class="">
    <div class="container p-16">
        <hr style="margin-top:20px;margin-bottom: 20px; ">
        <h4 class="ml-5">Registro de materias</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="materias/saveMateria.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="NombreMateria" class="form-control"
                                placeholder="Nombre de la materia" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Carrera</label>
                            <select class="form-control" name="Carrera">
                                <option value="0">Seleccione:</option>
                                <?php
                                    while ($filasCa = mysqli_fetch_array($resultCarrera)) {
                                        echo '<option value="' . $filasCa["id"] . '">' . utf8_encode($filasCa["Nombre_Carrera"]) . '</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Semestre</label>
                            <!-- MODIFICAR SELECCIONAR POR LA BASE DE DATOS -->
                            <select class="form-control" name="Semestre">
                                <!-- <option selected>Elijir...</option> -->
                                <option value="0">Seleccione:</option>
                                <?php
                                    while ($filas = mysqli_fetch_array($result)) {
                                        echo '<option value="' . $filas["id"] . '">' . utf8_encode($filas["nombre_semestre"]) . '</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save" value="GUARDAR">
                    </form>
                </div>
            </div>
</body>

<div class="col-md-8">
    <hr style="margin-top:20px;margin-bottom: 20px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre de la materia</th>
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <h4 class="text-center">Lista de Materias</h4>
            <?php
                $sql = "SELECT materias.ID as id,carrera.Nombre_Carrera as NC,semestre.nombre_semestre as S, materias.Nombre AS NM FROM `materias` INNER JOIN semestre on semestre.id= materias.Semestre INNER JOIN carrera on carrera.id = materias.Carrera";
                if ($conexion->query($sql)->num_rows > 0) {
                    foreach ($conexion->query($sql) as $filas) {
                        $NombreMateria = $filas["NM"];
                        $Carrera = $filas["NC"];
                        $Semestre = $filas["S"];
                        $id =$filas['id'];
                ?>
            <tr>
                <td>
                    <a>
                        <?php echo utf8_encode($NombreMateria) ?>
                    </a>
                </td>
                <td> <?php echo utf8_encode($Carrera) ?> </td>
                <td> <?php echo utf8_encode($Semestre)  ?> </td>
                <td>
                    <a href="editMateria.php?id=<?php echo $filas['id']; ?>" class="btn btn-secondary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="materias/deleteMaterias.php?id=<?php echo $id ?>" class="btn btn-danger">
                        <i class="fas fa-trash-alt" onclick="return confirm('Esta seguro de eliminar al alumno?');">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></i>
                    </a>
                </td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
</div>
</div>
<div class="container ml-4">
    <img src="materias.jpg" alt="alumno" style="width: 250px; height: 250px;">
</div>
<?php
} else {
    header("location: ../index.php");
}
include("futter.php");
?>