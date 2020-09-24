<?php


namespace Alura\DesignPattern\Impostos;


use Alura\DesignPattern\Orcamento;

class Ikcv extends ImpostoCom2Aliquotas
{

    protected function deveAplicarAliquotaMaxima(Orcamento $orcamento): bool
    {
        return $orcamento->valor > 300 && $orcamento->quantidadeItens > 3;
    }

    protected function calculaImpostoComAliquotaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.04;
    }

    protected function calculaImpostoComAliquotaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.025;
    }
}