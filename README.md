## php_poo_padroes_comportamentais

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
 