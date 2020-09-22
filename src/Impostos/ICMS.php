<?php

namespace Alura\DesignPattern\Impostos;

use Alura\DesignPattern\Orcamento;

class ICMS implements Imposto
{
    public function calculaImpostos(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.1;
    }
}