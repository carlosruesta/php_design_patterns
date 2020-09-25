<?php


namespace Alura\DesignPattern;


class GeraPedidoHandler
{
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

        $pedido = new Pedido();
        $pedido->nomeCliente = $geraPedido->getNomeCliente();
        $pedido->dataFinalizacao = new \DateTimeImmutable();
        $pedido->orcamento = $orcamento;

        // Repositorio
        echo "Cria pedido no banco de dados" . PHP_EOL;

        // ServiceMail
        echo "Envia e-mail para cliente" . PHP_EOL;

        // LogService
        echo "Registra em log a operacao" . PHP_EOL;
    }
}