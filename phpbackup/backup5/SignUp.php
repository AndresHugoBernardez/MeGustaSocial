<?php

include_once "logMG.php";
include_once "conectar.php";
include_once "conectarfin.php";
include_once "select.php";
include_once "selectfin.php";
include_once "insert.php";


function SignUp($usuario,$pass,$pass2)
{
    $flagUsuario=0;

//FASE: verificar que el usuario no esté en uso




if(conectarse())
    {

            $columnas='`id`';
            $tabla='`login`';
            $where="`usuario`='".$usuario."'";

            if(seleccionar($columnas,$tabla,$where))
            
                
                {
                    #SALIDA
                    echo "usuario en uso!!!";
                    cerrarSeleccion(1);
                    $flagUsuario=0;
                }
                else
                {
                    $flagUsuario=1;

                    #SALIDA
                    echo "usuario disponible";
                }
            
        
            
        




    

if($flagUsuario)
{
        //FASE: chequear que las contraseñas sean iguales
        if($pass==$pass2){

        // FASE: BUSCAR ULTIMO ID
        
        $QUERRY="SELECT `id` from `login` ORDER BY `id` DESC";

        if(seleccionar("","","",$QUERRY))
        {
             // Fetch row
            $row=mysqli_fetch_row($GLOBALS["result"]);

            $ultimoID=$row[0]+1;
            unset($row);
        
    
            cerrarSeleccion(1);

            //FASE: insertar dato en login
            $numeroRandom=rand(1000,99999);
            $tablaColumnas=" `login`(`id`,`usuario`,`password`,`sessionpassword`)";
            $values="(".$ultimoID.",'".$usuario."','".$pass."','".$numeroRandom."')";

            #DEBUG
            logMG(3,"SignUp",$tabla,$values);
            
            if(insertar($tablaColumnas,$values))



            {
            //FASE: iniciar sesión
                #DEBUG
                logMG(3,"SignUp","nuevo usuario insertado",$values);
                
                

                $_SESSION["usuario"]=$usuario;
                $_SESSION["id"]=$ultimoID;
                $_SESSION["sessionpass"]=strval($numeroRandom);


                #DEBUG
                logMG(3,"SignUp","Sesion Iniciada",$_SESSION["usuario"],$_SESSION["id"], $_SESSION["sessionpass"]);
              
                #SALIDA
                echo "Nuevo usuario Insertado";


            }
            }
            else
            {
                 #DEBUG
                 logMG(3,"SignUp","Error en las claves");

                #SALIDA
                echo "Error las claves no coinciden!!!";
            }


        } 

       

}





desconectar();
}



}


session_start();
$GLOBALS["debugNivel"]=1;

SignUp("hugo","123123","123123");
?>