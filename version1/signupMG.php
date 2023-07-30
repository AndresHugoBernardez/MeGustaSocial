<?php
include_once "head.php";

include_once "header2.php";
include_once "headerfin.php";



#HOMEWORK realizar cierre de sesión
/*include_once "chkSession.php";
include_once "LogOut.php";
include_once "conectar.php";
include_once "conectarfin.php";*/

?>



<article>

<form action="signupMG.php" method="post">


Usuario:<input type="text" name="usuario"><br>
Contraseña:<input type="password" name="clave"><br>
Repita Contraseña:<input type="password" name="clave2"><br>
<input type="submit" name="loguearse" value="loguearse">

</form>




<?php

if (isset($_POST))
{
    include_once "SignUp.php";

    if (isset($_POST["usuario"])&&isset($_POST["clave"])&&isset($_POST["clave2"]))
    {

        
        #HOMEWORK  realizar cierre de sesion previo al logueo

        if(SignUp($_POST["usuario"],$_POST["clave"],$_POST["clave2"]))
        {
    
            header("Location:index.php");
            exit();
        }
        else
        {
            echo "<p>Usuario o contraseña incorrectas</p>";
        }
    }
   


}


?>

</article>

<?php
include_once "footer.php";
?>