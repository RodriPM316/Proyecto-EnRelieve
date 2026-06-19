<?php
    require "conexion.php";

    $con = conectar();
    $valor=$_GET['user'];
    $restric = $_GET['nivel'];

    if($restric === 'Administrador'){
        header("Location: ../html/dashboard.php");
        exit;
    } else{
        $elimina = "delete from usuarios where Usuario = '".$valor ."'";
        $con->query($elimina);
        $con->close();

        header("Location: ../html/dashboard.php");
        exit;
    }
?>