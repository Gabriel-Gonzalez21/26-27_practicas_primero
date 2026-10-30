<?php

enum EstadoCivil: int{

    case Soltero = 10;
    case Casado = 20;
    case Pareja = 30;
    case Viudo = 40;


    /**
     * Método descripcion que devuelve el nombre del caso concreto
     *
     * @return string
     */
    public function descripcion() : string {
        return $this->name;       
    }

    /**
     * Método valor que devuelve el valor del caso concreto.

     *
     * @return integer
     */    
    public function valor() : int  {
        return $this->value;    
    }


    /**
     * Método estático casos que devuelve un array con todos los casos
     *
     * @return array
     */
    public static function casos() : array{
        $arrayCasos = [ 
            self::Soltero,
            self::Casado,
            self::Pareja,
            self::Viudo
        ];

        return $arrayCasos;
    }



}