<?php

class Conectar {

    public static function conexion(){

        $conexion = new mysqli("localhost","root","","proyecto");
        echo "hola";
        return $conexion;
    }
    

}

?>