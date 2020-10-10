<?php

namespace Alura\DesignPattern\ImpostosDecorator;

use Alura\DesignPattern\Orcamento;

abstract class ImpostoDecorator
{
    protected ?ImpostoDecorator $outroImposto;

    public function __construct(ImpostoDecorator $outroImposto = null)
    {
        $this->outroImposto = $outroImposto;
    }

    /** Essa funcao deverá ser implementada por cada imposto */
    abstract protected function realizaCalculoEspecifico(Orcamento $orcamento): float;

    public function calculaImposto(Orcamento $orcamento)
    {
        return $this->realizaCalculoEspecifico($orcamento) + $this->realizaCalculoOutroImposto($orcamento);
    }

    private function realizaCalculoOutroImposto(Orcamento $orcamento)
    {
        return is_null($this->outroImposto) ? 0 : $this->outroImposto->calculaImposto($orcamento);
    }
}