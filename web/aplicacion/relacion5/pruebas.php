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
        "LINK" =>"/aplicacion/relacion5/index.php"
    ],
    [
        "TEXTO"=>"Pruebas",
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
        "29/02/2023",
        "1/1/2024",
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


    echo "<h3>Test validaEmail</h3>";
    $horas = [
        "00:00:00",
        "13:45:32",
        "23:59:59",
        "24:00:00",
        "10:60:00",
        "10:30:60",
        "0:5:1",
        "hola",
        ""
    ];

    foreach($horas as $hora){

        $aux = $hora;

        $resultado = VALNORMAL\validaHora(
            $aux,
            "00:00:00"
        );

        echo "Hora original: " . $hora . "<br>";

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


    echo "<h3>Test validaRango</h3>";
    $colores = [
        "rojo",
        "verde",
        "azul"
    ];

    echo "<h3>Prueba tipo 1 (valores)</h3>";

    if (VALNORMAL\validaRango("verde", $colores)) {
        echo "verde es válido<br>";
    } else {
        echo "verde NO es válido<br>";
    }

    if (VALNORMAL\validaRango("amarillo", $colores)) {
        echo "amarillo es válido<br>";
    } else {
        echo "amarillo NO es válido<br>";
    }
    $persona = [
    "nombre" => "Gabriel",
    "edad" => 20,
    "ciudad" => "Antequera"
];

    echo "<h3>Prueba tipo 2 (claves)</h3>";

    if (VALNORMAL\validaRango("nombre", $persona, 2)) {
        echo "nombre es una clave válida<br>";
    } else {
        echo "nombre NO es una clave válida<br>";
    }

    if (VALNORMAL\validaRango("direccion", $persona, 2)) {
        echo "direccion es una clave válida<br>";
    } else {
        echo "direccion NO es una clave válida<br>";
    }

    ?>

<?php
}
