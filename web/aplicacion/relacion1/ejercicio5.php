<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;




$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($vector); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($vector)
{
?>
    <br><br>

   <h2>Ejercicio 5</h2>

   <?php 
        //Mostrar el array
        echo "<h2>Contenido de vector:</h2>";
        foreach ($vector as $indice => $valor) {

            echo " - Posicion: ".$indice." contenido: ".$valor. " tipo (".gettype($valor).")<br>";

            $tipo = gettype($valor);
            
            switch($tipo){
                case "array":
                    echo "     Contenido del array: ". "<br>";
                    foreach($valor as $elem ){
                        echo $elem. ", <br>";
                    }
                    break;
                
                case "integer":
                    echo "Entero con valor ". $valor.", en binario ". decbin($valor). "<br>";
                    break;
                
                case "double": 
                    echo "Real ".$valor." que al cuadrado es ". pow($valor, 2). "<br>";
                    break;

                case "string": 
                    echo "Cadena ".$valor. "<br>";
                    break;

                case "boolean": 
                    echo "Booleano ".$valor. "y su opuesto es";
                    if ($valor===false){
                        echo " true";
                    }else{
                        echo " false";
                    }
                    break;
    
            }

            
            
}
    ?>
   





<?php
}
