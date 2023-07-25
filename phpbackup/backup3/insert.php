<?php


function insertar($tablaColumnas,$values)
{

//  ----------------------INSERT INTO
// variables para inset into: $tablaColumnas,$values
//
//
//
//
$sql = "INSERT INTO ".$tablaColumnas." VALUES ".$values;



if ($GLOBALS["conn"]->query($sql) === TRUE) {

    echo "New record created successfully|";
    return(1);
}
else
{
    return(0);
}

// ----------------------fin primera parte de insert into
}
?>