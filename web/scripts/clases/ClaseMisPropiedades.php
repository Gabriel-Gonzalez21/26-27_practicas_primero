<?php

class ClaseMisPropiedades implements Iterator{

    private array $_propiedades = [];

    public mixed $propPublica;

    private mixed $_propPrivada = 25;

    private array $_datosIterator = [];

    /**
     * Permite crear propiedades dinámicas
     */
    public function __set(string $nombre, mixed $valor): void
    {
        if ($nombre === "_propPrivada") {
            throw new Exception("No se puede crear una propiedad dinámica llamada _propPrivada");
        }

        $this->_propiedades[$nombre] = $valor;
    }

    /**
     * Devuelve una propiedad dinámica.
     */
    public function __get(string $nombre): mixed{
        if (array_key_exists($nombre, $this->_propiedades) == false) {
            throw new Exception("La propiedad $nombre no existe");
        }

        return $this->_propiedades[$nombre];
    }

    public function __isset(string $nombre): bool{
        return isset($this->_propiedades[$nombre]);
    }

    public function __unset(string $nombre): void{
        unset($this->_propiedades[$nombre] );
    }




    
    //---------------------------Métodos de Iterator-----------------------------------------

    public function rewind(): void
    {
        $this->_datosIterator = [];

        // Propiedades dinámicas
        foreach ( $this->_propiedades as $clave => $valor) {
            $this->_datosIterator["oi_" . $clave] = $valor;
        }

        // Las dos propiedades normales van al final
        $this->_datosIterator["oi_propPublica"] = $this->propPublica;

        $this->_datosIterator["oi__propPrivada"] = $this->_propPrivada;

        reset($this->_datosIterator);
    }

    public function current(): mixed{
        return current($this->_datosIterator);
    }

    public function key(): mixed{
        return key($this->_datosIterator);
    }

    public function next(): void{
        next($this->_datosIterator);
    }

    public function valid(): bool
    {
        return key($this->_datosIterator) !== null;
    }
}