<?php


namespace Alura\DesignPattern\NotaFiscal;


class ConstrutorNotaFiscalServico extends ConstrutorNotaFiscal
{

    function constroi(): NotaFiscal
    {
        $this->notaFiscal->valorImpostos = $this->notaFiscal->valor() * 0.06;
        return $this->notaFiscal;
    }
}