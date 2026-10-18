<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$cadena = "Está la niña en casa";

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 2",
        "LINK" =>"/aplicacion/relacion2/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 2",
        "LINK" =>""
    ]
];


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($cadena); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($cadena)
{
?>
    <br><br>

   <h2>Ejercicio 2</h2>

   <?php 
    echo "<h2>Usando []</h2>";
    for ($x = 0; $x < strlen($cadena); $x++){
       // echo $cadena[$x] ."<br>";
        echo str_repeat("&nbsp;", $x). $cadena[$x]. "<br>";   
    }

    echo "<h2>Usando substr</h2>";
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo str_repeat("&nbsp;", $i) . substr($cadena, $i, 1) . "<br>";
    }

    echo "<h2>Usando mb_substr</h2>";
    for ($i = 0; $i < strlen($cadena); $i++) {
        echo str_repeat("&nbsp;", $i) . mb_substr($cadena, $i, 1) . "<br>";
    }


    echo "<h2>Mostrar la cadena en orden inverso</h2>";
    // recorremos desde el final hacia el principio usando índices negativos
    for ($i = 1; $i <= mb_strlen($cadena); $i++) {
        $caracter = mb_substr($cadena, -$i, 1); //Si $i es negativo cuenta desde el final de la cadena

        if ($i % 2 == 0) {
            $caracter = mb_strtoupper($caracter);
        }

        echo str_repeat("&nbsp", $i) . $caracter . "<br>";
    }

    echo "<h2>Cadena separada en partes usando el carácter a, y cada parte en una línea distinta</h2>";

    for ($x = 0; $x < strlen($cadena); $x++){
        if ($cadena[$x] == "a"){
            echo "<br>";
        }else{
            echo $cadena[$x];
        }
    }


    echo "<h2>Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el espacio en blanco) por mujer </h2>";

    $posicion = strpos($cadena, "niña"); //Posicion e empieza la palabra niña

    // Posición del espacio después de "niña"
    $posicionEspacio = $posicion + strlen("niña");

    $cadena = substr_replace($cadena, "/mujer ", $posicionEspacio, 1);
    
    echo $cadena;


    ?>
<?php
}
