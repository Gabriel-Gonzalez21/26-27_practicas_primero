<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once ("./libreria.php");
//controlador

//Ejercicio 1
$vector=array();//el vector vacío
$numero=0;
cuentaVeces($vector,"osición",7,$numero); //$vector (“1osición”=>7). En numero se de vuelve 1 porque es la primera llamada…
cuentaVeces($vector,"otra",2,$numero);//$vector(“otra”=>9).En numero se devuelve 2 porque es la segunda llamada…

//Ejercicio 2
$cadenaGenerada1 = generarCadena();
$cadenaGenerada2 = generarCadena(-1); //Un valor menor o igual a 0 debe dar false


//Ejercicio 3



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
cuerpo($vector, $numero, $cadenaGenerada1, $cadenaGenerada2); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($vector, $numero, $cadenaGenerada1, $cadenaGenerada2)
{
?>
    <br><br>

   <h2>RELACIÓN 3: FUNCIONES</h2>
   
   <h2>Ejercicio 1</h2>

   <?php 

    echo "<h3>Ejemplo 1:</h3>";

   if(cuentaVeces($vector,"osición", 7 ,$numero) === false){
        echo "Error en la llamada <br>";
    }else{
        echo "Numero llamada actual: ".$numero. "<br>";
    }   
    

    echo "<h3>Ejemplo 2:</h3>";
    //Aqui mostrar el error dar error
    if(cuentaVeces($vector,"2daw", 7 ,$numero) === false){
        echo "Error en la llamada <br>";
    }else{
        echo "Numero llamada actual: ".$numero. "<br>";
    }  


    echo "<hr>";
    echo "<h2>Ejercicio 2</h2>";
    echo "Cadena generada: ". $cadenaGenerada1 ."<br>";
    echo "Cadena con numero menor o igual 0: " . ($cadenaGenerada2 === false ? "false" : $cadenaGenerada2);
 


    echo "<hr>";
    echo "<h2>Ejercicio 3</h2>";
    echo "Resultado suma de todos los operadores: ". operaciones(1,2,2,2)."<br>";
    echo "Resultado resta al primer operando: ". operaciones(2, 2, 2);
    echo "Resultado multiplicacion al primer operando: ". operaciones(2, 2, 2);


    ?>

<?php
}
