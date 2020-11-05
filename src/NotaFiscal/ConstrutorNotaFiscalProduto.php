<?php


namespace Alura\DesignPattern\NotaFiscal;


class ConstrutorNotaFiscalProduto extends ConstrutorNotaFiscal
{

    function constroi(): NotaFiscal
    {
        $this->notaFiscal->valorImpostos = $this->notaFiscal->valor() * 0.03;
        return $this->notaFiscal;
    }
}