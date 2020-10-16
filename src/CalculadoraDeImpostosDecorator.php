<?php

namespace Alura\DesignPattern;

use Alura\DesignPattern\ImpostosDecorator\ImpostoDecorator;

class CalculadoraDeImpostosDecorator
{
    public function calcula(Orcamento $orcamento, ImpostoDecorator $imposto): float
    {
        return $imposto->calculaImposto($orcamento);
    }
}