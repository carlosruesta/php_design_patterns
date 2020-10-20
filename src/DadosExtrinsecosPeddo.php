<?php

namespace Alura\DesignPattern;

class DadosExtrinsecosPeddo
{
    private string $nomeCliente;
    private \DateTimeImmutable $dataFinalizacao;

    public function __construct(string $nomeCliente, \DateTimeImmutable $dataFinalizacao)
    {
        $this->nomeCliente = $nomeCliente;
        $this->dataFinalizacao = $dataFinalizacao;
    }

    public function nomeCliente(): string
    {
        return $this->nomeCliente;
    }

    public function dataFinalizacao(): \DateTimeImmutable
    {
        return $this->dataFinalizacao;
    }


}