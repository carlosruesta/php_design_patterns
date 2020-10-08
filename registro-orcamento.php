<?php

use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\ReactPhpHttpAdapter;
use Alura\DesignPattern\RegistroOrcamento;

require 'vendor\autoload.php';

$registroOrcamento = new RegistroOrcamento(new ReactPhpHttpAdapter());

$registroOrcamento->registrar(new Orcamento());



