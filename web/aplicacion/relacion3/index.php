<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once ("./libreria.php");
//controlador

$vector=array();//el vector vacio
$numero=0;
cuentaVeces($vector,"osición",7,$numero); //$vector (“1osición”=>7). En numero se de vuelve 1 porque es la primera llamada…
cuentaVeces($vector,"otra",2,$numero);//$vector(“otra”=>9).En numero se devuelve 2 porque es la segunda llamada…




$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 3",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($vector, $numero); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($vector, $numero)
{
?>
    <br><br>

   <h2>RELACIÓN 3: FUNCIONES</h2>
   
   <h3>Ejercicio 1</h3>

   <?php 

   if(cuentaVeces($vector,"osición",7,$numero) === false){
        echo "Error en la llamada";
    }   

    echo $numero;

    ?>

<?php
}
