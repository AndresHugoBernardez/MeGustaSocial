

<?php

// $columnas,$tabla,$where
//
//
//
//


    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo"Conexión fallida". $conn->connect_error;
  }

  else
  {
        if($where="")
        {
        $sql = "SELECT ".$columnas." FROM ".$tabla;
        }
        else
        {
          $sql = "SELECT ".$columnas." FROM ".$tabla." where ".$where;
        }


        echo $sql;

        $result = mysqli_query($conn,$sql);



        if (mysqli_num_rows($result) > 0) {
          //------------------------separador

          /*

          
          // cada valor
          while($row = mysqli_fetch_row($result)) {
            echo "id: " . $row[0]. " - Name: " . $row[1]. " " . $row[2]. "<br>";
          }


        
 
                  // Buscar un único valor
                  mysqli_data_seek($result,14);

                  // Fetch row
                  $row=mysqli_fetch_row($result);

                  //printf ("Lastname: %s Age: %s\n", $row[0], $row[1]);


                 */
                 //-----------------------------------------separador
                // Free result set
                mysqli_free_result($result);



        } else {
          echo "0 results";


          

        }
        $conn->close();


  }



?>