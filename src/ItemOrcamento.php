<?php


namespace Alura\DesignPattern;


class ItemOrcamento implements Orcavel
{
    public float $valor;

    public function __construct(float  $valor)
    {
        $this->valor = $valor;
    }

    public function valor(): float
    {
        return $this->valor;
    }
}