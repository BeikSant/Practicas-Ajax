<?php
            $con = @mysqli_connect("localhost","root","beiksant","pruebaajax");
            if(!$con){
                echo "<p>Error al conectar con la BD" . mysql_connect_error() . "</p>";
                exit;
            }
            $sentencia = "select * from clientes";
            if (!$resultado = mysqli_query($con,$sentencia)){
                echo "<p>Error al ejecutar la sentencia </p>";
            }
            while($fila = mysqli_fetch_assoc($resultado)){
                echo "<option value='{$fila['Id']}'>{$fila['Nombre']}</option> ";
            }

            mysqli_free_resultado($resultado);
            mysqli_close($con);
            
 ?>
