<?php

namespace Alura\DesignPattern\AcoesNoGeraPedido;

use Alura\DesignPattern\Pedido;

class RegistraEmLog implements AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): void
    {
        echo "Registra log do pedido gerado" . PHP_EOL;
    }
}