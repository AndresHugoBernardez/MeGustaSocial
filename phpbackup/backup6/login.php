<?php

include_once "logMG.php";
include_once "select.php";
include_once "selectfin.php";
include_once "conectar.php";
include_once "conectarfin.php";
include_once "actualizar.php";


function login($usuario,$password)
{


//FASE:   buscar en db login id, usuario, password, sessionpassword where usuario=solicitado


    

    if(conectarse())
    {

            $returnFLAG=0;
            $columnas='`id`,`usuario`,`password`';
            $tabla='`login`';
            $where="`usuario`='".$usuario."'";

            if(seleccionar($columnas,$tabla,$where))
            {


            // Fetch row
            $row=mysqli_fetch_row($GLOBALS["result"]);

            #DEBUG
            logMG(1,"login","0:".$row[0]."1:".$usuario.":".$row[1]."2:".$password.":".$row[2]);

            
            //FASE:  verificar que sean iguales
            if(($usuario==$row[1])&&($password==$row[2]))
            {


                //FASE: Actualizar sessionpassword

                $randomNumber=rand(1000,99999);
                $tabla="`login`";
                $settings="`sessionpassword`='".$randomNumber."'";
                $where="`id`=".$row[0];

                if(update($tabla,$settings,$where))
                {

                    //FASE: Actualizar $_SESSION
                    
                    $_SESSION["usuario"]=$row[1];
                    $_SESSION["id"]=$row[0];
                    $_SESSION["sessionpass"]=strval($randomNumber);

                    #DEBUG
                    logMG(3,"login","usuario logueado");

                    #SALIDA
                    echo "|usuario logeado|";
                    $returnFLAG=1;
                }
                else
                {
                    #DEBUG
                    logMG(3,"login","|>error numero 634<|");
                    $returnFLAG=0;
                    
                }


            }
            else
            {
                $returnFLAG=0;
            }

          


            
            //limpiar row
            unset($row);
            
        
            cerrarSeleccion(1);
            } 


    desconectar();
    }

    
    else
    {

    }
    return($returnFLAG);
}


session_start();


//ejemplo


$GLOBALS["debugNivel"]=1;
login("german","456456");

?>