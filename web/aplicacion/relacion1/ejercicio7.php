<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

// CONTROLADOR

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
        "TEXTO"=>"Ejercicio 7",
        "LINK" =>""
    ]
];

// Dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();

inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo();
finCuerpo();


// **********************************************************
// VISTA
// **********************************************************

function cabecera()
{

}

function cuerpo()
{
?>
    <br><br>

    <h2>Ejercicio 7</h2>

    <?php

    echo "<h3>USANDO FUNCIONES DE FECHA</h3>";

    // Fecha actual
    echo "<h4>Fecha actual</h4>";

    echo "Formato d/m/Y: " . date("d/m/Y") . "<br>";

    echo "Formato largo: " . date("d") . ", "
        . date("F") . ", "
        . date("Y") . ", "
        . date("l") . "<br>";

    echo "Hora actual: " . date("H:i:s") . "<br><br>";


    // Fecha 29/03/2024 a las 12:45
    $fechaFija = strtotime("2024-03-29 12:45:00");

    echo "<h4>Fecha 29/03/2024 12:45</h4>";

    echo "Formato d/m/Y: " . date("d/m/Y", $fechaFija) . "<br>";

    echo "Formato largo: "
        . date("d", $fechaFija) . ", "
        . date("F", $fechaFija) . ", "
        . date("Y", $fechaFija) . ", "
        . date("l", $fechaFija) . "<br>";

    echo "Hora: " . date("H:i:s", $fechaFija) . "<br><br>";


    // Fecha actual menos 12 días y 4 horas
    $fechaModificada = strtotime("-12 days -4 hours");

    echo "<h4>Fecha actual menos 12 días y 4 horas</h4>";

    echo "Formato d/m/Y: "
        . date("d/m/Y", $fechaModificada) . "<br>";

    echo "Formato largo: "
        . date("d", $fechaModificada) . ", "
        . date("F", $fechaModificada) . ", "
        . date("Y", $fechaModificada) . ", "
        . date("l", $fechaModificada) . "<br>";

    echo "Hora: "
        . date("H:i:s", $fechaModificada) . "<br><br>";



    echo "<h3>USANDO DATETIME</h3>";

    // Fecha actual
    $fechaActual = new DateTime();

    echo "<h4>Fecha actual</h4>";

    echo "Formato d/m/Y: "
        . $fechaActual->format("d/m/Y") . "<br>";

    echo "Formato largo: "
        . $fechaActual->format("d")
        . ", "
        . $fechaActual->format("F")
        . ", "
        . $fechaActual->format("Y")
        . ", "
        . $fechaActual->format("l")
        . "<br>";

    echo "Hora actual: "
        . $fechaActual->format("H:i:s")
        . "<br><br>";


    // Fecha fija
    $fechaDT = new DateTime("2024-03-29 12:45:00");

    echo "<h4>Fecha 29/03/2024 12:45</h4>";

    echo "Formato d/m/Y: "
        . $fechaDT->format("d/m/Y") . "<br>";

    echo "Formato largo: "
        . $fechaDT->format("d")
        . ", "
        . $fechaDT->format("F")
        . ", "
        . $fechaDT->format("Y")
        . ", "
        . $fechaDT->format("l")
        . "<br>";

    echo "Hora: "
        . $fechaDT->format("H:i:s")
        . "<br><br>";


    // Actual menos 12 días y 4 horas
    $fechaMenos = new DateTime();

    $fechaMenos->modify("-12 days");
    $fechaMenos->modify("-4 hours");

    echo "<h4>Fecha actual menos 12 días y 4 horas</h4>";

    echo "Formato d/m/Y: "
        . $fechaMenos->format("d/m/Y") . "<br>";

    echo "Formato largo: "
        . $fechaMenos->format("d")
        . ", "
        . $fechaMenos->format("F")
        . ", "
        . $fechaMenos->format("Y")
        . ", "
        . $fechaMenos->format("l")
        . "<br>";

    echo "Hora: "
        . $fechaMenos->format("H:i:s")
        . "<br>";

    ?>
<?php
}