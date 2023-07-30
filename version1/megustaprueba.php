<?php

session_start();

include_once "conectar.php";
include_once "conectarfin.php";
include_once "megusta.php";





$GLOBALS["debugNivel"]=1;



if(conectarse())
{
//megusta(6,3);

nomegusta(6,3);

desconectar();
}



?>