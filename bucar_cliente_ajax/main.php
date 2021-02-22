<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Ajax y Php</title>
        <script>
            function mostrarDescripcion(value){
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function(){
                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                        document.getElementById("txtAjax").inneHTML = xmlHttp.responseText; 
                    }
                }
                    xmlHttp.open("GET","backend.php?id="+value,true);
                    xmlHttp.send();
            }
        </script> 
    </head>
    <body>

        <h2>Mis Clientes</h2>
        <select name="clientes">
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
        </select>
        
        <div id=txtAjax>
            La informacion del cliente se mostrará aquí
        </div>
        

    </body>
</html>