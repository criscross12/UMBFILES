<?php 

    class Conectar{
        public function conexion(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $base= "umb";    

        $conexion = mysqli_connect($host,$user,$pass,$base);
        return $conexion;

        }
    }

?>