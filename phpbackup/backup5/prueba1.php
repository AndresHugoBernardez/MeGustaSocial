
<?php

include_once "logMG.php";
include_once "conectar.php";
include_once "select.php";
include_once "selectfin.php";
include_once "conectarfin.php";


$GLOBALS["debugNivel"]=1;

$connected=conectarse();

if($connected)
{

    $columnas='`usuario`,`password`';
    $tabla='`login`';
    $where='';

        if(seleccionar($columnas,$tabla,$where))
        {

           // cada valor
            while($row = mysqli_fetch_row($GLOBALS["result"])) {
            echo "nombre: " . $row[0]. " - password: " . $row[1]. "<br>";
            unset($row);
        }
    
        cerrarSeleccion(1);
        } 


    desconectar();
}


?>
