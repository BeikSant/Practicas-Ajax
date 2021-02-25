
<?php
    $con = @mysqli_connect("localhost","root","beiksant","pruebaajax");
    if(!$con){
    echo "<p> Error al conectar la base de datos" . mysql_connect_error() . "</p>"; 
    exit;
    }
    $sentencia = "select * from clientes where Id=$_GET[id]";
    if(!$resultado = mysqli_query($con, $sentencia)){
    echo "<p>Error al ejecutar la consulta</p>";
    }

    while ($fila = mysqli_fetch_assoc($resultado)){
    echo "{$fila['Descripcion']}";
    }
    mysqli_free_result($resultado);
    mysqli_close($con);
?>
