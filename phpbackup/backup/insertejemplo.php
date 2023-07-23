

<?php

//------------------crear conexión

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{



//---------------------crear conexión fin



//  ----------------------INSERT INTO
// variables para inset into: $tablaColumnas,$values
//
//
//
//
$sql = "INSERT INTO ".$tablaColumnas." VALUES ".$values;



if ($conn->query($sql) === TRUE) {

    echo "New record created successfully|";
//-------------------------------------
  






///-----------------------------------FINISH INSERT INTO
}





 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



///-----------------------------------CERRAR CONEXIÓN
$conn->close();


}
?>