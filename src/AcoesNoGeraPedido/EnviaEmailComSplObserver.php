<?php

namespace Alura\DesignPattern\AcoesNoGeraPedido;

class EnviaEmailComSplObserver implements \SplObserver
{
    public function update(\SplSubject $pedido)
    {
        echo "Envia e-mail do pedido gerado" . PHP_EOL;
    }
}