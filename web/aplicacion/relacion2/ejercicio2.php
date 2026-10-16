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
     echo "<h2>Mostrar la cadena</h2>";
    for ($x = 0; $x < strlen($cadena); $x++){
       // echo $cadena[$x] ."<br>";
        echo str_repeat("&nbsp;", $x). $cadena[$x]. "<br>";   
    }

    echo "<h2>Mostrar la cadena en orden inverso y otros factores</h2>";
    // recorremos desde el final hacia el principio usando índices negativos
    for ($i = 1; $i <= mb_strlen($cadena); $i++) {
        $caracter = mb_substr($cadena, -$i, 1); //Si $i es negativo cuenta desde el final de la cadena

        if ($i % 2 == 0) {
            $caracter = mb_strtoupper($caracter);
        }

        echo str_repeat("&nbsp", $i) . $caracter . "<br>";
    }

    //TERMINAR
    ?>
<?php
}
