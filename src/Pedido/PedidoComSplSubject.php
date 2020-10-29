<?php

namespace Alura\DesignPattern\Pedido;

use Alura\DesignPattern\Orcamento;
use SplObserver;

class PedidoComSplSubject implements \SplSubject
{
    public string $nomeCliente;
    public \DateTimeImmutable $dataFinalizacao;
    public Orcamento $orcamento;

    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
    }

    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
    }

    public function notify()
    {
        // TODO: Implement notify() method.
    }
}