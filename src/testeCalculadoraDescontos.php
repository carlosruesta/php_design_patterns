<?php

use Alura\DesignPattern\CalculadoraDeDesconto;
use Alura\DesignPattern\CalculadoraDeDescontoSemPadrao;
use Alura\DesignPattern\Orcamento;

require 'vendor\autoload.php';

$calculadora = new CalculadoraDeDescontoSemPadrao();

$orcamento = new Orcamento();
$orcamento->valor = 100;
$orcamento->quantidadeItens = 4;

echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
$orcamento->quantidadeItens = 6;
$orcamento->valor = 600;
echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
$orcamento->quantidadeItens = 4;
$orcamento->valor = 600;
echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
$orcamento->quantidadeItens = 4;
$orcamento->valor = 400;
echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
// echo $calculadora->calcula($orcamento, 'IMPOSTO');
echo PHP_EOL;
echo PHP_EOL;
echo 'Testes com padrao Chain of Responsability';
$calculadora = new CalculadoraDeDesconto();
echo PHP_EOL;
$orcamento = new Orcamento();
$orcamento->valor = 100;
$orcamento->quantidadeItens = 4;
echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
$orcamento->quantidadeItens = 6;
$orcamento->valor = 600;
echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
$orcamento->quantidadeItens = 4;
$orcamento->valor = 600;
echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
$orcamento->quantidadeItens = 4;
$orcamento->valor = 400;
echo $calculadora->calculaDescontos($orcamento);
echo PHP_EOL;
// echo $calculadora->calcula($orcamento, 'IMPOSTO');
echo PHP_EOL;
echo PHP_EOL;