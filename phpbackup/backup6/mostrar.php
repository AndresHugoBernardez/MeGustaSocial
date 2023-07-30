<?php

include_once "conectar.php";
include_once "conectarfin.php";
include_once "select.php";
include_once "selectfin.php";

session_start();

if (isset($_POST))
{
    foreach ($_POST as $nombre=>$valor){
    
        if(is_numeric($nombre))
        {
            //DEBUG
            echo "si es numerico numero:".$nombre." valor:".$valor;
            $_SESSION["idaccion"]="listarfruta";
            $_SESSION["idaccion"]=(intval($nombre));


        }

    }
}


if(isset($_SESSION["accion"]))
{
    
    switch($_SESSION["accion"])
    {
        case "listarfruta":
            if (isset($_SESSION["idaccion"]))
            {
                mostrarGustadores($_SESSION["idaccion"]);
            }
            break;
    }
    

    unset($_SESSION["accion"]);
    unset($_SESSION["idaccion"]);

}


function mostrarperfil($id)

{
    $flag=0;
    if(conectarse())
    {


        $columnas="`usuario`";
        $tabla="`login`";
        $where="`id`=".$id;
        if(seleccionar($columnas,$tabla,$where))
        {

            $row = mysqli_fetch_row($GLOBALS["result"]);
                

                #SALIDA
                echo "<br>usuario=".$row[0]."<br>";
                
                unset($row);

              

            $flag=1;
            cerrarSeleccion(1);
        }else
        {
            $flag=0;
        }
        
        $SQL="SELECT `megusta`.`idente`,`entidad` FROM `megusta`,`entidades` WHERE `entidades`.`idente`=`megusta`.`idente` and `megusta`.`id`=".$id;

        if($flag){
        if(seleccionar("","","",$SQL))
        {
            #SALIDA
            echo "Le gusta: <br>";

            echo '<form action="mostrar.php" method="post">';
            while($row = mysqli_fetch_row($GLOBALS["result"])) {
                

                #SALIDA
                echo $row[1]."<br>";

                echo '<input type="submit" name="'.$row[0].'" value="'.$row[1].'">';

                unset($row);

              }
              echo '</form>';

            cerrarSeleccion(1);
        }
        else
        {
            #SALIDA
            echo "Al usuario no le gusta nada aún.";
        }

        }
        else
        {
            #DEBUG
            logMG(5,"mostrarperfil","USUARIO NO ENCONTRADO");
        }

        desconectar();
    }
}


    function listarUsuarios()
    {


        if(conectarse())
        {


            $columnas="`id`,`usuario`";
            $tabla="`login`";
            
            if(seleccionar($columnas,$tabla))
            {
                #SALIDA
                echo "<br> Usuarios:<br>";
                
                while($row = mysqli_fetch_row($GLOBALS["result"])){
                    

                    #SALIDA
                    echo $row[1]." id=".$row[0]."<br>";
                    
                    unset($row);
                }
                

                
                cerrarSeleccion(1);
            }else
            {
                #SALIDA
                echo "La lista está vacía";
            }


        desconectar();
        }

    }

    function listarEntidades(){
        if(conectarse())
        {


            $columnas="`idente`,`entidad`,`likes`";
            $tabla="`entidades`";
            
            if(seleccionar($columnas,$tabla))
            {
                #SALIDA
                echo "<br> Frutas:<br>";
                
                while($row = mysqli_fetch_row($GLOBALS["result"])){
                    

                    #SALIDA
                    echo $row[0]." : ".$row[1]." : ".$row[2]."<br>";
                    
                    unset($row);
                }
                

                
                cerrarSeleccion(1);
            }else
            {
                #SALIDA
                echo "La lista está vacía";
            }


        desconectar();
        }
    }







function mostrarGustadores($idente)

{
    $flag=0;
    if(conectarse())
    {


        $columnas="`entidad`";
        $tabla="`entidades`";
        $where="`idente`=".$idente;
        if(seleccionar($columnas,$tabla,$where))
        {

            $row = mysqli_fetch_row($GLOBALS["result"]);
                

                #SALIDA
                echo "<br>Fruta=".$row[0]."<br>";
                
                unset($row);

              

            $flag=1;
            cerrarSeleccion(1);
        }else
        {
            $flag=0;
        }
        
        $SQL="SELECT `usuario` FROM `login`,`megusta` WHERE `login`.`id`=`megusta`.`id` and `megusta`.`idente`=".$idente;

        if($flag){
        if(seleccionar("","","",$SQL))
        {
            #SALIDA
            echo "Le gusta a: <br>";

            while($row = mysqli_fetch_row($GLOBALS["result"])) {
                

                #SALIDA
                echo $row[0]."<br>";

                unset($row);

              }

            cerrarSeleccion(1);
        }
        else
        {
            #SALIDA
            echo "Al nadie le gusta esta fruta aún.";
        }

        }
        else
        {
            #DEBUG
            logMG(5,"mostrarperfil","FRUTA NO ENCONTRADA");
        }

        desconectar();
    }

}








$GLOBALS["debugNivel"]=1;

mostrarperfil(3);
mostrarGustadores(3);
listarUsuarios();
listarEntidades();



?>