<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

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
        "TEXTO"=>"Ejercicio 2",
        "LINK" =>""
    ]
];

//variables con el mínimo el y máximo de numeros que salen en un dado
$min = 1;
$max = 6;

$numLanzamiento = 0;

$tiradas = [];


for ($i = 1; $i <= 6; $i++){
    $tiradas[$i] = mt_rand($min, $max);
}

//******************************MIL TIRADAS************************************** */

$tiradas2 = [];
const milTiradas = 1000;
$numLanzamiento2 = 0;

$contador = [
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0
];

//rellenar el array tiradas2 con las 1000 tiradas
while($numLanzamiento2 < milTiradas){
   $tiradas2[$numLanzamiento2] = mt_rand($min, $max);
   $numLanzamiento2++;
}

//recorrer el array y contar las veces que sale el numero
/*
for($i = 1; $i < count($tiradas2); $i++){
   for ($x = 1; $x <= 6; $x++){
        if ($tiradas2[$i] === $x){
            $contador[$x]++;
        } 
   }
}
*/

for($i = 0; $i < count($tiradas2); $i++){
    $contador[$tiradas2[$i]]++;
}

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($tiradas, $numLanzamiento, milTiradas, $contador); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($tiradas, $numLanzamiento, $milTiradas, $contador)
{
?>
    <br><br>

   <h2>Ejercicio 2</h2>

   <h2>LANZAMIENTO DE UN DADO</h2>
   <br>

   <?php
   
   foreach ($tiradas as $tirada){
        $numLanzamiento++;
        echo "Lanzamiento ".$numLanzamiento." del dado: ". $tirada."<br>";
   }
   
   ?>

   <br>
   <br>
   <br>

   <?php 
   echo "lanzado el dado ". $milTiradas. " veces <br>";
   foreach ($contador as $cara => $veces){
        echo "El ".$cara." ha salido  ". $veces." veces con un porcentaje de ". (($veces*100)/$milTiradas). "%<br>";
   }
   
   ?>

<?php
}
