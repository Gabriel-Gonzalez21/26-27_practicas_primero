<?php 


/**
 * función que se le pasa un parámetro con valor por defecto 10 y se
* encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
* aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha
* indicado un número negativo o igual a 0.
 *
 * @param array $array
 * @param string $cadena
 * @param integer $num1
 * @param integer $num2
 * @return boolean
 */
function cuentaVeces(array &$array, string $cadena, int $num1, int &$num2): bool{
    
    $num2++;
    if ($cadena != "2daw" && $cadena != "primera"){
        $array[$cadena] = $num1;
        return true;
    }else{
        return false;
    }
}



/**
 * función que se le pasa un parámetro con valor por defecto 10 y se
 * encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma
 * aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha
 * indicado un número negativo o igual a 0.
 * 
 *
 * @param integer $valor
 * @return string
 */
function generarCadena(int $valor = 10): string|false{

    if ($valor <= 0){
        return false;
    }else{
        $caracteres = "qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM1234567890";

        $array = [];

        for ($x = 0; $x < $valor; $x++){
            $array[$x] = $caracteres[rand(0 ,strlen($caracteres) -1)];
        }

        // Convertir el array en una cadena
        //$cadena = implode("", $array);

        $cadena = "";
        foreach ($array as $elem){
            $cadena .= $elem;
        }

        return $cadena;
    }

    
}


/**
 * Esta función recibe al menos tres parámetros. El primero (entero) es el
 * tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser
 * 1, suma todos los operandos
 * 2, al primer operando se restan el resto
 * 3, multiplicación de todos los operandos.
 * En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan
 * los de las posiciones impares (el primer operando es 1)
 *
 * @param integer $tipoOperacion
 * @param float ...$operador
 * @return float
 */
function operaciones(int $tipoOperacion, float ...$operador): float{

    $resultado = 0;

    switch ($tipoOperacion){
        case 1: 
            foreach ($operador as $elem){ //Suma todos los elmentos de ...$operador
                $resultado += $elem;
            }
            break;
        case 2:
            //Primer operador
            $primerOperador = $operador[0];
            $resultado = $primerOperador;
            //resta a al primer operador el resto de operadores
            for ($x = 1; $x < count($operador); $x++){//El bucle empieza en uno para que no se reste a si mismo el primer operador
                $resultado -= $operador[$x];
            }
            break;
        
        case 3:
            //Primer operador
            $primerOperador = $operador[0];
            $resultado = $primerOperador;
            for ($x = 1; $x < count($operador); $x++){//El bucle empieza en uno para que no se reste a si mismo el primer operador
                $resultado *= $operador[$x];
            }
            break;
        default: 
            $pares = [];
            $impares = [];
            for ($x = 0; $x < count($operador); $x++){
                if ($x % 2 === 0){
                    array_push($pares, $operador[$x]);
                }else{
                    array_push($impares, $operador[$x]);
                }
            }
            
            $sumaPares = array_sum($pares);
            $sumaImpares = array_sum($impares);

            $resultado = $sumaPares - $sumaImpares;
            
    }

    return $resultado;

}


/**
 * Esta función recibe como parámetros tres números (enteros) y devuelve la
 * suma de los tres valores en el primer parámetro y como resultado de la función el producto de los
 * tres valores.
 *
 * @param integer $num1
 * @param integer $num2
 * @param integer $num3
 */
function devuelve(int &$num1, int $num2 = 5, int $num3 = 10): float{
            
    $multiplicacion =  $num1 * $num2 * $num3;

    $suma = $num1 + $num2 + $num3;
    $num1 = $suma;

    return $multiplicacion;

}




function suma(int $num1, int $num2):int{
    return $num1 + $num2;
}
function resta(int $num1, int $num2):int{
    return $num1 - $num2;
}
function multiplicacion(int $num1, int $num2):int{
    return $num1 * $num2;
}

/**
 * Funcion que recibe tres parámetros. El primero es una cadena
 * que puede ser suma, resta o multiplicacion. Los otros dos son los operandos. Esta función se
 * encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando una variable-
 * función para llamar a la operación. Hay que comprobar indicando una operación correcta
 *
 * @param string $operacion
 * @param integer $operando1
 * @param integer $operando2
 * @return integer|false
 */
function hacerOperacion(string $operacion, int $operando1, int $operando2) : int|false {
    
    if ($operacion != "suma" && $operacion != "resta" && $operacion != "multiplicacion"){
        return false;
    }

    $funcion = $operacion;

    return $funcion($operando1, $operando2);
    
}



/**
 * Funcion que recibe tres operandos (entero, entero y callable) y que
 * devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros.
 *
 * @param integer $num1
 * @param integer $num2
 * @param callable $callback
 * @return integer
 */
function llamadaAFuncion(int $num1, int $num2, callable $callback) :int {
    return $callback($num1 , $num2);
}



/**
 * función que se le pasa un array y lo ordena mediante una llamada a usort,
 * al que se indicará como función callback una función anónima que ordenará en orden descendente
 * según el número de caracteres de cada elemento.
 *
 * @param array $miArray
 * @return void
 */
function ordenar(array &$miArray){
    usort($miArray, function ($a, $b) {
        return strlen($b) - strlen($a);
    });
}