<?php

namespace Alura\DesignPattern;

use Alura\DesignPattern\Pedido\PedidoComSplSubject;

class GeraPedidoHandlerComSplObserver implements \SplSubject
{
    /** @var \SplObserver[] */
    private array $acoesAposGerarPedido;

    private PedidoComSplSubject $pedidoGerado;

    public function __construct(
        // Repositorio,
        // ServiceMail,
        // LogService
    )
    {
    }

    public function executa(GeraPedido $geraPedido): void
    {
        $orcamento = new Orcamento();
        $orcamento->quantidadeItens = $geraPedido->getNumeroDeItens();
        $orcamento->valor = $geraPedido->getValorOrcamento();

        $pedido = new PedidoComSplSubject();
        $pedido->nomeCliente = $geraPedido->getNomeCliente();
        $pedido->dataFinalizacao = new \DateTimeImmutable();
        $pedido->orcamento = $orcamento;

        $this->pedidoGerado = $pedido;
        $this->notify();
    }

    public function attach(\SplObserver $acao)
    {
        $this->acoesAposGerarPedido[] = $acao;
    }

    public function detach(\SplObserver $observer)
    {
        // TODO: Implement detach() method.
    }

    public function notify()
    {
        foreach ($this->acoesAposGerarPedido as $acao) {
            $acao->update($this->pedidoGerado);
        }
    }
}