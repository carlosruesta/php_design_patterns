<?php

namespace Alura\DesignPattern\ImpostosDecorator;

use Alura\DesignPattern\Orcamento;

class IcmsDecorator extends ImpostoDecorator
{
    protected function realizaCalculoEspecifico(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.1;
    }
}