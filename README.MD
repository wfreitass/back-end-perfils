# Projeto Full-Stack com Laravel e Angular

Este repositório contém um projeto full-stack desenvolvido utilizando Laravel 11 no back-end e Angular 18 no front-end. A seguir, apresento os principais detalhes da implementação.

## Back-End

### Tecnologias Utilizadas

- **PHP 8.3**
- **Laravel 11**
- **Laravel Sail** para ambiente de desenvolvimento com Docker
- **Laravel Passport** para autenticação via tokens
- **MySQL** como banco de dados relacional

### Estrutura do Projeto

Arquitetura baseada no padrão MVC (Model-View-Controller).

Uso das camadas adicionais de Interfaces, Repositories e Services:

- **TDD**: Test-driven development (algo básico apenas para demonstração).
- **Interfaces**: Definem os contratos para as implementações dos repositories e services.
- **Repositories**: Manipulam diretamente os modelos e consultas ao banco de dados.
- **Services**: Contêm a lógica de negócio.

### Recursos Utilizados

- **Enums** para o status das entidades, garantindo consistência e validação dos dados.
- **Migrations** para a estruturação do banco de dados:
  - Criação de tabelas e definição de relacionamentos.
  - Utilização de chaves estrangeiras para garantir integridade referencial.
  - **Seeders e Factories** para população inicial do banco de dados.

### Autenticação

A autenticação foi implementada com o pacote Laravel Passport, permitindo:

- Registro e login de usuários.
- Geração e validação de tokens de acesso.

## Front-End

### Tecnologias Utilizadas

- **Angular 18**
- **Bootstrap 5** para estilização responsiva

### Estrutura do Projeto

- Criação de **componentes reutilizáveis** para auxiliar na construção das páginas.
- Uso de **Services** para consumo da API do back-end.
- Definição de **Interfaces** para padronizar os modelos de dados consumidos e enviados.
- Utilização de **Enums** para garantir consistência e padronização no front-end.

### Funcionalidades

- **Autenticação**: Integração com a API do Laravel Passport.
- **Listagem, Criação, Atualização e Exclusão** de entidades como tarefas.
- **Formulários responsivos e validados** para entrada de dados.

### Estilização

- O **Bootstrap 5** foi utilizado para criar um layout responsivo e moderno.
- Menus dropdown e tabelas foram personalizados para melhor usabilidade.

## Execução do Projeto

### Back-End

1. Clone o repositório:
   ```bash
   git clone https://github.com/wfreitass/task-laravel-angular


