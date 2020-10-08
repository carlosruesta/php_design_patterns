<?php

namespace Alura\DesignPattern;

interface HttpAdapter
{
    public function post($url, array $dados = []): void;
}