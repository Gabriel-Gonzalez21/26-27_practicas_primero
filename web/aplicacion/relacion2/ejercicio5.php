<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$cadena = <<<'fin'
<h1>Ejemplo de h1</h1> 
<p>Hola a todos</p> 1234456789 1 2 3
correo21@gmail.com otro correo 3 correo67@gmail.com
fin;

$expresionEtiquetas = "/<[^>]+>/"; //etiquetas HTML. Lo que hay entre corchetes busca todo lo que no sea >
$expresionNumeros = "/[0-9]+/";  //numeros de una o mas cifras
$expresionEmail = "/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]{2,}/"; //emails


$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($cadena, $expresionEtiquetas, $expresionNumeros, $expresionEmail);
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($cadena, $expresionEtiquetas, $expresionNumeros, $expresionEmail)
{
?>
    <h1>Ejercicio 5</h1>
<?php

    // Busqueda de etiquetas HTML
    echo "<h3>Etiquetas HTML:</h3><br>";
    $numCoincidencias = preg_match_all($expresionEtiquetas, $cadena, $arrayCoincidencias);

    if ($numCoincidencias > 0) {
        foreach ($arrayCoincidencias[0] as $etiqueta) {
            echo htmlspecialchars($etiqueta) . "<br>"; //htmlspecialchars permite mostrar las etiquetas
        }
    } else {
        echo "No hay etiquetas<br>";
    }

    // Busqueda de numeros
    echo "<h3>Números encontrados:</h3>";
    $numNumeros = preg_match_all($expresionNumeros, $cadena, $arrayCoincidencias, PREG_OFFSET_CAPTURE);
    if ($numNumeros > 0) {
        foreach ($arrayCoincidencias[0] as $coincidencia) {
            $valor = $coincidencia[0];
            $posicion = $coincidencia[1];
            echo "Número: $valor encontrado en la posicion $posicion<br>";
        }
    } else {
        echo "No hay números<br>";
    }

    //Busqueda de correos
    echo "<h3>Correos electrónicos encontrados:</h3>";
    $numEmails = preg_match_all($expresionEmail, $cadena, $arrayCoincidencia, PREG_OFFSET_CAPTURE);
    if ($numEmails > 0) {
        foreach ($arrayCoincidencia[0] as $coincidencia) {
            $valor = $coincidencia[0];
            $posicion = $coincidencia[1];
            echo "Email: $valor encontrado en la posicion $posicion<br>";
        }
    } else {
        echo "No hay correos<br>";
    }
}
