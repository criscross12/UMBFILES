<?php include "conexion.php";
// Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
session_start();

if (isset($_POST['save'])) {
    $nombre = $_POST['nombre'];
    $AP = $_POST['AP'];
    $AM = $_POST['AM'];
    $matricula = $_POST['matricula'];
    $contrasena = $_POST['contrasena'];
    $carrera = $_POST['Carrera'];
    $Semestre = $_POST['Semestre'];
    if ($carrera == '1') {
        //Validar que el usuario no este repetido
        $sqla = "SELECT Matricula FROM `alumno` where Matricula='$matricula'";
        $result = mysqli_query($conexion, $sqla);
        $datos = mysqli_fetch_array($result);
        if ($datos['Matricula'] != "" || $datos['Matricula'] == $matricula) {
            echo "<script>
            alert('!!Alumno ya registrado!!');
            window.location= 'registro.php'
            </script>";
        } else if (!is_numeric($matricula)) {
            echo "<script>
            alert('!!Solo valores numericos para la matricula!!');
            window.location= 'registro.php'
            </script>";
        } else if (!preg_match($patron_texto, $nombre) && !preg_match($patron_texto, $AP) && !preg_match($patron_texto, $AM)) {
            echo "<script>
            alert('!!El nombre sólo puede contener letras y espacios!!');
            window.location= 'registro.php'
            </script>";
        } else if (strlen($contrasena) < 6) {
            echo "<script>
            alert('!!La contraseña no debe tener al menos de 6 y no debe de tener más de 16 caracteres!!');
            window.location= 'registro.php'
            </script>";
        } else {

            $sql = "INSERT INTO `alumno` ( `Nombre`, `A_paterno`, `A_Materno`, `Matricula`, `Contrasena`, `Carrera`, `semestre`) 
    VALUES ( '$nombre', '$AP', '$AM', '$matricula', '$contrasena', '$carrera', '$Semestre')";

            $consulta = mysqli_query($conexion, $sql);
            if (!$consulta) {
                die("query fail");
            } else {
                echo "<script>
        alert('Registro Exitoso :)');
        window.location= 'registro.php'
        </script>";
            }
        }
    } else if ($carrera == "2") {
        //Validar que el usuario no este repetido
        $sqla = "SELECT Matricula FROM `alumno` where Matricula='$matricula'";
        $result = mysqli_query($conexion, $sqla);
        $datos = mysqli_fetch_array($result);
        if ($datos['Matricula'] != "" || $datos['Matricula'] == $matricula) {
            echo "<script>
                alert('!!Alumno ya registrado!!');
                window.location= 'registro.php'
                </script>";
        } else if (!is_numeric($matricula)) {
            echo "<script>
                alert('!!Solo valores numericos para la matricula!!');
                window.location= 'registro.php'
                </script>";
        } else if (!preg_match($patron_texto, $nombre) && !preg_match($patron_texto, $AP) && !preg_match($patron_texto, $AM)) {
            echo "<script>
                alert('!!El nombre sólo puede contener letras y espacios!!');
                window.location= 'registro.php'
                </script>";
        } else if (strlen($contrasena) < 6) {
            echo "<script>
                alert('!!La contraseña no debe tener al menos de 6 y no debe de tener más de 16 caracteres!!');
                window.location= 'registro.php'
                </script>";
        } else {
            //Aqui termina la validacion xd
            $sql = "INSERT INTO `alumno` ( `Nombre`, `A_paterno`, `A_Materno`, `Matricula`, `Contrasena`, `Carrera`, `semestre`) 
            VALUES ( '$nombre', '$AP', '$AM', '$matricula', '$contrasena', '$carrera', '$Semestre')";
            $consulta = mysqli_query($conexion, $sql);
            if (!$consulta) {
                die("query fail");
            } else {

                echo "<script>
            alert('Registro Exitoso :)');
            window.location= 'registro.php'
            </script>";
            }
        }
    } else if ($carrera == "3") {
        if ($nombre == "") {
            echo 'no';
        }
        //Validar que el usuario no este repetido
        $sqla = "SELECT Matricula FROM `alumno` where Matricula='$matricula'";
        $result = mysqli_query($conexion, $sqla);
        $datos = mysqli_fetch_array($result);
        if ($datos['Matricula'] != "" || $datos['Matricula'] == $matricula) {
            echo "<script>
        alert('!!Alumno ya registrado!!');
        window.location= 'registro.php'
        </script>";
        } else if (!is_numeric($matricula)) {
            echo "<script>
        alert('!!Solo valores numericos para la matricula!!');
        window.location= 'registro.php'
        </script>";
        } else if (!preg_match($patron_texto, $nombre) && !preg_match($patron_texto, $AP) && !preg_match($patron_texto, $AM)) {
            echo "<script>
        alert('!!El nombre sólo puede contener letras y espacios!!');
        window.location= 'registro.php'
        </script>";
        } else if (strlen($contrasena) < 6) {
            echo "<script>
        alert('!!La contraseña no debe tener al menos de 6 y no debe de tener más de 16 caracteres!!');
        window.location= 'registro.php'
        </script>";
        } else {
            //Aqui termina la validacion xd
            $sql = "INSERT INTO `alumno` ( `Nombre`, `A_paterno`, `A_Materno`, `Matricula`, `Contrasena`, `Carrera`, `semestre`) 
            VALUES ( '$nombre', '$AP', '$AM', '$matricula', '$contrasena', '$carrera', '$Semestre')";
            $consulta = mysqli_query($conexion, $sql);

            if (!$consulta) {
                die("query fail");
            } else {
                echo "<script>
            alert('Registro Exitoso :)');
            window.location= 'registro.php'
            </script>";
            }
        }
    }
}