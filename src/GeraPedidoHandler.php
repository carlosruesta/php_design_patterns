<?php


namespace Alura\DesignPattern;


use Alura\DesignPattern\AcoesNoGeraPedido\AcaoAposGerarPedido;
use Alura\DesignPattern\AcoesNoGeraPedido\EnviaEmail;
use Alura\DesignPattern\AcoesNoGeraPedido\RegistraEmBanco;
use Alura\DesignPattern\AcoesNoGeraPedido\RegistraEmLog;

class GeraPedidoHandler
{
    /** @var AcaoAposGerarPedido[] */
    private array $acoesAposGerarPedido;

    public function __construct(
        // Repositorio,
        // ServiceMail,
        // LogService
    )
    {
    }

    public function adicionaAcaoAposGerarPedido(AcaoAposGerarPedido $acao)
    {
        $this->acoesAposGerarPedido[] = $acao;
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

//        // Repositorio
//        $registraEmBanco = new RegistraEmBanco(
//            // Repository
//        );
//        $registraEmBanco->executaAcao($pedido);
//
//        // ServiceMail
//        $enviaEmail = new EnviaEmail(
//            // ServiceMail
//        );
//        $enviaEmail->executaAcao($pedido);
//
//        // LogService
//        $registraEmLog = new RegistraEmLog(
//            //LogService
//        );
//        $registraEmLog->executaAcao($pedido);

        foreach ($this->acoesAposGerarPedido as $acao) {
            $acao->executaAcao($pedido);
        }
    }
}