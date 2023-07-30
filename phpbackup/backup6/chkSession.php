<?php

include_once "logMG.php";
include_once "select.php";
include_once "selectfin.php";
include_once "conectar.php";
include_once "conectarfin.php";


function checkearSession()
{

    $returnFlag=0;

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


            #DEBUG
            logMG(1,"chkSession",$row[0],$row[1]);
            
            //FASE:  verificar que sean iguales
            if(($_SESSION["id"]==$row[0])&&($_SESSION["sessionpass"]==$row[1]))
            {

                #DEBUG
                logMG(3,"chkSession","|usuario ".$_SESSION["usuario"]." logeado|");
                
                $returnFlag=1;

            }
            else
            {
                #DEBUG
                logMG(3,"chkSession","|usuario no logeado|");
                
                $returnFlag=0;
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
        #DEBUG
        logMG(3,"chkSession","|usuario no logeado|");
                
        $returnFlag=0;
    }

    return($returnFlag);
}



function checkSession()
{

    $returnFlag=0;

//FASE:   verificar existencia de session

if(isset($_SESSION["usuario"])&&isset($_SESSION["id"])&&isset($_SESSION["sessionpass"]))
{
//FASE:   buscar en db login id y sessionpass


    $connected=conectarse();

  
        $columnas='`id`,`sessionpassword`';
        $tabla='`login`';
        $where='`id`='.$_SESSION["id"];

            if(seleccionar($columnas,$tabla,$where))
            {


            // Fetch row
            $row=mysqli_fetch_row($GLOBALS["result"]);


            #DEBUG
            logMG(1,"chkSession",$row[0],$row[1]);
            
            //FASE:  verificar que sean iguales
            if(($_SESSION["id"]==$row[0])&&($_SESSION["sessionpass"]==$row[1]))
            {

                #DEBUG
                logMG(3,"chkSession","|usuario ".$_SESSION["usuario"]." logeado|");
                
                $returnFlag=1;

            }
            else
            {
                #DEBUG
                logMG(3,"chkSession","|usuario no logeado|");
                
                $returnFlag=0;
            }

          


            
            //limpiar row
            unset($row);
            
        
            cerrarSeleccion(1);
            } 


       

    }
    else
    {
        #DEBUG
        logMG(3,"chkSession","|usuario no logeado|");
                
        $returnFlag=0;
    }

    return($returnFlag);
}




//ejemplo

/*session_start();
$GLOBALS["debugNivel"]=1;


checkearSession();*/

?>