<?php

/*
Añadir comentarios
*/
abstract Class InstrumentoBase{

    private string $_descripcion;
    protected int $_edad = 10;
    protected static int $_numElementosCreados = 0;
    public int $ordenCreacion = 0;


    //Constructor
    public function __construct(string $descripcion, int $edad = 10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        self::$_numElementosCreados++; //Contador de elementos creados
        $this->ordenCreacion = self::$_numElementosCreados; //Se le asigan el numero de creacion a esta variable

    }


    //metodos getter 
    public function getDescripcion(): string{
        return $this->_descripcion;
    }

    public function getEdad(): int{
        return $this->_edad;
    }


    //metodo setter
    public function setDescripcion(string $descripcion): void{
        if (!empty($descripcion)) {
            $this->_descripcion = $descripcion;
        }
    }

    //metodo abstracto sonido
    abstract public function sonido() : string ;

    //metodo abstracto afinar
    abstract public function afinar() : string ;


    /**
     * Aumenta la edad del instrumento en un año
     *
     * @return Returntype
     */
    public function envejecer(): void{
        $this->_edad ++;
    }

    public function __toString()
    {
        return "Intrumento con descripción ". $this->_descripcion. ", instancia ". $this->ordenCreacion. ",<br>".
                " de un total de ". self::$_numElementosCreados . ". Tiene ". $this->getEdad(). " años. <br>".
                " La clase es ". get_class($this);
    }

}