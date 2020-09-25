<?php

use Alura\DesignPattern\AcoesNoGeraPedido\EnviaEmail;
use Alura\DesignPattern\AcoesNoGeraPedido\EnviaEmailComSplObserver;
use Alura\DesignPattern\AcoesNoGeraPedido\RegistraEmBanco;
use Alura\DesignPattern\AcoesNoGeraPedido\RegistraEmBancoComSplObserver;
use Alura\DesignPattern\AcoesNoGeraPedido\RegistraEmLog;
use Alura\DesignPattern\AcoesNoGeraPedido\RegistraEmLogComSplObserver;
use Alura\DesignPattern\GeraPedido;
use Alura\DesignPattern\GeraPedidoHandler;
use Alura\DesignPattern\GeraPedidoHandlerComSplObserver;

include 'vendor\autoload.php';

$valorOrcamento = $argv[1];
$numeroDeItens = $argv[2];
$nomeCliente = $argv[3];

$geraPedido = new GeraPedido($valorOrcamento, $numeroDeItens, $nomeCliente);

$geraPedidoHandler = new GeraPedidoHandler();
$geraPedidoHandler->adicionaAcaoAposGerarPedido(new RegistraEmBanco());
$geraPedidoHandler->adicionaAcaoAposGerarPedido(new EnviaEmail());
$geraPedidoHandler->adicionaAcaoAposGerarPedido(new RegistraEmLog());
$geraPedidoHandler->executa($geraPedido);


$geraPedido = new GeraPedido($valorOrcamento, $numeroDeItens, $nomeCliente);

$geraPedidoHandler = new GeraPedidoHandlerComSplObserver();
$geraPedidoHandler->attach(new RegistraEmBancoComSplObserver());
$geraPedidoHandler->attach(new EnviaEmailComSplObserver());
$geraPedidoHandler->attach(new RegistraEmLogComSplObserver());
$geraPedidoHandler->executa($geraPedido);


