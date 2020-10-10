<?php

namespace Alura\DesignPattern\ImpostosDecorator;

use Alura\DesignPattern\Orcamento;

abstract class ImpostoCom2AliquotasDecorator extends ImpostoDecorator
{

    public function realizaCalculoEspecifico (Orcamento $orcamento): float
    {
        if ($this->deveAplicarAliquotaMaxima($orcamento)) {
            return $this->calculaImpostoComAliquotaMaxima($orcamento);
        }
        return $this->calculaImpostoComAliquotaMinima($orcamento);
    }

    abstract protected function deveAplicarAliquotaMaxima(Orcamento $orcamento): bool;

    abstract protected function calculaImpostoComAliquotaMaxima(Orcamento $orcamento): float;

    abstract protected function calculaImpostoComAliquotaMinima(Orcamento $orcamento): float;
}