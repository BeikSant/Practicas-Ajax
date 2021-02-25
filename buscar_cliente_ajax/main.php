<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
        <div class="card text-center">
            <div class="card-header">
                <h2>Mis Clientes</h2>
                <p><Strong>UNIVERSIDAD NACIONAL DE LOJA</Strong></p>
                <p><Strong>Estudiante:</Strong> Beiker Santorum</p>
                <p><Strong>Carrera:</Strong> Computacion</p>
                <p><Strong>Materia:</Strong> Desarrollo Basado en Plataformas</p>
                <p><Strong>Curso:</Strong> 5º A</p>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
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
            </div>
        </div>
        
    </body>
</html>