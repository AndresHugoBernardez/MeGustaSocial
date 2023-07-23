
<?php

include_once "conectar.php";
include_once "conectarfin.php";
include_once "insert.php";
include_once "insertfin.php";


function insertarDB($tablaColumnas,$values)
{


$connected=conectarse();

    if($connected)
    {
        if(insertar($tablaColumnas,$values))
            {
            echo "Elemento Insertado";
            } 
        else
        {
            echo "Problema al insertar elemento";
        }

        desconectar();
    }

}

// PRUEBA:
    $tablaColumnas=" `login`(`id`,`usuario`,`password`,`sessionpasword`)";
    $values="('4','laura','789789','44444')";
    insertarDB($tablaColumnas,$values);
?>
