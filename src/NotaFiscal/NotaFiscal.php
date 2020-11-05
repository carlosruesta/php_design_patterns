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

    public function clonar(): NotaFiscal
    {
        $clone = new NotaFiscal();
        $clone->cnpjEmpresa = $this->cnpjEmpresa;
        $clone->razaoSocialEmpresa = $this->razaoSocialEmpresa;
        $clone->itens = $this->itens;   // neste caso também levará os mesmos objetos dos itens, somente copiará as referencias... tomar cuidado ao salvar no banco de dados uma coisa como essa
        $clone->observacoes = $this->observacoes;
        $clone->dataEmissao = $this->dataEmissao;       // neste caso é o mesmo objeto anterior, somente esta copiando a referencia
        $clone->valorImpostos = $this->valorImpostos;

        return $clone;
    }

    public function __clone()
    {
        $this->dataEmissao = new \DateTimeImmutable();
    }
}