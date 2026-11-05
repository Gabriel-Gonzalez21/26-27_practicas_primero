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

    if ($var > $min && $var < $max){
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
 * @return boolean
 */
function validaReal(float &$var, float $min, float $max, float $defecto):bool{
    $resultado = false;

    if ($var > $min && $var < $max){
        $resultado = true;
    }else{
        $var = $defecto;
        $resultado = false;
    }

    return $resultado;

}



function validaCadena(string &$var, int $longitud, string $defecto):bool{

    if (mb_strlen($var) <= $longitud){
        return true;
    }
    
    $var = $defecto;
    return false;
}




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


/**
 * function validaEmail(string &$var, string $defecto):bool Esta función comprueba que $var
* contiene un email correcto en el formato aaaaa@bbbb.ccc. En $var se devuelve el email
 *saneado (en caso de no cumplir las condiciones devuelve $defecto). La función devuelve
* true si es correcto y false en caso contrario.
 */

function validaEmail(string &$var, string $defecto):bool {

    $patron = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    if (preg_match($patron, $var)){
        return true;
    }

    $var = $defecto;
    return false;
    
}


/*
function validaExpresion(string &$var, string $expresion, string $defecto):bool Esta función
comprueba que $var cumple con la expresión regular $expresion. En caso de no cumplir las
condiciones se asigna a $var el valor por $defecto. La función devuelve true si es correcto y
false en caso contrario. 
*/
function validaExpresion(string &$var, string $expresion,string $defecto): bool {

    if (preg_match($expresion, $var)) {
        return true;
    }

    $var = $defecto;

    return false;
}
