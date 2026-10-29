<?php

/*
Esta clase se le pone final porque no se puede heredar ninguna otra subclase de esta
 */
final class Flauta extends InstrumentoViento implements IFabricable{



    //Contructor privado
    private function __construct(string $material = "madera", int $edad = 15)
    {
        parent::__construct($material, $edad);
    }



    public static function CrearDesdeArray(array $datos): Flauta {

        //valores por defecto
        $material = "madera";
        $edad = 15;

        if(isset($datos["material"]))
        {
            $material = $datos["material"]; //posicion asociativa material
        }

        if(isset($datos["edad"]))
        {
            $edad = $datos["edad"]; //posicion asociativa edad
        }

        return new Flauta(
            $material,
            $edad
        );
    }


    public function metodoFabricacion(): string{
        return "El metodo de fabriacíon de uan flauta es fabricandolo";
    }


    public function metodoReciclado(): string{
        return "Una flauta se compone de materiales que se pueden reciclar";
    }

    public function __clone()
    {
        $this->_edad = 0;

        self::$_numElementosCreados++;

        $this->ordenCreacion = self::$_numElementosCreados;
    }



}