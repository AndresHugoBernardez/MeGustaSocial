<?php
$GLOBALS["conn"]=null;



function conectarse()
{
//---------------------crear conexión


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tabla1";

// Create connection


$GLOBALS["conn"] = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($GLOBALS["conn"]->connect_error) {
    die("Connection failed: " . $GLOBALS["conn"]->connect_error);
    echo"Conexión fallida";
    echo $GLOBALS["conn"]->connect_error;
    return(0);
  }

  else
  {
    
    echo "|conectado!!!|";
    return(1);
  }
}
//-------------------------crear conexión fin
?>