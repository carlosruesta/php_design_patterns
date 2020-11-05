<?php

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscalProduto;
use Alura\DesignPattern\NotaFiscal\ConstrutorNotaFiscalServico;

require 'vendor/autoload.php';

$construtorNotaFiscal = new ConstrutorNotaFiscalProduto();

$notaFiscal = $construtorNotaFiscal
    ->paraEmpresa('1234567891011', 'Venda de produtos EIRL')
    ->comItem(new ItemOrcamento(100))
    ->comItem(new ItemOrcamento(200))
    ->comItem(new ItemOrcamento(300))
    ->comObservacoes('Pedidos futuros')
    ->constroi();

echo "valor {$notaFiscal->valor()} - impostos {$notaFiscal->valorImpostos} \n";

$construtorNotaFiscalServico = new ConstrutorNotaFiscalServico();

$notaFiscalServicos = $construtorNotaFiscalServico
    ->paraEmpresa('1234567891011', 'Venda de servicos EIRL')
    ->comItem(new ItemOrcamento(100))
    ->comItem(new ItemOrcamento(200))
    ->comItem(new ItemOrcamento(300))
    ->comObservacoes('Pedidos futuros de servicos')
    ->constroi();

echo "valor {$notaFiscalServicos->valor()} - impostos {$notaFiscalServicos->valorImpostos} \n";