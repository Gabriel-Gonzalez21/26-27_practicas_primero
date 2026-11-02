<?php

class InstrumentoViento extends InstrumentoBase{

    protected string $_material = "madera"; //Este atributo no es accesible directamente desde el exterior aunque si desde las clases derivadas.


     /**
     * Constructor de la clase InstrumentoViento que inicializa
     * las propiedades específicas de un intrumento de viento e invoca al constructor padre.
     */
    public function __construct(string $material = "madera", int $edad = 15){
        $this->_material = $material;
        parent::__construct("Intrumento de viento", $edad);
    }


    /**
     * Metodo que afina el instrumento
     *
     * @return string
     */
    final public function afinar(): string{
        return "Instrumento de viento afinado";
    }

    /**
     * Metodo que devuelve el sonido de un intrumento de viento
     *
     * @return string
     */
    public function sonido(): string{
        return "suuuuuuuuuuu";
    }

 
    public function __toString()
    {
        return parent::__toString(). "<br>Intruemnto de material ". $this->_material;
    }

}