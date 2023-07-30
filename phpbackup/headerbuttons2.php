<?php
    include_once "chkSession.php";


    if(checkearSession() )
    {
        echo '<a href="index.php" id="megusta""><button   class="botonheader" >Volver al Inicio</button></a>';
        echo '<a href="logoutMG.php" id="logout" ><button  class="botonheader" >Cerrar Sesión</button></a>';
        echo '<h3 id="logged">'.$_SESSION["usuario"].'</h3>';
    }
    else
    {
        echo '<a href="loginMG.php" id="loggin"><button   class="botonheader" >loguearse</button></a>';
        echo '<a href="signupMG.php" id="signup"><button  class="botonheader" >Crear Cuenta</button></a>';
        echo '<h3 id="logged">no logueado</h3>';
    }

    ?>