## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

<hr>

## poo-code-education
Curso Laravel 5.1 com AngularJS - Code Education [Laravel 5.1 com AngularJS](http://sites.code.education/laravel-com-angularjs/)

## Fase 1 do projeto
<b>CLIENTS</b>
 
 - Nessa fase do projeto, você deverá apresentar um CRUD completo de nosso model Client.
 - Sempre lembrando que toda a informação resultante deverá ser exibida para o usuário final como um json.
 - Não se esqueça de utilizar corretamente os verbos HTTP. 

## Fase 2 do projeto
<b>REPOSITORES / SERVICES</b>
 
 Agora que já falamos sobre os conceitos de Services e Repositories:
   
 1 - Faça o CRUD completo de nossa Entidade Client
   
 2 - Crie uma nova entidade chamada Project, onde sua tabela do banco de dados terá:
   
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
   
 3 - Crie o Repository e Service referente a entidade Project, bem como suas validações, gerando um CRUD completo
   
 4 - Na listagem dos dados, traga também as informações sobre o owner_id e client_id (dica: utilize o método do repository: "with")
 
## Fase 3 do projeto
<b>TASKS E MEMBERS</b>
  
 Agora que você está entendendo o processo de relacionamento e disponibilização das APIs relacionadas a Projects, faça:
 
 1 - Crie a entidade ProjectTask, com os seguintes campos e disponibilize os endpoints project/tasks.
 Não se esqueça de criar as migrations, seeds, repositories, services, etc.
 
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
 
 Faça o relacionamento com a entidade Project e User para que facilmente possamos ter acesso aos membros de um projeto.
 
 No ProjectService, crie dois métodos:
 
 - addMember: para adicionar um novo member em um projeto
 - removeMember: para remover um membro de um projeto
 - isMember: para verificar se um usuário é membro de um determinado projeto
 
 Crie um endpoint: /project/{id}/members para ter acesso a todos os membros de um projeto. 
 
## Fase 4 do projeto
<b>FINALIZANDO BACKEND</b>
  
 Agora que já temos nossa estrutura montada em relação ao projeto, precisamos finalizar a parte "base" do backend para que possamos iniciar o processo de integração com o AngularJS.

 Faça:

- Aplique o processo de Autorização em todos os endpoints de nossa API
- Crie Presenters e Transformers em todos os repositories (deixe exibindo todos os dados por padrão - isso poderá ser mudado quando formos conversar com o Angular)
- Termine o processo de inclusão de arquivos / upload validando possíveis tipos de erros
- Processo de remoção de arquivos do projeto
 
------------------------------------------------------------------------------------------
[Bruno Castro](http://www.bhzautomacao.com.br) - Development