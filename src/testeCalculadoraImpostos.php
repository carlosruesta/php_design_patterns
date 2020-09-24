<?php

use Alura\DesignPattern\CalculadoraDeImpostos;
use Alura\DesignPattern\CalculadoraDeImpostosSemPadrao;
use Alura\DesignPattern\Impostos\ICMS;
use Alura\DesignPattern\Impostos\ISS;
use Alura\DesignPattern\Orcamento;

require 'vendor\autoload.php';

$calculadora = new CalculadoraDeImpostosSemPadrao();

$orcamento = new Orcamento();
$orcamento->valor = 100;

echo $calculadora->calcula($orcamento, 'ICMS');
echo PHP_EOL;
echo $calculadora->calcula($orcamento, 'ISS');
echo PHP_EOL;
// echo $calculadora->calcula($orcamento, 'IMPOSTO');
echo PHP_EOL;
echo PHP_EOL;
echo 'Testes com padrao strategy';

$calculadora = new CalculadoraDeImpostos();
echo PHP_EOL;
echo $calculadora->calcula($orcamento, new ICMS());
echo PHP_EOL;
echo $calculadora->calcula($orcamento, new ISS());
echo PHP_EOL;