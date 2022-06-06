<?php include "conexion.php";
session_start();
if (isset($_SESSION['Id_admin'])) {
    include("header.php");
?>

<body class="">
    <div class="container p-16">
        <hr style="margin-top:20px;margin-bottom: 20px; ">
        <h4 class="ml-5">Registrar Maestro</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="maestros/save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Ap" class="form-control" placeholder="Apellido Paterno" autofocus
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Am" class="form-control" placeholder="Apellido Materno" autofocus
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="matricula" class="form-control" placeholder="Matricula" autofocus
                                required>
                        </div>
                        <!-- <div class="form-group">
                                <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" autofocus required>
                            </div>                             -->
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
                <th>Nombre</th>
                <th>Matricula</th>
                <th>Acciones</th>
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
                        <?php echo utf8_encode($filas['Ap_Paterno']) ?>
                    </a>
                    <a>
                        <?php echo utf8_encode($filas['Ap_Materno']) ?>
                    </a>
                    <a>
                        <?php echo  utf8_encode($filas['Nombre_Docente']) ?>
                    </a>
                </td>
                <td> <?php echo $filas['Matricula']  ?> </td>
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
<div class="container ml-4">
    <img src="maes.jpeg" alt="alumno" style="width: 250px; height: 250px;">
</div>
<?php
} else {
    header("location: ../index.php");
}
include("futter.php");
?>