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

 
