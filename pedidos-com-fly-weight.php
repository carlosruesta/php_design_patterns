<?php

use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido\CriadorDePedido;
use Alura\DesignPattern\Pedido\TemplatePedido;
use Alura\DesignPattern\Pedido\Pedido;

require_once 'vendor/autoload.php';

$pedidos = [];

$dadosPedido = new TemplatePedido(md5((string) rand(1, 100000)), new \DateTimeImmutable());

$criadorDePedido = new CriadorDePedido();
for ($i = 0; $i < 10000; $i++) {
    /** @var Pedido $pedido */
    $pedido = $criadorDePedido->criaPedido('Carlos Ruesta', date('Y-m-d'),  new Orcamento());
    $pedidos[] = $pedido;
}

echo memory_get_peak_usage();