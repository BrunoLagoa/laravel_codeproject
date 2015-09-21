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
 
 - Nessa fase do projeto, voc� dever� apresentar um CRUD completo de nosso model Client.
 - Sempre lembrando que toda a informa��o resultante dever� ser exibida para o usu�rio final como um json.
 - N�o se esque�a de utilizar corretamente os verbos HTTP. 

## Fase 2 do projeto
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
 
 
------------------------------------------------------------------------------------------
[Bruno Castro](http://www.bhzautomacao.com.br) - Development