<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../scripts/librerias/val_normal.php");
//controlador

$valor = 50;

$cadena = "Destornillador";

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 5",
        "LINK" =>""
    ]
];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($valor, $cadena); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {
       
}
//vista
function cuerpo($valor, $cadena)
{
?>
    <br><br>

   <h2>RELACIÓN 5: Introducción de información</h2>

   <?php 

    
    echo "<h3>Test validaEntero de val_normal</h3>";
    if(VALNORMAL\validaEntero($valor,0,100,5)){
        echo "Correcto";
    }
    else{
        echo "Incorrecto";
    }

    echo "<br>";
    echo $valor;



    echo "<h3>Test validacadena de val_normal</h3>";
    if(VALNORMAL\validaCadena($cadena,10, "cadena por defecto")){
        echo "cadena menor que la longitud ";
    }
    else{
        echo "cadena mayor que la longitud";
    }

    echo "<br>";
    echo $cadena;


    echo "<h3>Test validaFecha</h3>";
    

    $fechas = [
        "15/03/2024",
        "31/02/2024",
        "29/02/2024",
        "29/02/2023",
        "1/1/2024",
        "32/01/2024",
        "15/13/2024",
        "15/03/24",
        "hola",
        ""
    ];

    foreach($fechas as $fecha){

        $aux = $fecha;

        $resultado = VALNORMAL\validaFecha($aux,"01/01/2000");

        echo "Fecha original: " . $fecha . "<br>";

        echo "Resultado: ";

        if($resultado){
            echo "CORRECTA";
        }else{
            echo "INCORRECTA";
        }

        echo "<br>";

        echo "Valor final: " . $aux . "<br>";

        echo "<hr>";
    }


    echo "<h3>Test validaEmail</h3>";
    $emails = [
        "gabriel@gmail.com",
        "juan.perez@hotmail.es",
        "usuario123@empresa.org",
        "gabrielgmail.com",
        "gabriel@",
        "@gmail.com",
        "gabriel@gmail",
        "",
        "   gabriel@gmail.com   "
    ];

    foreach ($emails as $email) {

        $aux = $email;

        $resultado = VALNORMAL\validaEmail($aux,"EMAIL_INCORRECTO");

        echo "Email original: " . $email . "<br>";

        echo "Resultado: ";

        if ($resultado) {
            echo "CORRECTO";
        } else {
            echo "INCORRECTO";
        }

        echo "<br>";

        echo "Valor final: " . $aux . "<br>";

        echo "<hr>";
    }

    ?>

<?php
}
