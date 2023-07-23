<?php

include_once "insert.php";
include_once "insertfin.php";
include_once "conectar.php";
include_once "conectarfin.php";


function checkearSession()
{


//FASE:   verificar existencia de session

if(isset($_SESSION["usuario"])&&isset($_SESSION["id"])&&isset($_SESSION["sessionpassword"]))
{
//FASE:   buscar en db login id y sessionpass


    $connected=conectarse();

    if($connected)
    {

        $columnas='`id`,`sessionpassword`';
        $tabla='`login`';
        $where='';

            if(seleccionar($columnas,$tabla,$where))
            {


            // Fetch row
            $row=mysqli_fetch_row($GLOBALS["result"]);

            //FASE:  verificar que sean iguales
            if($_SESSION["id"]==$row[0])&&($_SESSION["sessionpassword"]==$row[1]))
            {
                echo "|usuario logeado|";
                return(1);

            }
            else
            {
                return(0);
            }

          


            
            //limpiar row
            unset($row);
            
        
            cerrarSeleccion(1);
            } 


        desconectar();
        }

    }
    else
    {

    }
}


session_start();


//ejemplo
$_SESSION["usuario"]="andres";
$_SESSION["sessionpass"]="12345";
$_SESSION["id"]=1;


checkearSession();

?>