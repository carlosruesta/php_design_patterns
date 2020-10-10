<?php

namespace Alura\DesignPattern\ImpostosDecorator;

use Alura\DesignPattern\Orcamento;

class IssDecorator extends ImpostoDecorator
{
    public function realizaCalculoEspecifico(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.06;
    }
}