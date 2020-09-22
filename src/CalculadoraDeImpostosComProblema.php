<?php

namespace Alura\DesignPattern;

/**
 * A classe CalculadoraDeImpostos representa uma funcionalidade em nosso sistema, logo,
 * pode ser chamada de classe de serviço.
 */

/**
 * Problemas:
 * Classe vai crescer infinitamente com um monte de regras de cálculo de impostos
 * A classe vai ter muitos if-else ou switch-case
 * Não trata classes não válidas
 * Precisará ser editada se alguma coisa mudar e a possibilidade de inserir bugs será muito alta.
 * Por isso o ideal é criar um forma que sejam criaddos arquivos novos para as novas
 * regras que isolem os bugs
 */
class CalculadoraDeImpostosComProblema
{
    public function calcula(Orcamento $orcamento, string $nomeImposto): float
    {
        switch ($nomeImposto) {
            case 'ICMS':
                return $orcamento->valor * 0.1;
            case 'ISS':
                return $orcamento->valor * 0.06;
        }
    }
}