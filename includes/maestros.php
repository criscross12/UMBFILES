<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
    include("header.php");
    $Id_admin = $_SESSION['Id_admin'];
    $sql = mysqli_query($conexion, "SELECT * FROM `administradores` where Id_admin = '$Id_admin'");
    $filas = mysqli_fetch_assoc($sql);
    $id_admin_carrera = $filas['Carrera'];
?>

    <div class="container">
        <hr style="margin-top:20px;margin-bottom: 20px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%" class="text-center">N°</th>
                    <th width="5%" class="text-center">Clave Docente</th>
                    <th width="20%">Nombre</th>
                    <th width="5%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <h4 class="text-center">Lista Maestros</h4>
                <?php
                //$sql = "SELECT * FROM `maestros`";
                $i = 1;
                $sql = mysqli_query($conexion, "select DISTINCT maestros.ID, maestros.Titulo, maestros.Nombre_Docente, maestros.Ap_Paterno, maestros.Ap_Materno from maestros INNER join MateriaDocente where maestros.ID=MateriaDocente.IdDocente and maestros.Activo=1 order by maestros.Ap_Paterno asc");
                while ($filas = mysqli_fetch_assoc($sql)) {
                    $ID = $filas['ID'];
                    $sqlAS = "select DISTINCT materias.Nombre from maestros INNER join MateriaDocente INNER join materias on MateriaDocente.IdMateria = materias.Clave where maestros.ID=MateriaDocente.IdDocente and maestros.Activo=1 and maestros.ID = '$ID' order by maestros.Ap_Paterno asc";
                    $sql_query  = mysqli_query($conexion, $sqlAS);
                    $consultak = mysqli_fetch_row($sql_query);
                ?>
                    <tr>
                    <td class="text-center"> <?=$i++?> </td>
                        <td class="text-center"> <?php echo $filas['ID']  ?> </td>
                        <td>
                            <a>
                                <?php echo $filas['Titulo'] ?>
                            </a>
                            <a>
                                <?php echo  $filas['Nombre_Docente'] ?>
                            </a>
                            <a>
                                <?php echo $filas['Ap_Paterno'] ?>
                            </a>
                            <a>
                                <?php echo $filas['Ap_Materno'] ?>
                            </a>
                        </td>                     
                        <td class="text-center">
                            <a href="reporte2.php?ID=<?php echo $filas['ID'] ?>" class="btn btn-danger">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <!-- <a href="maestros/deleteM.php?id=<?php echo $filas['ID'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt" onclick="return confirm('Esta seguro de eliminar al alumno?');">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></i>
                            </a> -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    <!-- <div class="container ml-4">
    <img src="maes.jpeg" alt="alumno" style="width: 250px; height: 250px;">
</div> -->
<?php
} else {
    header("location: ../index.php");
}
include("futter.php");
?>