<?php

use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Pedido;

require_once 'vendor/autoload.php';

$pedidos = [];

for ($i = 0; $i < 10000; $i++) {
    $pedido = new Pedido();
    $pedido->nomeCliente = md5((string) rand(1, 100000));
    $pedido->orcamento = new Orcamento();
    $pedido->dataFinalizacao = new \DateTimeImmutable();

    $pedidos[] = $pedido;
}

echo memory_get_peak_usage();