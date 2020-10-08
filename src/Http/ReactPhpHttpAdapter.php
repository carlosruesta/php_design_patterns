<?php


namespace Alura\DesignPattern;


class ReactPhpHttpAdapter implements HttpAdapter
{

    public function post($url, array $dados = []): void
    {
        echo "Realizamos chamada via React PHP";
    }
}