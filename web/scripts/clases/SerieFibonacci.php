<?php

class SerieFibonacci implements Iterator
{
    private int $_limite;

    private int $_claveActual = 0;

    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    /**
     * calcula el número de Fibonacci en la posición indicada
     */
    private function fibonacci(int $n): int
    {
        if ($n == 0) {
            return 0;
        }

        if ($n == 1) {
            return 1;
        }

        $a = 0;
        $b = 1;

        for ($i = 2; $i <= $n; $i++) {

            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }

        return $b;
    }

    /**
     * Función estática utilizando generador
     */
    public static function fFibonacci(int $ultimo): Generator
    {
        $a = 0;
        $b = 1;

        for ($i = 0; $i < $ultimo; $i++) {

            yield $a;

            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
    }


    //---------------------------Métodos de Iterator-----------------------------------------

    public function current(): int
    {
        return $this->fibonacci($this->_claveActual);
    }

    public function key(): int
    {
        return $this->_claveActual;
    }

    public function next(): void
    {
        $this->_claveActual++;
    }

    public function rewind(): void
    {
        $this->_claveActual = 0;
    }

    public function valid(): bool
    {
        return $this->_claveActual < $this->_limite;
    }
}