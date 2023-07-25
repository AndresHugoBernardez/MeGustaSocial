
<?php

include_once "conectar.php";
include_once "conectarfin.php";
include_once "insert.php";
include_once "insertfin.php";


function insertarDB($tablaColumnas,$values)
{
$Flag_return=0;

$connected=conectarse();

    if($connected)
    {
        if(insertar($tablaColumnas,$values))
            {
            echo "Elemento Insertado";
            $Flag_return=1;
            } 
        else
        {
            echo "Problema al insertar elemento";
            $Flag_return=0;
        }

        desconectar();
    }

    return ($Flag_return);
}
/*
// PRUEBA:
 //   $tablaColumnas=" `login`(`id`,`usuario`,`password`,`sessionpassword`)";
  //  $values="('5','tomas','789789','44444')";
  //  insertarDB($tablaColumnas,$values);*/
?>
