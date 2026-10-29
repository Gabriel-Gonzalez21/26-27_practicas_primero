<?php

class InstrumentoViento extends InstrumentoBase{

    protected string $_material = "madera"; //Este atributo no es accesible directamente desde el exterior aunque si desde las clases derivadas.


    public function __construct(string $material = "madera", int $edad = 15){
        $this->_material = $material;
        parent::__construct("Intrumento de viento", $edad);
    }


    final public function afinar(): string{
        return "Instrumento de viento afinado";
    }

    public function sonido(): string{
        return "suuuuuuuuuuu";
    }

 
    public function __toString()
    {
        return parent::__toString(). "<br>Intruemnto de material ". $this->_material;
    }

}