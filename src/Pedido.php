<?php

namespace Alura\DesignPattern;

class Pedido
{
    public string $nomeCliente;
    public \DateTimeImmutable $dataFinalizacao;
    public Orcamento $orcamento;

}