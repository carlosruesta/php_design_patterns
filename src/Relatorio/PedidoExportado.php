<?php

namespace Alura\DesignPattern\Relatorio;

use Alura\DesignPattern\Pedido;

class PedidoExportado implements ConteudoExportado
{

    private $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function conteudo(): array
    {
        return [
            'data_fianlizacao' => $this->pedido->dataFinalizacao->format('d/m/Y'),
            'nome_cliente' => $this->pedido->nomeCliente
        ];
    }
}