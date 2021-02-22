<?php
    $nombre = $_GET['nombre'];
    $arreglo = array("Marco","Jose","Maria","Mario","Ana");
    for($i=0; $i < count($arreglo); $i++){
        if($nombre == $arreglo[$i])
        $resultado = "<p>El nombre: $nombre ha sido encontrado en el servidor<p>";
    }
    if ($resultado==""){
        echo "El nombre solicitado no se encuentra en el servidor";
    } else {
        echo "Te saluda el servidor " . $nombre;
    }

    
?>