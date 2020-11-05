<?php

namespace Alura\DesignPattern\NotaFiscal;

use Alura\DesignPattern\ItemOrcamento;

class NotaFiscal
{
    public string $cnpjEmpresa;
    public string $razaoSocialEmpresa;
    public array $itens;
    public string $observacoes;
    public \DateTimeInterface $dataEmissao;
    public float $valorImpostos;

    public function valor(): float
    {
        return array_reduce(
            $this->itens,
            function ($valorAcumulado, ItemOrcamento $itemOrcamento) {
                return $valorAcumulado + $itemOrcamento->valor;
            },
            0
        );
    }

}