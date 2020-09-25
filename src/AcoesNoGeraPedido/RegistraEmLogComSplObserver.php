<?php

namespace Alura\DesignPattern\AcoesNoGeraPedido;

use Alura\DesignPattern\Pedido;

class RegistraEmLogComSplObserver implements \SplObserver
{
    public function update(\SplSubject $pedido): void
    {
        echo "Registra log do pedido gerado" . PHP_EOL;
    }
}