
<?php
//-------------------------SELECT INICIO
// VARIABLES PARA SELECT       $columnas,$tabla,$where
//
//
//
//


    //-----------------------------------------SEPARADOR


function seleccionar($columnas,$tabla,$where)
{

        if($where=='')
        {
        $sql = "SELECT ".$columnas." FROM ".$tabla;
        }
        else
        {
          $sql = "SELECT ".$columnas." FROM ".$tabla." where ".$where;
        }


        echo $sql;

        $GLOBALS["result"] = mysqli_query($GLOBALS["conn"],$sql);



        if (mysqli_num_rows($GLOBALS["result"]) > 0) {


          echo "select exitoso|";
          return(1);
        }
        else
        {
          return(0);
        }



}
/*
          // cada valor
while($row = mysqli_fetch_row($GLOBALS["result"])) {
  echo "id: " . $row[0]. " - Name: " . $row[1]. " " . $row[2]. "<br>";
}




        // Buscar un único valor
        mysqli_data_seek($GLOBALS["result"],14);

        // Fetch row
        $row=mysqli_fetch_row($GLOBALS["result"]);

        //printf ("Lastname: %s Age: %s\n", $row[0], $row[1]);


       */



///  -------------FIN SELECT primera parte
?>