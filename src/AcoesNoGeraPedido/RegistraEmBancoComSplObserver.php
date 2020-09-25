<?php

namespace Alura\DesignPattern\AcoesNoGeraPedido;

use Alura\DesignPattern\Pedido;

class RegistraEmBancoComSplObserver implements \SplObserver
{
    public function update(\SplSubject $pedido): void
    {
        echo "Salva em banco de dados o pedido gerado" . PHP_EOL;
    }
}