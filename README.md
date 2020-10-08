## Padroes Comportamentais

#### Muitos IFs
Sempre que uma nova funcionalidade dever ser implementada, o ideal é que possamos criar código novo e editar o mínimo possível de código já existente. Este é um dos principais pontos do princípio Aberto-Fechado (Open-Closed Principle) do SOLID. Ao editar código existente, podemos acabar quebrando funcionalidades já implementadas e funcionais.

#### Chain of Responsability(ChoR)
+ ChoR precisa determinar qual regra será aplicada, enquando o padrão Strategy não precisa pois já recebe a regra definida;
+ No caso de ChoR as regras são determinadas e estão ligadas entre si numa ordem de prescedencia determinada;
+ A aplicação das regras de calculo (classes) isolam as resposabilidade de cada cálculo e conhecem o próximo nível de responsabilidade
+ De forma geral sempre um regra precisará ter a aplicação da propria regra e passar a responsabilidade para alguem
    + Para isso será criada uma classe abstracta geral que defina o contrato desse padrao
+ Isso simula uma linha de producao onde cada fase trata da propria fase e depois de finalizado encaminha o item para a próxima fase;
+ Para saber mais sobre a parte teórica deste padrão, e analisar diferentes implementações, você pode conferir este link: https://refactoring.guru/design-patterns/chain-of-responsibility.

#### Template Method(TM)
+ Comezamos a adicionar mais impostos e eles de certa forma são muito parecidos:
    + 2 aliquotas, regras muito parecidas 
+ A verificação por uma alíquota máxima e o retorno condicional da alíquota está duplicada em duas classes. Mesmo em um exemplo pequeno, como este, duplicação nunca é legal. Mas imagine um algoritmo grande. O ideal é sempre extrair códigos duplicados.
+ Template Method visa evitar codigo duplicado entre classes, usando classes e métodos abstractos que centralizam o codigo "comum" e expoem "metodos abstratos e protected" que serão reimplementados pelas proprias regras de cada classe filha;
+ As aplicações do padrão Template Method no mundo PHP são muitas, mas além de entender a parte prática, é muito importante ler sobre a teoria por trás do padrão:  https://refactoring.guru/design-patterns/template-method.

#### State
+ Implementado quando os comportamentos de um objeto dependem do estado do objeto;
+ Cada estado sabe como executar o comportamento. Por isso o comportamento deve ser implementado no estado.
+ Tomar cuidado quando isso gera mais complexidade que solução;
+ Tomar cuidado com a questão das exceptions, de certa forma tem que respeitar os contratos. Então deve se colocar na classe pai para que os filhos respeitem isso;
+ Conferir este link: https://refactoring.guru/design-patterns/state.
 
#### Command
+ Isolar código que atende alguma funcionalidade. Assim essa funcionalidade será chamada como um comando toda vez que precisar dela.
+ Geralmente esse tipo de códigos se encontram em controllers ou até reposítories que compilam códigos com muita lógica e depois é dificil reaproveitar;
+ Isolar o código num comando é ideal para executar esse comando desde qualquer lugar.
    MAS será que dá para ir um nivel de abstracao acima dele... e facilitar que ele se execute em qualquer ordem
    Para isso podemos implementar uma interface. Ao implementar uma interface que defina o contrato de qualquer command facilitamos seu uso.
+ Mesmo assim dá para isolar ainda mais o código em:
    + codigo para a criacao da estrutura ou ambiente para execucao.... porque? porque aqui trazemos todas as dependencias necessarias. Isso permitirá futuramente mockar as coisas
    + codigo para execucao propriamente dita do servico ou caso de uso a ser executado;
+ Para isolar em 2 fases vamos implementar o padrão CommandHandler que vai um nivel acima de abstracao

#### Observers
+ Aqui o problema formulado está em funcao das acoes necessarias na geracao de pedido (registro no banco, envio de email, registro no log etc);
+ Um primeiro ponto seria isolar esses caras em classes proprias que executem essas ações;
+ Mas como estão todas dentro do mesmo código, vamos isolar para facilitar implementacoes futuras para adicionar novas ações;
+ EXPLICACAO: Um Command Handler tem como responsabilidade, normalmente, apenas orquestrar as tarefas a serem executadas, ou seja, chamar as classes necessárias que realizam as tarefas desejadas. 
    + No nosso caso, o Command Handler tinha todo o código do fluxo em seu corpo.
    + Separamos em classes para:
        + Porque, com classes menores e mais concisas, é mais fácil encontrar possíveis problemas
        + Porque a implementação de cada tarefa pode mudar com o tempo e o Command Handler não deve precisar saber disso
+ O padrão Observer é comumente utilizado por diversas bibliotecas que trabalham com eventos. 
    + Muito provavelmente, seu framework preferido (Symfony, Laravel, Phalcon, etc) possui algum componente que lida com eventos.
    + A forma como o padrão foi implementado aqui na aula é a mais simples e pura, mas existem diversas modificações que podem ser feitas. 
    + Dar nomes a eventos para filtrar quais ações serão executadas, etc. 

+ Resumindo:
    + Deixar a implementação de todas as tarefas de um caso de uso da aplicação na mesma classe pode trazer problemas
        + Dificuldade de manutenção
        + Classes muito grandes e difíceis de ler
        + Problemas quando precisar alterar a implementação de uma das tarefas
        + Que é mais interessante separar cada ação em uma classe separada
        + Como ligar um evento ocorrido com suas ações, através do padrão Observer
        
#### Iterator

+ PROBLEMA DO ARRAY
    + Os arrays em PHP, embora sejam muito versáteis, têm diversos problemas.
    + Primeiramente, eles são otimizados para tudo e para nada ao mesmo tempo, ou seja,
    + se é performance que você quer, não são os arrays que você vai usar.
    + Além disso, não é possível informar o tipo dos elementos de um array do PHP.
    +
    + Como é possível colocar qualquer tipo de dado em um array, não podemos ter a certeza
    + de que todos os elementos dele possuem aquele tipo.
    +
    + Inclusive, uma das regras de Object Calisthenics (vale a pena a leitura)
    + diz que devemos sempre encapsular as nossas coleções em classes específicas.

+ PRIMEIRA ABSTRACAO - LEVAR O ARRAY PARA UMA CLASSE

    + listaOrcamentos->addOrcamento('Aqui pode ir qualquer coisa'); // PERFEITO... já não vai funcionar

+ A linha abaixo não funcionou por ListaOrcamentos é um objeto e não é um array
    + foreach ($listaOrcamentos as $orcamento) {

+ Para resolver preciso chamar o método que devolve o array dos orcamentos. Conforme abaixo

+ SEGUNDA ABSTRACAO ==> Transformar a classe ListaOrcamentos iterable.

+ Para isso poderia implementar uma interface Iterable, mas precisaria implementar muitos métodos que não preciso: rewind, valid, next,

    + Dado que somente preciso iterar os itens de um array, posso fazer que essa classe implemente a interface IteratorAggregate
    + Neste caso precisarei implementar um método getIterator
    + Um array não é um iterator
    + Neste caso transformo o Array num Iterator, pela função do PHP puro para cast \ArrayIterator()
 
 
 ## Padrões Estruturais
 
 Padrões estruturais nos ajudam a relacionar diversas classes de forma organizada.
 
 #### Adapters
 
 + Recomendação para trabalhar com dependencias: **Depender sempre de abstrações (interfaces ou classes abstratas), e não de implementações específicas**
    + Este é um dos princípio de SOLID (Dependency Inversion Principle, a letra D). 
    + Devemos sempre preferir depender de abstrações, ou seja, interfaces ou classes abstratas, sempre que possível, ao invés de implementações específicas. 
    + Mesmo que dependamos de uma classe concreta, o ideal é depender de sua interface, ou seja, uma chamada de método público, e não uma série de chamadas.
 + Detalhes de infraestrutura devem ser abstraídos através de interfaces