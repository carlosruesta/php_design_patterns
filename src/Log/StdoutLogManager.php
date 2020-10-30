<?php

namespace Alura\DesignPattern\Log;

class StdoutLogManager extends LogManager
{
    public function criaLogWritter(): LogWritter
    {
        return new StdoutLogWritter();
    }
}