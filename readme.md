## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

<hr>

## poo-code-education
Curso Laravel 5.1 com AngularJS - Code Education [Laravel 5.1 com AngularJS](http://sites.code.education/laravel-com-angularjs/)

## Fase 1 do Projeto Laravel
<b>CLIENTS</b>
 
 - Nessa fase do projeto, voc� dever� apresentar um CRUD completo de nosso model Client.
 - Sempre lembrando que toda a informa��o resultante dever� ser exibida para o usu�rio final como um json.
 - N�o se esque�a de utilizar corretamente os verbos HTTP. 

## Fase 2 do Projeto Laravel
<b>REPOSITORES / SERVICES</b>
 
 Agora que j� falamos sobre os conceitos de Services e Repositories:
   
 1 - Fa�a o CRUD completo de nossa Entidade Client
   
 2 - Crie uma nova entidade chamada Project, onde sua tabela do banco de dados ter�:
   
   - id
   - owner_id (chave estrangeira para users)
   - client_id (chave estrangeira para clients)
   - name
   - description
   - progress
   - status
   - due_date
   - created_at
   - updated_at
   
 3 - Crie o Repository e Service referente a entidade Project, bem como suas valida��es, gerando um CRUD completo
   
 4 - Na listagem dos dados, traga tamb�m as informa��es sobre o owner_id e client_id (dica: utilize o m�todo do repository: "with")
 
## Fase 3 do Projeto Laravel
<b>TASKS E MEMBERS</b>
  
 Agora que voc� est� entendendo o processo de relacionamento e disponibiliza��o das APIs relacionadas a Projects, fa�a:
 
 1 - Crie a entidade ProjectTask, com os seguintes campos e disponibilize os endpoints project/tasks.
 N�o se esque�a de criar as migrations, seeds, repositories, services, etc.
 
 - id
 - name
 - project_id 
 - start_date
 - due_date
 - status
 - created_at
 - updated_at
 
 2 - Crie a entidade ProjectMembers, com os campos:
 
 - project_id
 - user_id
 
 Fa�a o relacionamento com a entidade Project e User para que facilmente possamos ter acesso aos membros de um projeto.
 
 No ProjectService, crie dois m�todos:
 
 - addMember: para adicionar um novo member em um projeto
 - removeMember: para remover um membro de um projeto
 - isMember: para verificar se um usu�rio � membro de um determinado projeto
 
 Crie um endpoint: /project/{id}/members para ter acesso a todos os membros de um projeto. 
 
## Fase 4 do Projeto Laravel
<b>FINALIZANDO BACKEND</b>
  
 Agora que j� temos nossa estrutura montada em rela��o ao projeto, precisamos finalizar a parte "base" do backend para que possamos iniciar o processo de integra��o com o AngularJS.

 Fa�a:

- Aplique o processo de Autoriza��o em todos os endpoints de nossa API
- Crie Presenters e Transformers em todos os repositories (deixe exibindo todos os dados por padr�o - isso poder� ser mudado quando formos conversar com o Angular)
- Termine o processo de inclus�o de arquivos / upload validando poss�veis tipos de erros
- Processo de remo��o de arquivos do projeto

## Fase 1 do Projeto Angular
<b>CONFIGURANDO O AMBIENTE DE DESENVOLVIMENTO</b>
  
 Agora que voc� j� viu todo processo de prepara��o do nosso front-end, voc� deve reproduzir o mesmo ambiente em seu projeto.
 � preciso que ao digitarmos "gulp watch-dev", ele realize todas as tarefas descritas para o desenvolvimento e quando
 digitarmos "gulp default" ou somente "gulp", o mesmo gere os arquivos all.js e all.css que ser� o resultado da uni�o dos arquivos correspondentes.

## Fase 2 do Projeto Angular
 <b>REALIZANDO AUTENTICAÇÃO</b>

  Agora que já realizamos a autenticação é preciso que você faça a mesma autenticação na rota #/login.
  Quando o usuário for autenticado, redirecione-o para #/home. Não se preocupe em restringir o acesso ao #/home quando não estivermos
  autenticados.
 
------------------------------------------------------------------------------------------
[Bruno Castro](http://www.bhzautomacao.com.br) - Development