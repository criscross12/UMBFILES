<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
    include("header.php");
?>

    <div class="container">
        <hr style="margin-top:20px;margin-bottom: 20px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="28%">Nombre</th>
                    <th width="20%">Matricula</th>
                    <th width="20%">Correo Instiucional</th>
                    <th width="10%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <h4 class="text-center">Lista Maestros</h4>
                <?php
                //$sql = "SELECT * FROM `maestros`";
                $sql = mysqli_query($conexion, 'SELECT * FROM `maestros` ORDER by Ap_Paterno ASC');
                while ($filas = mysqli_fetch_assoc($sql)) {
                ?>
                    <tr>
                        <td>
                            <a>
                                <?php echo $filas['titulo'] ?>
                            </a>
                            <a>
                                <?php echo $filas['Ap_Paterno'] ?>
                            </a>
                            <a>
                                <?php echo $filas['Ap_Materno'] ?>
                            </a>
                            <a>
                                <?php echo  $filas['Nombre_Docente'] ?>
                            </a>
                        </td>
                        <td> <?php echo $filas['ID']  ?> </td>
                        <td> <?php echo $filas['correo']  ?> </td>
                        <td>
                            <a href="editMaestros.php?ID=<?php echo $filas['ID'] ?>" class="btn btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="maestros/deleteM.php?id=<?php echo $filas['ID'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt" onclick="return confirm('Esta seguro de eliminar al alumno?');">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></i>
                            </a>
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