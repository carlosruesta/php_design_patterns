<?php

namespace Alura\DesignPattern\Relatorio;

use Alura\DesignPattern\Orcamento;

class OrcamentoXml
{
    public function exportar(Orcamento $orcamento): string
    {
        $orcamentoXml = new \SimpleXMLElement('<orcamento/>');
        $orcamentoXml->addChild('valor', $orcamento->valor);
        $orcamentoXml->addChild('quantidade_itens', $orcamento->quantidadeItens);
        return $orcamentoXml->asXML();
    }
}