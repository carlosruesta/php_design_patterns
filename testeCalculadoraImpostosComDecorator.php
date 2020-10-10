<?php

use Alura\DesignPattern\CalculadoraDeImpostosDecorator;
use Alura\DesignPattern\ImpostosDecorator\IssDecorator;
use Alura\DesignPattern\ImpostosDecorator\IcmsDecorator;
use Alura\DesignPattern\Orcamento;

require 'vendor\autoload.php';

$orcamento = new Orcamento();
$orcamento->valor = 100;

$calculadora = new CalculadoraDeImpostosDecorator();
echo PHP_EOL;
echo $calculadora->calcula($orcamento, new IcmsDecorator(new IssDecorator(null)));
echo PHP_EOL;