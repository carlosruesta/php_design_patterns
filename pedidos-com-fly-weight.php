<?php

use Alura\DesignPattern\DadosExtrinsecosPeddo;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido;

require_once 'vendor/autoload.php';

$pedidos = [];

$dadosPedido = new DadosExtrinsecosPeddo(md5((string) rand(1, 100000)), new \DateTimeImmutable());

for ($i = 0; $i < 10000; $i++) {
    $pedido = new Pedido();
    $pedido->dados = $dadosPedido;
    $pedido->orcamento = new Orcamento();
    $pedidos[] = $pedido;
}

echo memory_get_peak_usage();