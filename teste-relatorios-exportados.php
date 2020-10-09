<?php

use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido;
use Alura\DesignPattern\Relatorio\ArquivoXmlExportado;
use Alura\DesignPattern\Relatorio\ArquivoZipExportado;
use Alura\DesignPattern\Relatorio\OrcamentoExportado;
use Alura\DesignPattern\Relatorio\OrcamentoZip;
use Alura\DesignPattern\Relatorio\PedidoExportado;

require 'vendor/autoload.php';

/** Fazendo teste no modelo ruim */
$orcamentoZip = new OrcamentoZip();
$orcamento = new Orcamento();
$orcamento->valor = 200;
$orcamento->quantidadeItens = 3;

$orcamentoZip->exportar($orcamento);

$orcamento2 = new Orcamento();
$orcamento2->valor = 500;
$orcamento2->quantidadeItens = 7;

$orcamentoExportado = new OrcamentoExportado($orcamento);
$orcamentoExportadoXml = new ArquivoXmlExportado('orcamento');
$orcamentoExportadoZip = new ArquivoZipExportado("orcamento");

echo $orcamentoExportadoXml->salvar($orcamentoExportado) . PHP_EOL . PHP_EOL;
echo $orcamentoExportadoZip->salvar($orcamentoExportado) . PHP_EOL . PHP_EOL;

$pedido = new Pedido();
$pedido->nomeCliente = 'Jose Victor';
$pedido->dataFinalizacao = new \DateTimeImmutable();

$pedidoExportado = new PedidoExportado($pedido);
$pedidoExportadoXml = new ArquivoXmlExportado('pedido');
$pedidoExportadoZip = new ArquivoZipExportado("pedido");

echo $pedidoExportadoXml->salvar($pedidoExportado) . PHP_EOL . PHP_EOL;
echo $pedidoExportadoZip->salvar($pedidoExportado) . PHP_EOL . PHP_EOL;