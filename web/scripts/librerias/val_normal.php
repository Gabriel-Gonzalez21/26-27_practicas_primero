<?php
namespace VALNORMAL;

//
/**
 * Esta función comprueba que $var contiene un entero cuyo valor está entre $min y $max.
 *
 * @param integer $var Valor a comprobar
 * @param integer $min Minimo
 * @param integer $max Maximo
 * @param integer $defecto Valor a asignar $var en caso de que falle la validacion
 * @return boolean Dvuelve true y es correcto, false en caso contrario
 */
function validaEntero(int &$var, int $min, int $max, int $defecto):bool {

    $resultado = false;

    if ($var >= $min && $var <= $max){
        $resultado = true;
    }else{
        $var = $defecto;
        $resultado = false;
    }

    return $resultado;

}

/**
 * //Esta función comprueba que $var contiene un real cuyo valor está entre $min y $max.
 *
 * @param float $var
 * @param float $min
 * @param float $max
 * @param float $defecto
 * @return boolean La función devuelve true si es correcto y false en caso contrario
 */
function validaReal(float &$var, float $min, float $max, float $defecto):bool{
    $resultado = false;

    if ($var >= $min && $var <= $max){
        $resultado = true;
    }else{
        $var = $defecto;
        $resultado = false;
    }

    return $resultado;

}


/**
 * Función que comprueba que $var contiene una cadena de longitud máxima $longitud
 *
 * @param string $var
 * @param integer $longitud
 * @param string $defecto
 * @return boolean La función devuelve true si es correcto y false en caso contrario
 */
function validaCadena(string &$var, int $longitud, string $defecto):bool{

    if (mb_strlen($var) <= $longitud){
        return true;
    }
    
    $var = $defecto;
    return false;
}



/**
 * Funcion que comprueba que $var contiene una fecha correcta en el formato dd/mm/aaaa.
 *
 * @param string $var
 * @param string $defecto
 * @return boolean La función devuelve true si es correcto y false en caso contrario
 */
function validaFecha(string &$var, string $defecto):bool{

    $patron = '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/';

    if(preg_match($patron, $var)){
        $arrayFecha = mb_split("/", $var);

        $dia = $arrayFecha[0];
        $mes = $arrayFecha[1];
        $anio = $arrayFecha[2];

        if (checkdate($mes, $dia, $anio)){
            $var = date('d/m/y', mktime(0,0,0, $mes, $dia, $anio));  
            return true;
        }
        
    }

    $var = $defecto;
    return false;
}


/*
function validaHora(string &$var, string $defecto):bool Esta función comprueba que $var
contiene una hora correcta en el formato hh:mm:ss . En $var se devuelve la hora saneada (2
cifras para hora, min, segundos - Ej 0:5:1, hora valida aunque se sanea y se convierte a
00:05:01). En caso de no cumplir las condiciones devuelve $defecto en $var. La función
devuelve true si es correcta y false en caso contrario
*/
/**
 * Esta función comprueba que $var contiene una hora correcta en el formato hh:mm:ss
 *
 * @param string $var
 * @param string $defecto
 * @return boolean
 */
function validaHora(string &$var, string $defecto):bool {

    $patron = '/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/';

    if(preg_match($patron, $var)){
        return true;
    }

    $var = $defecto;
    return false;
}




/**
 * Esta función comprueba que $var contiene un email correcto en el formato aaaaa@bbbb.ccc
 *
 * @param string $var  En $var se devuelve el email
 * @param string $defecto En caso de no cumplir las condiciones devuelve $defecto
 * @return boolean La función devuelve true si es correcto y false en caso contrario
 */
function validaEmail(string &$var, string $defecto):bool {

    $patron = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    if (preg_match($patron, $var)){
        return true;
    }

    $var = $defecto;
    return false;
    
}



/**
 * Esta función comprueba que $var cumple con la expresión regular $expresion
 *
 * @param string $var En caso de no cumplir las condiciones se asigna a $var el valor por $defecto
 * @param string $expresion
 * @param string $defecto
 * @return boolean devuelve true si es correcto yfalse en caso contrario
 */
function validaExpresion(string &$var, string $expresion,string $defecto): bool {

    if (preg_match($expresion, $var)) {
        return true;
    }

    $var = $defecto;

    return false;
}
