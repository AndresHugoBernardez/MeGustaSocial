<?php

//
function update($tabla,$settings,$where)
{

//  ----------------------INSERT INTO
// variables para inset into: $tablaColumnas,$values
//
//
//
//

//UPDATE MyGuests SET lastname='Doe' WHERE id=2
$sql = "UPDATE ".$tabla." SET ".$settings." WHERE ".$where;



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