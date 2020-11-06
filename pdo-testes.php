<?php

use Alura\DesignPattern\PdoConnection;

require 'vendor/autoload.php';

$pdo1 = PdoConnection::getInstance('sqlite::memory:');

$pdo2 = PdoConnection::getInstance('sqlite::memory:');

var_dump($pdo1, $pdo2);
