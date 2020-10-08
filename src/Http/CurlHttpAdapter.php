<?php

namespace Alura\DesignPattern;

class CurlHttpAdapter implements HttpAdapter
{
    public function post($url, array $dados = []): void
    {
        echo "Envio post via Curl Http";
    }
}