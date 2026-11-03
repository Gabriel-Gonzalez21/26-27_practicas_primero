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
    $resultado = false;

    if (mb_strlen($var) <= $longitud){
        $resultado = true;
    }else{
        $var = $defecto;
        $resultado = false;
    }

    return $resultado;
}



/*
function validaFecha(string &$var, string $defecto):bool{
    $patron = '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/';

    if (preg_match($patron, $var) == true){

    }
}*/