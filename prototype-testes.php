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

// caso 1 - criar o método que clonará o objeto dentro da classe do objeto. Isso será uma implementaação do prototype

$notaFiscal2 = $notaFiscal->clonar();
var_dump($notaFiscal, $notaFiscal2);

    // neste caso as propriedades de tipo objeto são copiados extamentos os mesmos (pela referencia)

// caso 2 - utilizar o metodo clone do PHP que já faz a mesma coisa que o caso 1, só que o método clone executa automáticamente ao método mágico __clone da classe
//          dessa forma é possível mudar todas as propriedades que sejam necessárias

$notaFiscal3 = clone $notaFiscal;
var_dump($notaFiscal, $notaFiscal3);