<?php

namespace Alura\DesignPattern;

use Alura\DesignPattern\Impostos\Imposto;

/**
 * A classe CalculadoraDeImpostos representa uma funcionalidade em nosso sistema, logo,
 * pode ser chamada de classe de serviço.
 */

/**
 * Solução: Aplicar o design patter Strategy
 * O que ele visa é separar em classes as regras de negocio.
 * Cada classe deve ser válida e responder a um formato unico.
 * As classes devem atender um contrato (interface)
 * Cada classe deverá implementar aquele calculo que estava dentro da classe de servico
 * A classe de servico somente chamara as implementacoes da classe e nao precisará crescer
 */
class CalculadoraDeImpostos
{
    public function calcula(Orcamento $orcamento, Imposto $imposto): float
    {
        return $imposto->calculaImpostos($orcamento);
    }
}