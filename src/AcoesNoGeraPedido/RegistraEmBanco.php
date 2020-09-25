<?php

namespace Alura\DesignPattern\AcoesNoGeraPedido;

use Alura\DesignPattern\Pedido;

class RegistraEmBanco implements AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): void
    {
        echo "Salva em banco de dados o pedido gerado" . PHP_EOL;
    }
}