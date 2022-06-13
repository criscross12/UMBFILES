<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
    $Id_admin = $_SESSION['Id_admin'];
    $sql = mysqli_query($conexion, "SELECT * FROM `administradores` where Id_admin = '$Id_admin'");
    $filas = mysqli_fetch_assoc($sql);
    $id_admin_carrera = $filas['Carrera'];
    include("header.php");
    $sqlSemestre = "SELECT * FROM semestre";
    $result = mysqli_query($conexion, $sqlSemestre);
    $sqlCarrera = "SELECT * FROM carrera WHERE Carrera = '$id_admin_carrera'";
    $resultCarrera = mysqli_query($conexion, $sqlCarrera);
?>

    <div class="container">
        <hr style="margin-top:20px;margin-bottom: 20px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la materia</th>
                    <th>Carrera</th>
                    <th>Semestre</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                <h4 class="text-center">Lista de Materias</h4>
                <?php
                $sql = "SELECT materias.ID as id,carrera.Nombre_Carrera as NC,semestre.nombre_semestre as S, materias.Nombre AS NM FROM `materias` INNER JOIN semestre on semestre.id= materias.Semestre INNER JOIN carrera on carrera.id = materias.Carrera WHERE materias.Carrera = ' $id_admin_carrera'";
                if ($conexion->query($sql)->num_rows > 0) {
                    foreach ($conexion->query($sql) as $filas) {
                        $NombreMateria = $filas["NM"];
                        $Carrera = $filas["NC"];
                        $Semestre = $filas["S"];
                        $id = $filas['id'];
                ?>
                        <tr>
                            <td>
                                <a>
                                    <?php echo $NombreMateria ?>
                                </a>
                            </td>
                            <td> <?php echo $Carrera ?> </td>
                            <td> <?php echo $Semestre  ?> </td>
                            <!-- <td>
                                <a href="editMateria.php?id=<?php echo $filas['id']; ?>" class="btn btn-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="materias/deleteMaterias.php?id=<?php echo $id ?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt" onclick="return confirm('Esta seguro de eliminar al alumno?');">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></i>
                                </a>
                            </td> -->
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
    </div>
    <!-- <div class="container ml-4">
        <img src="materias.jpg" alt="alumno" style="width: 250px; height: 250px;">
    </div> -->
<?php
} else {
    header("location: ../index.php");
}
include("futter.php");
?>