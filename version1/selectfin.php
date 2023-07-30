<?php
function cerrarSeleccion($exito)
{
//-----------------------------------------FIN Select
        
        if($exito)
        {

          // Free result set
                mysqli_free_result($GLOBALS["result"]);


        }
         else {
          


          

        }

}
///  ---------------------FIN SELECT TOTAL
?>