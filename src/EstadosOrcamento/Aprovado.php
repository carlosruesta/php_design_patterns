<?php

namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;

class Aprovado extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.05;
    }

    public function aprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Aprovado();
    }

    public function reprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Reprovado();
    }

    public function finaliza(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Finalizado();
    }

}