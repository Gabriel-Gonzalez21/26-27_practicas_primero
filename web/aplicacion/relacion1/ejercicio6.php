<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);

$claves = array_keys($vector);
$valor = array_values($vector);

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>"/aplicacion/relacion1/index.php"
    ],
    [
        "TEXTO"=>"Ejercicio 6",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($vector, $claves, $valor); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($vector, $claves, $valor)
{
?>
    <br><br>

   <h2>Ejercicio 6</h2>

   <?php 
   
    echo "<h3>Recorrido simulando un foreach</h3>";
    
    while(key($vector)!= NULL){
        echo "- Clave: ". key($vector) . ", Valor: ".  current($vector)."<br />";
        next($vector);
    }

    echo "<h3>Recorrido con array_keys y array_values</h3>";

    for ($i = 0; $i < count($claves) ; $i++){
        echo "clave: ". $claves[$i] .", valor:" . $valor[$i]."<br>";  
    }

   
   ?>
   
<?php
}
