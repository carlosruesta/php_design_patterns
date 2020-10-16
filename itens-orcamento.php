<?php

require 'vendor\autoload.php';

use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\Orcamento;

$orcamentoAntigo = new Orcamento();
$item1 = new ItemOrcamento(200);
$item2 = new ItemOrcamento(600);
$orcamentoAntigo->addItem($item1);
$orcamentoAntigo->addItem($item2);

echo $orcamentoAntigo->valor();

echo PHP_EOL;

$orcamentoNovo = new Orcamento();
$item3 = new ItemOrcamento(300);
$orcamentoNovo->addItem($item3);
$orcamentoNovo->addItem($orcamentoAntigo);
echo $orcamentoNovo->valor();

echo PHP_EOL;

$orcamentoNovo->addItem($orcamentoAntigo);
echo $orcamentoNovo->valor();
