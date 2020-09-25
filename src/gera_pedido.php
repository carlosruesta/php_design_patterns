<?php

use Alura\DesignPattern\GeraPedido;
use Alura\DesignPattern\GeraPedidoHandler;

include 'vendor\autoload.php';

$valorOrcamento = $argv[1];
$numeroDeItens = $argv[2];
$nomeCliente = $argv[3];

$geraPedido = new GeraPedido($valorOrcamento, $numeroDeItens, $nomeCliente);

$geraPedidoHandler = new GeraPedidoHandler();

$geraPedidoHandler->executa($geraPedido);


