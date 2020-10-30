<?php

use Alura\DesignPattern\Log\FileLogManager;
use Alura\DesignPattern\Log\StdoutLogManager;

require 'vendor/autoload.php';

$stdoutLogManager = new StdoutLogManager();
$stdoutLogManager->log('info', 'Testando log Manager na tela');


$fileLogManager = new FileLogManager(__DIR__ . '/resultadosLog.log');
$fileLogManager->log('info', 'Testando log Manager em arquivo');