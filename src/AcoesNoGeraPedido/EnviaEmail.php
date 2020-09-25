<?php

namespace Alura\DesignPattern\AcoesNoGeraPedido;

use Alura\DesignPattern\Pedido;

class EnviaEmail implements AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): void
    {
        echo "Envia e-mail do pedido gerado" . PHP_EOL;
    }
}