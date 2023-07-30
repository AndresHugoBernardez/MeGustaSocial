

<?php
session_start();
include_once "conectar.php";
include_once "conectarfin.php";
include_once "select.php";
include_once "selectfin.php";


$ArrayUsuarioActual=array();




function mostrarinputs()
{

    

    if (conectarse()){
        


        echo '<form action="mostrarinputs.php" method="post">';


        $columnas="`idente`";
        $tabla="`megusta`";
        $where="`id`=".$_SESSION["id"];
        


        //FASE recuperar que cosas le gustan al usuario
        if(seleccionar($columnas,$tabla,$where))
        {


            $i=0;
           
            // cada valor
            while($row = mysqli_fetch_row($GLOBALS["result"])) {

                
                #debug
                logMG(4,"mostrarinputs",$where,$row[0]);


                // recuperando cada dato que le gusta al usuario
                $ArrayUsuarioActual[$i]=$row[0];
                
                
                    echo '<input type="hidden" name="arrayUsuarioViejo[]" value="'.$row[0].'">';
                
                $i++;


                //limpiar row
                unset($row);
            }
        

            cerrarSeleccion(1) ;
        }
        else
        {
            #debug
            logMG(4,"mostrarinputs",$where,"error");
        }


        foreach($ArrayUsuarioActual as $idente)
        {

            echo ">>".$idente;
        }

        $columnas="`idente`,`entidad`";
        $tabla="`entidades`";
        if(seleccionar($columnas,$tabla))
        {



            
            // cada valor
            while($row = mysqli_fetch_row($GLOBALS["result"])) {

                
                 #debug
                 logMG(4,"mostrarinputs",$row[0],$row[1],"resultado".in_array($row[0], $ArrayUsuarioActual));


                echo '<input type="checkbox"  name="chckbx[]"  value="'.$row[0].'"';

                // si el dato es el que le gusta al usuario se mostrará chequeado.
                $siLeGusta=in_array($row[0], $ArrayUsuarioActual);
                if ($siLeGusta) 
                {echo "checked ";
                }


                echo '> <label for="entidad'.$row[0].'">'.$row[1].' </label><br>';

                


                //limpiar row
                unset($row);
            }

            
            
            echo '<input type="submit" name="megusta!">';
            echo '</form>';


            



            cerrarSeleccion(1) ;
        }
        else
        {
            #debug
            logMG(4,"mostrarinputs","error al seleccionar");
        }




    desconectar();

    }





}





if (isset($_POST))
{

    if (isset($_POST["megusta!"])){

        echo "megusta<br>";
        foreach($_POST["arrayUsuarioViejo"] as $idente)
        {

            echo ">>".$idente;
        }

        echo "ahoramegusta<br>";
        foreach($_POST["chckbx"] as $idente)
        {

            echo ">>".$idente;
        }

         

    }


}


//-----------EJEMPLO

$GLOBALS["debugNivel"]=1;
mostrarinputs();


?>