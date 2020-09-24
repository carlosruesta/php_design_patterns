<?php


namespace Alura\DesignPattern\Impostos;


use Alura\DesignPattern\Orcamento;

class Icpp extends ImpostoCom2Aliquotas
{

    protected function deveAplicarAliquotaMaxima(Orcamento $orcamento): bool
    {
        return $orcamento->valor > 500;
    }

    protected function calculaImpostoComAliquotaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.03;
    }

    protected function calculaImpostoComAliquotaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.02;
    }
}