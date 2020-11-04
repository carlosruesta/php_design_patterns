<?php

use Alura\DesignPattern\Venda\VendaProdutoFactory;

require 'vendor/autoload.php';

$vendaProdutoFactory = new VendaProdutoFactory(1000);
$venda = $vendaProdutoFactory->criarVenda();
$imposto = $vendaProdutoFactory->imposto();

var_dump($venda, $imposto);