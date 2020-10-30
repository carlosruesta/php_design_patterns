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
 
#### Bridge
 
+ O padrão de ponte visa representar o fluxo de transformação ou execução que acontece em 2 universos diferentes.
+ Exemplos:
    + dados a serem exportaddos e os mecanismos de exportação
    + formas a serem pintadas e as cores
+ O padrão bridge visa a escalabilidade da modelagem ao elaborar uma ponte emtre a abstração e todas as implementacoes
 
#### Decorator

+ É usado para evitar o crescimento desorganizado e exponencial de classes do sistema. Para isso o decorator permitirá a expansão de classes de forma dinámica e recursiva.
+ Permite expandir o comportamento ou funcionalidade de uma classe. Por exemplo a combinação de impostos. Um exemplo no FMB seria a aplicação de uma regra de validaçã combinada.
+ Um exemplo bacana seria quando vai implementar a concatenação dos dados de um contato: nome + sobrenome + data_nascimento + CPF + endereco + perfil.
    + A apresentação do resultado vai depender dos dados preenchidos para cada contato e também da ordem de aplicação da concatenação;
+ Esse tipo de padrão tem um jeito recursivo para evitar recriar o mesmo comportamento inúmeras vezes para cada combinação;
+ Ao contrario disso posso ir adicionando comportamentos nas classes dinamicamente em tempo de execução;
+ O padrão Decorator é muito poderoso e bastante comum de ser implementado, mas possui alguns detalhes importantes a serem observados, como o fato do Decorator precisar possuir a mesma interface do objeto que ele está decorando.
  
#### Composite

+ Ao implementar uma interface que me permita representar ItemOrcamentos e Orcamentos de forma semelhante.
    + Dessa forma posso tratar o orcamento e os items (pai e filhos) da mesma forma;
    + Posso percorrer essa lista de Orcavels facilmente, para calcular o valor do orçamento, que é a raiz da árvore.
+ Permite a implementação de uma árvore de objetos de forma simples;
+ Composite tmabém chamado de Object - Tree ou arvore de objetos;
+ No padrão Composite: serve para implementar uma estrutura de arvore onde uma arvore e uma folha podem ser representados da mesma forma (interface) permitiendo acumular tudo na arvore principal ou elagumas folhas chave;

#### Facade

+ Em determinados casos, nós podemos precisar de um acesso simplificado a uma parte complexa ou grande do nosso sistema:
    + como autenticação, acesso a sistema de arquivos, cache, etc. 
+ Uma classe de fachada (facade) ajuda nisso, contendo apenas a funcionalidade desejada, pode ser bastante útil.
+ Padrão de projeto muito questionado, utilizado no Laravel;
+ Com esse padrão, podemos pegar um sub-sistema e expor parte de suas funcionalidades através de uma classe.
+ A classe responsável por ser essa fachada implementa o padrão Facade
+ O Laravel trabalha com uma espécie de Facade em sua arquitetura

+ Minha opinião: O que posso dizer do Facade, é que tudo que é feito parece ser uma fachada que esconde um monte de código para dentro.
    + O fato de instanciar outras classes dentro pode ser um erro, mas é uma decisão do desenvolvedor;
    + Poderia ser uma dependencia injetada e não seria mais um Facade? Não sei... acho que dizer que isso é um padrão, resulta meio redundante.
    + Eu vi como o Laravel implementa e permite extender esse comportamento de Facade. 
    + Acredito que se bem implementado, tudo bem? A questão sempre vai ser o tamanho do sistema que está por trás do Facade.
    
#### Proxy

+ Serve para interceptar um comportamento e realizar alguma coisa previa
+ Controla o accesso a um objeto original. Para isso é implementada uma nova classe derivada (filha da original) que reescreverá o método a ser controlado;
+ A classe derivada receberá posteriormente o objeto original e o executará, mas poderá antes e depois executar códigos adicionais;
+ Ao interceptar o metodo do original é possivel executar alguma coisa antes ou depois do metodo;
+ A diferença com o Decorator está na intenção:
    + A intenção do decorator é alterar o comportamento normal de uma funcionalidade. A alteracao é dinamica em tempo de execução;
    + A intenção do proxy é interceptar o método para adicionar a funcionalidade sem alterar o metodo original 
+ No nosso caso, foi implementada uma forma de fazer cache e evitar chamar um método custoso toda hora;
     
#### Flyweight

+ Util para otimização de algoritmos
+ Serve para otimizar o consumo de memória, ao reaproveitar objetos que possuem propriedades iguais
    + Podemos extrair parte de uma classe, para que os seus dados possam ser compartilhados
+ Para uso deste padrão é necessário adaptar códigos e estruturas de classes de forma a deixar mais leve a classe que passará por uma iteração de grande volume;
+ O fato de precisar reformular as classes faz com que muitas vezes perca-se o sentido semantico e lógico da classe. 
    + Por isso é preciso tomar bastante cuidado com o uso deste padrão e usar quando realmente é necessário;
+ No nosso caso a economia foi minima, mas a classe pedido ficou com uma referencia a dados Extrinsecos... para entender isso é complicado.
    + Para manutenção do código fica complicado pois ao longo do tempo essa clareza se perde e novos desenvolvedores podem ficar perdidos;
+ Se em algum momento você se deparar com milhões de objetos sendo armazenados em memória e um consumo muito alto desse recurso
    + Talvez esse padrão possa te salvar, mas lembre-se: essa situação não acontece rotineiramente.
+ Vale ressaltar também que a parte da criação desses objetos compartilhados, utilizando um cache, vai ser mostrada no próximo curso, que é o de Padrões de Projeto Criacionais.
+ **Esse padrão só deve ser utilizado caso hajam milhões de objetos em memória ao mesmo tempo, fazendo com que muita memória RAM seja utilizada.**

## Padrões Criacionais

São responsáveis por prover formas de criarmos objetos que precisam de alguma lógica.

#### Flyweight - Parte 2

+ Foi criada uma classe específica para criação do pedido por ser um objeto complexo que depende de outros objetos do sistema. 
+ O principal benefício que essa classe trará será uma lógica de criação com cache para evitar a criação de objetos desnecessários;
+ Quando a lógica da criação de um objeto complexo é extraída para uma classe especializada, ganhamos legibilidade em nosso código.
+ Ao ter uma classe especializada em criar um objeto, nós podemos ter lógicas sendo aplicadas para criá-lo corretamente. 

#### Factory

+ Permite que o código seja extensivel e seja fácil criar novos comportamentos isolados (classes filhas);
+ Neste caso vamos implementar o padrão Factory que permite extender a criacao de comportamentos (classes filha) com comportamentos próprios, mas a Factory conterá alguns métodos (classe pai) que serão reaproveitados pelos filhos;
+ Todas as classes filhas terão que implementar um comportamento comum (interface ou metodo abstrato de classe abstrata) que será chamado pelas aplicações;
+ A classe Factory deverá ser abstrata pois terá pelo menos um método abstrato que permitirá a criação das classes filhas correta para o comportamento certo em tempo de execução;
 
    