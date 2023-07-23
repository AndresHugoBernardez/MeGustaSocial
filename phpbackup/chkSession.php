<?php

include_once "select.php";
include_once "selectfin.php";
include_once "conectar.php";
include_once "conectarfin.php";


function checkearSession()
{


//FASE:   verificar existencia de session

if(isset($_SESSION["usuario"])&&isset($_SESSION["id"])&&isset($_SESSION["sessionpass"]))
{
//FASE:   buscar en db login id y sessionpass


    $connected=conectarse();

    if($connected)
    {

        $columnas='`id`,`sessionpassword`';
        $tabla='`login`';
        $where='`id`='.$_SESSION["id"];

            if(seleccionar($columnas,$tabla,$where))
            {


            // Fetch row
            $row=mysqli_fetch_row($GLOBALS["result"]);

            printf("|borrame chkSession variables: id:%d  sessionpass:%s",$row[0],$row[1]);
            //FASE:  verificar que sean iguales
            if(($_SESSION["id"]==$row[0])&&($_SESSION["sessionpass"]==$row[1]))
            {
                echo "|usuario ".$_SESSION["usuario"]." logeado|";
                return(1);

            }
            else
            {
                echo"|No logueado|";
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

checkearSession();

?>