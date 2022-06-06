<?php include "conexion.php";
session_start();
if (isset($_SESSION['matricula'])) {
    include("header.php");
?>
<br>

<body class="text-center">
    <div class="cover-container d-flex  h-100 p-3 mx-auto flex-column">
        <main role="main" class="inner cover">
            <div class="container">
                <div class="">
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <select class="custom-select" name="filtro">
                                <option value="0">Seleccione:</option>
                                <?php
                                    $sqlCarrera = "SELECT * FROM carrera";
                                    $resultCarrera = mysqli_query($conexion, $sqlCarrera);
                                    while ($filasCa = mysqli_fetch_array($resultCarrera)) {
                                        echo '<option value="' . $filasCa["id"] . '">' . utf8_encode($filasCa["Nombre_Carrera"]) . '</option>';
                                    }
                                    ?>
                            </select>
                            <select class="custom-select" name="semestres">
                                <option value="0">Seleccione:</option>
                                <?php
                                    $sqlSemestre = "SELECT * FROM semestre";
                                    $resultCarrera = mysqli_query($conexion, $sqlSemestre);
                                    while ($filasSe = mysqli_fetch_array($resultCarrera)) {
                                        echo '<option value="' . $filasSe["id"] . '">' . $filasSe["nombre_semestre"] . '</option>';
                                    }
                                    ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success" name="filtrar" type="submit">
                                    Seleccionar
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr style="margin-top:20px;margin-bottom: 20px;">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Matrícula</th>
                                    <th>Carrera</th>
                                    <th>Contraseña</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <h4>Lista Alumnos</h4>
                                <?php
                                if (isset($_POST['filtrar'])) {
                                    $carrera = $_POST['filtro'];
                                    $semestre = $_POST['semestres'];
                                    $sql = mysqli_query($conexion, 'SELECT * FROM `alumno` where carrera= "' . $carrera . '" and semestre = "'.$semestre.'" ORDER by A_paterno ASC');
                                    $sqlall = mysqli_query($conexion, 'SELECT * FROM `alumno` ORDER by A_paterno ASC');

                                    if ($carrera == "ALL") {
                                        while ($filas = mysqli_fetch_assoc($sqlall)) {
                                ?>
                                <tr>
                                    <td>
                                        <a href="archivos.php?id=<?php echo $filas['id'] ?>">
                                            <?php echo $filas['A_paterno'], $filas['A_Materno'], $filas['Nombre'] ?>
                                        </a>
                                    </td>
                                    <td> <?php echo $filas['Matricula']  ?> </td>
                                    <td> <?php echo $filas['carrera'] ?> </td>
                                    <td> <?php echo $filas['Contrasena']  ?> </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $filas['id'] ?>" class="btn btn-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delate.php?id=<?php echo $filas['id'] ?>" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"
                                                onclick="return confirm('Esta seguro de eliminar al alumno?');"> <span
                                                    class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
                                    </td>
                                    </i>
                                    </a>

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
                                    } else if ($carrera == "1") {
                                        while ($filas = mysqli_fetch_assoc($sql)) {
                ?>
            <tr>
                <td>
                    <?php echo $filas['A_paterno'], $filas['A_Materno'], $filas['Nombre'] ?>
                </td>
                <td> <?php echo $filas['Matricula']  ?> </td>
                <td> <?php echo "ISC";  ?> </td>
                <td> <?php echo $filas['Contrasena']  ?> </td>
                <td>
                    <a href="archivos.php?id=<?php echo $filas['id'] ?>" class="btn btn-info">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    <a href="edit.php?id=<?php echo $filas['id'] ?>" class="btn btn-secondary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="delate.php?id=<?php echo $filas['id'] ?>" class="btn btn-danger">
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
    <?php
                                    } else if ($carrera == "2") {
                                        while ($filas = mysqli_fetch_assoc($sql)) {
        ?>
    <tr>
        <td>
            <a href="archivos.php?id=<?php echo $filas['id'] ?>">
                <?php echo $filas['A_paterno'], $filas['A_Materno'], $filas['Nombre'] ?>
            </a>
        </td>
        <td> <?php echo $filas['Matricula']  ?> </td>
        <td> <?php echo "IMA";  ?> </td>
        <td> <?php echo $filas['Contrasena']  ?> </td>
        <td>
            <a href="edit.php?id=<?php echo $filas['id'] ?>" class="btn btn-secondary">
                <i class="fas fa-edit"></i>
            </a>
            <a href="delate.php?id=<?php echo $filas['id'] ?>" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
            </a>

        </td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    <?php

                                    } else if ($carrera == "3") {
                                        while ($filas = mysqli_fetch_assoc($sql)) {

        ?>
    <tr>
        <td>
            <a href="archivos.php?id=<?php echo $filas['id'] ?>">
                <?php echo $filas['A_paterno'], $filas['A_Materno'], $filas['Nombre']  ?>
            </a>
        </td>
        <td> <?php echo $filas['Matricula']  ?> </td>
        <td> <?php echo "IGE";  ?> </td>
        <td> <?php echo $filas['Contrasena']  ?> </td>
        <td>
            <a href="edit.php?id=<?php echo $filas['id'] ?>" class="btn btn-secondary">
                <i class="fas fa-edit"></i>
            </a>
            <a href="delate.php?id=<?php echo $filas['id'] ?>" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
            </a>

        </td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>

    </div>
    </div>
    </main>
    </div>
</body>
<?php
                                    }
                                }
                            } else {
                                header("location: ../index.php");
                            }
                            include("futter.php");
?>