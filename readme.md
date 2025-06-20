
# Teste Prático - Federal Soluções Técnicas

Este repositório contém o resultado do teste prático proposto pela Federal Soluções Técnicas, desenvolvido em Laravel com PostgreSQL.

---

## 🛠 Tecnologias Utilizadas

- PHP 7.4
- Laravel 5.6
- PostgreSQL
- Mailtrap (para testes de e-mail)
- Composer
- Bootstrap (opcional, caso tenha usado)
- Git

---

## ⚙️ Instalação do Projeto

1. **Clone o repositório:**

```bash
git clone https://github.com/IanRodriguesDev/Teste-vaga.git
cd Teste-vaga
```

2. **Instale as dependências:**

```bash
composer install
```

3. **Configure o ambiente:**

```bash
cp .env.example .env
```

4. **Configure o banco de dados no `.env`:**

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=teste
DB_USERNAME=seu_usuario_postgres
DB_PASSWORD=sua_senha
```

> ⚠️ Substitua `seu_usuario_postgres` e `sua_senha` pelos dados do seu ambiente local.

5. **Gere a chave da aplicação:**

```bash
php artisan key:generate
```

6. **Rode as migrations:**

```bash
php artisan migrate
```

7. **Rode os seeders (para criar os usuários de teste):**

```bash
php artisan db:seed
```

---

## 👥 Usuários de Teste

| Tipo         | E-mail             | Senha   |
|--------------|--------------------|---------|
| Administrador | admin@admin.com    | secret |
| Proprietário  | user@user.com      | secret |

*(Esses usuários foram criados no seeder)*

---

## 📌 Funcionalidades

- Login de usuário (Admin ou Proprietário)
- Administração de veículos (CRUD completo)
- Notificação por e-mail ao cadastrar ou editar um veículo
- Acesso restrito por tipo de usuário:
  - **Administrador**: acesso total ao CRUD de veículos
  - **Proprietário**: apenas visualização dos seus veículos
- Soft Delete nos veículos
- Validações:
  - Placa no formato `AAA1111`
  - Ano com até 4 dígitos
- Uso de `Events` e `Notifications` para envio de e-mail
- Organização limpa do código seguindo boas práticas

---

## ✉️ Configuração de E-mail (Mailtrap)

Configure as variáveis de e-mail no arquivo `.env` com os dados do Mailtrap:

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=usuario_do_mailtrap
MAIL_PASSWORD=senha_completa_do_mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="Ian Carlos - TESTE"
```

---

## ✅ Como Testar

- Acesse `/login`
- Entre como Admin e acesse `/admin/veiculos` (CRUD completo)
- Entre como Proprietário e acesse `/meus-veiculos` (visualização apenas)
- Cadastre ou edite um veículo e veja se o e-mail chega no Mailtrap

---

## 🧠 Observações

- Toda a lógica de envio de e-mails está desacoplada em `Events` e `Notifications`.
- Os controladores seguem o padrão "fino", com validações feitas via `FormRequest`.
- Soft Delete foi implementado com o trait `SoftDeletes`.

---

## 📚 Dificuldades (caso precise explicar algo)

Se não conseguiu terminar alguma parte, explique aqui brevemente:
- (ex: "não consegui configurar corretamente o envio de e-mail, mas deixei a estrutura pronta usando Event/Notification")
- (ou: "não implementei paginação na listagem por falta de tempo")

---

## 📎 Contato

Se tiver alguma dúvida, fico à disposição:

- **Nome**: Ian Carlos
- **E-mail**: seuemail@exemplo.com
- **GitHub**: [github.com/IanRodriguesDev](https://github.com/IanRodriguesDev)

---

## 🕒 Prazo

Esse teste foi realizado em até 2 dias, conforme o combinado.

---

## 🧾 Considerações Finais

Bom, foi incrível para mim desenvolver este projeto — um grande aprendizado, de verdade. Estou muito feliz por ter alcançado este resultado dentro do prazo. Foi no limite... mas dentro do prazo! 😄

Como ainda não consegui iniciar minha carreira como desenvolvedor, atualmente trabalho na Bluefit durante o período da manhã, por 8 horas diárias.  
(*Em caso de contratação, não haveria nenhum impedimento para minha saída de lá. Inclusive, estou em período de experiência, então solicitar desligamento seria tranquilo.*)

Foi um verdadeiro desafio conciliar o trabalho com o desenvolvimento do projeto. Mas nada que algumas noites codando não resolvessem.

Ainda tenho muitas ideias de melhorias, ajustes, tratamentos e prevenções de erro que gostaria de aplicar, mas, para não me estender demais, encerro aqui.

Foi um imenso prazer realizar este teste e expandir significativamente meus conhecimentos em Laravel, PostgreSQL e outras tecnologias envolvidas. Antes mesmo de saber o resultado, quero dizer que estou muito grato pela oportunidade de ter participado.

**Atenciosamente,  
Ian Carlos**
