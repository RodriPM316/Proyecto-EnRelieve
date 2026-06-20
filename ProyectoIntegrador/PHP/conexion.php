<?php
function conectar(){
    try{
        $tipo="localhost";
        $user="root";
        $password="Permon17$";
        $db="pintegrador";
        $puerto=3305;

        $conectar=new mysqli($tipo, $user, $password, $db, $puerto);
        
        if ($conectar->connect_error) {
            die("Error crítico de conexión: " . $conectar->connect_error);
        }
        
        return $conectar;
    }catch(Exception $e){
        echo "Error: ".$e->getMessage();
    }
}
?>
