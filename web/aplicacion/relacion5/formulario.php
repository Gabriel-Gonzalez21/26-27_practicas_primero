<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(__DIR__ . "/../../scripts/librerias/validacion.php");
//controlador


$datos = [
    "nombre" => "",
    "contraseña" => "",
    "fechaNacimiento" => "",
    "diaCarnet" => "",
    "mesCarnet" => "",
    "anioCarnet" => "",
    "horaLevantarse" => "",
    "estado" => "",
    "hermanos" => "",
    "sueldo" => "",
    "estudios" => []
    
];

$errores = [];



if (isset($_POST["enviar"])) {

    //----------------NOMBRE------------------
    /*
    Nombre: cadena máximo 25 caracteres. No puede estar vacío ni empezar por H. Se debe
    pasar a mayúsculas.
    */
    $nombre = "";

    if (isset($_POST["nombre"])) {
        $nombre = trim($_POST["nombre"]);
    }
    // No vacío
    if ($nombre == "") {
        $errores["nombre"][] = "El nombre es obligatorio";
    }
    // Máximo 25 caracteres
    if (!validaCadena($nombre, 25, "")) {
        $errores["nombre"][] = "Máximo 25 caracteres";
    }
    // No puede empezar por H
    if (mb_strtoupper(mb_substr($nombre, 0, 1)) == "H") {
        $errores["nombre"][] = "No puede empezar por H";
    }
    // Pasar a mayúsculas
    $nombre = mb_strtoupper($nombre);

    $datos["nombre"] = $nombre;



    //----------------CONTRASEÑA------------------
    /*
    Contraseña: cadena máximo 15 caracteres. Con elemento de formulario password. Tiene
    que cumplir los requisitos: longitud mínima 8 caracteres, incluye al menos una
    Mayúscula, una minúscula, una cifra y un carácter especial ($_-;<>@).
    */
    $contraseña = "";
    $patronPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$_\-;<>@]).{8,15}$/';

    if (isset($_POST["contraseña"])) {
        $contraseña = trim($_POST["contraseña"]);
    }
    if ($contraseña == "") {
        $errores["contraseña"][] = "La contraseña es obligatoria";
    }
    if (!validaCadena($contraseña, 15, "")) {
        $errores["contraseña"][] = "Máximo 15 caracteres";
    }
    if (mb_strlen($contraseña) < 8) {
        $errores["contraseña"][] = "Debe tener al menos 8 caracteres";
    }
    if (!validaExpresion($contraseña, $patronPassword, "")) {
        $errores["contraseña"][] = "La contraseña no cumple los requisitos";
    }

    $datos["contraseña"] = $contraseña;



    //----------------FECHA NACIMIENTO------------------
    /*
    Fecha de nacimiento: Se debe recoger una única cadena y comprobar que es una fecha
    válida.
    */
    $fechaNacimiento = "";

    if (isset($_POST["fechaNacimiento"])) {
        $fechaNacimiento = trim($_POST["fechaNacimiento"]);
    }
    if ($fechaNacimiento == "") {
        $errores["fechaNacimiento"][] = "La fecha de nacimiento es obligatoria";
    }
    if (!validaFecha($fechaNacimiento, "")) {
        $errores["fechaNacimiento"][] = "Fecha incorrecta";
    }

    $datos["fechaNacimiento"] = $fechaNacimiento;


    //----------------FECHA CARNET------------------
    /*
    la fecha corresponde a una fecha en la que la persona es mayor de edad, es decir no es anterior a
    la fecha de nacimiento + 18 años
    */

    $diaCarnet = $_POST["diaCarnet"] ?? "";
    $mesCarnet = $_POST["mesCarnet"] ?? "";
    $anioCarnet = $_POST["anioCarnet"] ?? "";

    $fechaCarnet = $diaCarnet . "/" . $mesCarnet . "/" . $anioCarnet;

    if (!validaFecha($fechaCarnet, "")) {
        $errores["fechaCarnet"][] = "Fecha de carnet incorrecta";
    } else {
        $fechaNacimientoObj = DateTime::createFromFormat("d/m/Y", $fechaNacimiento);

        $fechaCarnetObj = DateTime::createFromFormat("d/m/Y", $fechaCarnet);

        $fechaMayorEdad = clone $fechaNacimientoObj;

        $fechaMayorEdad->add(new DateInterval("P18Y"));

        if ($fechaCarnetObj < $fechaMayorEdad) {
            $errores["fechaCarnet"][] = "No eres mayor de edad";
        }
    }


    //----------------HORA LEVANTARSE------------------
    $horaLevantarse = "";

    if (isset($_POST["horaLevantarse"])) {
        $horaLevantarse = trim($_POST["horaLevantarse"]);
    }
    if ($horaLevantarse == "") {
        $errores["horaLevantarse"][] = "Debe indicar una hora";
    }
    if (!validaHora($horaLevantarse, "")) {
        $errores["horaLevantarse"][] = "Hora de levantarse incorrecta";
    }

    $datos["horaLevantarse"] = $horaLevantarse;



    //----------------ESTADO------------------
    /*
    Debe indicarse obligatoriamente uno. Inicialmente no hay ninguno marcado. Hay que validar que se ha
    escogido uno correcto. A efectos de probarlo añadimos una opción que no es válida, por
    ejemplo, 5 - incorrecta.
    */
    $estado = "";

    if (isset($_POST["estado"])) {
        $estado = (int)$_POST["estado"];
    }

    $estados = [
        1 => "Estudiante",
        2 => "En paro",
        3 => "Trabajando",
        4 => "Jubilado"
    ];

    if ($estado == "") {
        $errores["estado"][] = "Debe seleccionar un estado";
    } else {
        if (!validaRango($estado, $estados,2)) {
            $errores["estado"][] = "Estado incorrecto";
        }
    }

    $datos["estado"] = $estado;


    //----------------ESTUDIOS------------------
    /*
    Debe seleccionarse al menos uno. Si ha marcado 0 - Sin estudios, no
    puede haber ningún otro seleccionado (desmarcamos el resto)
    */
    $listaEstudios = [
        0 => "Sin estudios",
        1 => "Primaria",
        2 => "Secundaria",
        3 => "Bachillerato",
        4 => "Ciclo formativo",
        5 => "Universitarios"
    ];

    $estudios = $_POST["estudios"] ?? [];

    if (count($estudios) == 0)
    {
        $errores["estudios"][] =
            "Debe seleccionar al menos un estudio";
    }

    foreach ($estudios as $estudio){
        if (!validaRango($estudio, $listaEstudios,2)){
            $errores["estudios"][] = "Estudios no válidos";
        }
    }

    if (in_array(0, $estudios) && count($estudios) > 1)
    {
        $errores["estudios"][] = "Si marcas la casilla Sin estudios no puede marcar otras opciones";
    }

    $datos["estudios"] = $estudios;



    //----------------HERMANOS------------------
    /*
    entero que debe estar entre 0 y 20. Por defecto, 0.
    */
    $hermanos = "";
    if (isset($_POST["hermanos"])) {
        $hermanos = (int)$_POST["hermanos"];
    }
    if(!validaEntero($hermanos, 0, 20, 0)){
        $errores["hermanos"][] = "Número de hermanos no válido";
    }

    $datos["hermanos"] = $hermanos;


    //----------------SUELDO------------------
    /*
    real que debe estar entre 1000 y 150000 €. Valor por defecto 1100€
    */
    $sueldo = "";
    if (isset($_POST["sueldo"])) {
        $sueldo = floatval($_POST["sueldo"]);
    }
    if(!validaReal($sueldo, 1000, 150000, 1100)){
        $errores["sueldo"][] = "Sueldo no válido";
    }

    $datos["sueldo"] = $sueldo;


}





$barraUbi = [
    [
        "TEXTO" => "Inicio",
        "LINK" => "/index.php"
    ],
    [
        "TEXTO" => "Relacion 5",
        "LINK" => "/aplicacion/relacion5/index.php"
    ],
    [
        "TEXTO" => "Formulario",
        "LINK" => ""
    ]

];





//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barraUbi);
cuerpo($datos, $errores); //llamo a la vista
finCuerpo();
// **********************************************************
//vista
function cabecera() {}
//vista
function cuerpo(array $datos, array $errores)
{
?>
    <br><br>

    <h2>RELACIÓN 5: Introducción de información</h2>

    <?php

    if ($errores) {

        echo "<div style='color:red'>";

        foreach ($errores as $campo => $listaErrores) {

            foreach ($listaErrores as $error) {
                echo $campo . " => " . $error . "<br>";
            }
        }

        echo "</div><br>";
    }
    ?>

    <form action="" method="post">

        <label for="nombre"> Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= $datos["nombre"] ?>">
        <br><br>

        <label for="contraseña"> Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" value="<?= $datos["contraseña"] ?>">
        <br><br>

        <label for="fechaNacimiento"> Fecha nacimiento:</label>
        <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?= $datos["fechaNacimiento"] ?>">
        <br><br>

        <label>Día carnet:</label>
        <input type="text" name="diaCarnet" size="3" value="<?= $datos["diaCarnet"] ?>">
        <label>Mes carnet:</label>
        <input type="text" name="mesCarnet" size="3" value="<?= $datos["mesCarnet"] ?>">
        <label>Año carnet:</label>
        <input type="text" name="anioCarnet" size="5" value="<?= $datos["anioCarnet"] ?>">
        <br><br>

        <label for="">Hora levantarse:</label>
        <input type="text" name="horaLevantarse" id="horaLevantarse" value="<?= $datos["horaLevantarse"] ?>">
        <br><br>

        <h3>Estado</h3>
        <input type="radio" name="estado" id="estado1" value="1" <?= ($datos["estado"] == 1) ? "checked" : "" ?>>
        <label for="estado1">Estudiante</label>
        
        <input type="radio" name="estado" id="estado2" value="2" <?= ($datos["estado"] == 2) ? "checked" : "" ?>>
        <label for="estado2">En paro</label>

        <input type="radio" name="estado" id="estado3" value="3" <?= ($datos["estado"] == 3) ? "checked" : "" ?>>
        <label for="estado3">Trabajando</label>

        <input type="radio" name="estado" id="estado4" value="4" <?= ($datos["estado"] == 4) ? "checked" : "" ?>>
        <label for="estado4">Jubilado</label>

        <input type="radio" name="estado" id="estado5" value="5" <?= ($datos["estado"] == 5) ? "checked" : "" ?>>
        <label for="estado5">Incorrecta</label>
        <br><br>




        <h3>Estudios</h3>

        <input type="checkbox" name="estudios[]" id="estudio0" value="0" <?= in_array(0, $datos["estudios"]) ? "checked" : "" ?>>
        <label for="estudio0">Sin estudios</label>
        <br>

        <input type="checkbox" name="estudios[]" id="estudio1" value="1" <?= in_array(1, $datos["estudios"]) ? "checked" : "" ?>>
        <label for="estudio1">Primaria</label>
        <br>

        <input type="checkbox" name="estudios[]" id="estudio2" value="2" <?= in_array(2, $datos["estudios"]) ? "checked" : "" ?>>
        <label for="estudio2">Secundaria</label>
        <br>

        <input type="checkbox" name="estudios[]" id="estudio3" value="3" <?= in_array(3, $datos["estudios"]) ? "checked" : "" ?>>
        <label for="estudio3">Bachillerato</label>
        <br>

        <input type="checkbox" name="estudios[]" id="estudio4" value="4" <?= in_array(4, $datos["estudios"]) ? "checked" : "" ?>>
        <label for="estudio4">Ciclo formativo</label>
        <br>

        <input type="checkbox" name="estudios[]" id="estudio5" value="5" <?= in_array(5, $datos["estudios"]) ? "checked" : "" ?>>
        <label for="estudio5">Universitarios</label>
        <br>

        <input type="checkbox" name="estudios[]" id="estudio6" value="6" <?= in_array(6, $datos["estudios"]) ? "checked" : "" ?>>
        <label for="estudio6">Incorrecta</label>
        <br>

        <br><br>


        <label for="">Numero de hermanos</label>
        <input type="number" name="hermanos" id="hermanos" value="<?= $datos["hermanos"] ?>">
        <br><br>


        <label for="">Sueldo</label>
        <input type="text" name="sueldo" id="sueldo" value="<?= $datos["sueldo"] ?>">
        <br><br>


        <br><br>



        <input type="submit" name="enviar" value="Enviar">


    </form>

<?php
}
