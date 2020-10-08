<?php

require_once 'vendor/autoload.php';

use Alura\DesignPattern\ListaDeOrcamentos;
use Alura\DesignPattern\ListaDeOrcamentosIteratorAggregate;
use Alura\DesignPattern\Orcamento;

$orcamento1 = new Orcamento();
$orcamento1->quantidadeItens = 7;
$orcamento1->aprova();
$orcamento1->valor = 1500.75;

$orcamento2 = new Orcamento();
$orcamento2->quantidadeItens = 3;
$orcamento2->reprova();
$orcamento2->valor = 150;

$orcamento3 = new Orcamento();
$orcamento3->quantidadeItens = 5;
$orcamento3->aprova();
$orcamento3->finaliza();
$orcamento3->valor = 1350;

/**
 * PROBLEMA DO ARRAY
 * Os arrays em PHP, embora sejam muito versáteis, têm diversos problemas.
 * Primeiramente, eles são otimizados para tudo e para nada ao mesmo tempo, ou seja,
 * se é performance que você quer, não são os arrays que você vai usar.
 * Além disso, não é possível informar o tipo dos elementos de um array do PHP.
 *
 * Como é possível colocar qualquer tipo de dado em um array, não podemos ter a certeza
 * de que todos os elementos dele possuem aquele tipo.
 *
 * Inclusive, uma das regras de Object Calisthenics (vale a pena a leitura)
 * diz que devemos sempre encapsular as nossas coleções em classes específicas.
 */

//$listaOrcamentos = [
//    $orcamento1, $orcamento2, $orcamento3, 'Aqui pode ir qualquer coisa'
//];

// PRIMEIRA ABSTRACAO - LEVAR O ARRAY PARA UMA CLASSE

$listaOrcamentos = new ListaDeOrcamentos();
$listaOrcamentos->addOrcamento($orcamento1);
$listaOrcamentos->addOrcamento($orcamento2);
$listaOrcamentos->addOrcamento($orcamento3);

// $listaOrcamentos->addOrcamento('Aqui pode ir qualquer coisa'); // PERFEITO... já não vai funcionar

// A linha abaixo não funcionou por ListaOrcamentos é um objeto e não é um array
// foreach ($listaOrcamentos as $orcamento) {

// Para resolver preciso chamar o método que devolve o array dos orcamentos. Conforme abaixo
foreach ($listaOrcamentos->getOrcamentos() as $orcamento) {
    echo "Valor: " . $orcamento->valor . PHP_EOL;
    echo "Estado: " . get_class($orcamento->estadoAtual) . PHP_EOL;
    echo "Qtd. Itens: " . $orcamento->quantidadeItens . PHP_EOL;

    echo PHP_EOL;
}

// SEGUNDA ABSTRACAO ==> Transformar a classe ListaOrcamentos iterable.

// Para isso poderia implementar uma interface Iterable, mas precisaria implementar muitos métodos que não preciso: rewind, valid, next,

// Dado que somente preciso iterar os itens de um array, posso fazer que essa classe implemente a interface IteratorAggregate
// Neste caso precisarei implementar um método getIterator
// Um array não é um iterator
// Neste caso transformo o Array num Iterator, pela função do PHP puro para cast \ArrayIterator()

echo PHP_EOL . PHP_EOL . 'Exemplo com IteratorAggregate' . PHP_EOL . PHP_EOL;

$listaOrcamentos = new ListaDeOrcamentosIteratorAggregate();
$listaOrcamentos->addOrcamento($orcamento1);
$listaOrcamentos->addOrcamento($orcamento2);
$listaOrcamentos->addOrcamento($orcamento3);

foreach ($listaOrcamentos as $orcamento) {
    echo "Valor: " . $orcamento->valor . PHP_EOL;
    echo "Estado: " . get_class($orcamento->estadoAtual) . PHP_EOL;
    echo "Qtd. Itens: " . $orcamento->quantidadeItens . PHP_EOL;

    echo PHP_EOL;
}