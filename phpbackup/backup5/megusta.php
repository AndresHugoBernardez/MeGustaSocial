<?php

include_once "insert.php";
include_once "logMG.php";
include_once "select.php";
include_once "selectfin.php";
include_once "actualizar.php";


function entidadLikes($idente,$opcion)
{

    $columnas="`likes`";
    $tabla="`entidades`";
    $where="`idente`=".$idente;
    if(seleccionar($columnas,$tabla,$where))
    {
        #DEBUG
        logMG(2,"megusta:entidadLikes",$idente,"seleccionado");

        $row=mysqli_fetch_row($GLOBALS["result"]);
        $likes=$row[0];
        unset($rows);
        cerrarSeleccion(1);

        //incrementar
        if($opcion==1)
        {
            $likes++;
        }
        //decrementar
        else if($opcion==2)
        {
            $likes--;
        }
        $settings="`likes`=".$likes;

        if(update($tabla,$settings,$where))
        {
            #DEBUG
            logMG(2,"megusta:entidadLikes:update",$idente,$likes);
            
        }
        else
        {
            #DEBUG
            logMG(2,"megusta:entidadLikes:update","ERROR!!",$idente,$likes);
        }




    }
    else
    {
        #DEBUG
        logMG(2,"megusta:entidadLikes",$idente,"ERROR");
    }

}



function megusta($id,$idente)

{

    $tablaColumnas="`megusta`(`id`,`idente`)";
    $values="(".$id.",".$idente.")";

    if(insertar($tablaColumnas,$values))
    {
        #DEBUG
        logMG(3,"megusta",$id,$idente);

        entidadLikes($idente,1);

        return(1);
    }
    else
    {
        #DEBUG
        logMG(3,"megusta","error",$id,$idente);
        return(0);
    }
   
}

function nomegusta($id,$idente)
{

    $sql="DELETE FROM `megusta` where `id`=".$id." and `idente`=".$idente;


    if ($GLOBALS["conn"]->query($sql) === TRUE) {

        #DEBUG
        logMG(3,"nomegusta","se eliminó el registro");
        
        entidadLikes($idente,2);

        return(1);
    }
    else
    {
        #DEBUG
        logMG(3,"nomegusta","no se pudo eliminar el registro");
        return(0);
    }



}





?>