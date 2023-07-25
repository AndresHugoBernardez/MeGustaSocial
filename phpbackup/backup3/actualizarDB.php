<?php

include_once "conectar.php";
include_once "conectarfin.php";
include_once "actualizar.php";



function actualizarDB($tabla,$settings,$where)
{




    if(conectarse()==1)
    {
        if(update($tabla,$settings,$where))
            {
            echo "Elemento actualizados";
            } 
        else
        {
            echo "Problema al actualizar elemento";
        }

        desconectar();
    }

}
/*
// PRUEBA:
    $randomNumber=rand(1000,99999);
    $tabla="`login`";
    $settings="`sessionpassword`='".$randomNumber."'";
    $where="`id`=1";
    actualizarDB($tabla,$settings,$where);*/
?>