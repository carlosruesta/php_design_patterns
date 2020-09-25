<?php

namespace Alura\DesignPattern\AcoesNoGeraPedido;

use Alura\DesignPattern\Pedido;

interface AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): void;
}