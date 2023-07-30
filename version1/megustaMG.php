<?php

include_once "head.php";
include_once "header.php";
include_once "headerbuttons2.php";
include_once "headerfin.php";

echo '<article>';


include_once "mostrarinputs.php";


mostrarinputs();

if(isset($_POST))
{
    if(isset($_POST["megusta!"]))
    {
        #SALIDA
        echo "<p>Guardado!</p>";
    }
}

echo '</article>';



include_once "footer.php";
?>