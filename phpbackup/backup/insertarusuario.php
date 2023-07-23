
<?php

include "conectar.php";
include "select.php";
include_once "selectfin.php";
include_once "conectarfin.php";
include_once "insert.php";
include_once "insertfin.php";


function insertarUsuario($tablaColumnas,$values)
{


$connected=conectarse();

if($connected)
{
    if(insertar($tablaColumnas,$values))
        {
        cerrarInsertar(1);//funcion innecesaria
        } 

    desconectar();
}

}

// PRUEBA:
    $tablaColumnas=" `login`(`id`,`usuario`,`password`,`sessionpasword`)";
    $values="('3','german','456456','44444')";
    insertarUsuario($tablaColumnas,$values);
?>
