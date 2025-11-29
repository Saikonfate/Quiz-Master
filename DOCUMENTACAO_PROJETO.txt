================================================================================
                        DOCUMENTAÇÃO DO PROJETO GÊNIOQUIZ
                        Guia Completo para Apresentação
================================================================================

================================================================================
                    CHECKLIST DE CONFORMIDADE COM OS REQUISITOS
================================================================================

✅ = Implementado e funcionando
❌ = Não implementado
⚠️ = Parcialmente implementado

AUTENTICAÇÃO:
✅ Registro de usuários (nome, e-mail, senha) → register.blade.php
✅ Login e logout → login.blade.php + Laravel Breeze
✅ Middleware para proteger rotas → routes/web.php (middleware 'auth')

DASHBOARD:
✅ Apresentar Ranking dos usuários → dashboard.blade.php + Ranking.vue
✅ Informar nome do usuário → result.user.name no Ranking.vue
✅ Informar pontuação → result.score no Ranking.vue
✅ Informar tempo total → result.total_time_seconds no Ranking.vue

QUIZ INTERATIVO:
✅ Iniciar um novo Quiz → botão "Iniciar Quiz" no QuizApp.vue
✅ Quantidade fixa de perguntas → limit(10) no QuizController.php
✅ Exibir perguntas sequenciadas → currentQuestionIndex no QuizApp.vue
✅ Selecionar opção e pressionar confirmar → selectOption() + confirmAnswer()
✅ Botão confirmar só disponível com opção selecionada → :disabled="!selectedOptionId"
✅ Controlar tempo total do Quiz → elapsedTime + timerInterval no QuizApp.vue
✅ Banco de questões diversas → QuestionSeeder.php (36 perguntas)
✅ Selecionar 10 questões aleatórias → inRandomOrder()->limit(10)
✅ Cada pergunta tem 4 opções → QuestionSeeder.php (4 options por pergunta)
✅ Apenas 1 opção correta → is_correct = true (apenas 1 por pergunta)
✅ Armazenar quantidade de acertos → correct_count no QuizResult
✅ Armazenar quantidade de erros → error_count no QuizResult
✅ Armazenar pontuação → score no QuizResult
✅ Armazenar tempo → total_time_seconds no QuizResult

TECNOLOGIAS:
✅ Vue.js com Composition API → <script setup> nos componentes .vue
✅ Laravel para Backend → QuizController.php, Models, Migrations
✅ Frontend VueJs (maioria) → QuizApp.vue, Ranking.vue e History.vue
✅ Blade quando necessário → layouts e páginas de auth

QUESTÕES GERAIS:
✅ Seeder para alimentar banco → QuestionSeeder.php
✅ Componentes reutilizáveis → resources/views/components/ (13 componentes)
✅ Componentes de layout base → layouts/app.blade.php, guest.blade.php
✅ Interface adaptável ao Mobile → Tailwind CSS responsivo (sm:, lg:)
✅ Backend REST → QuizController com endpoints GET/POST retornando JSON
✅ Migrations com chaves estrangeiras → foreignId()->constrained()->onDelete('cascade')

✅ RANKING NA TELA INICIAL APÓS LOGIN:
O ranking é exibido na página principal (dashboard) logo abaixo do quiz,
com destaque visual para o top 3 (medalhas de ouro, prata e bronze).

================================================================================

ÍNDICE
------
1. Visão Geral do Projeto
2. Tecnologias Utilizadas
3. Estrutura de Pastas
4. Banco de Dados
5. Backend (Laravel)
6. Frontend (Vue.js + Blade)
7. Fluxo de Funcionamento
8. Como Rodar o Projeto
9. Resumo Rápido para Apresentação

================================================================================
1. VISÃO GERAL DO PROJETO
================================================================================

O GênioQuiz é uma plataforma de quiz interativo onde os usuários podem:
- Criar uma conta e fazer login
- Escolher temas de interesse (Games, Cinema, História)
- Responder 10 perguntas aleatórias dos temas escolhidos
- Ver feedback instantâneo (verde = certo, vermelho = errado)
- Visualizar sua pontuação final
- Competir no ranking com outros usuários
- Ver seu histórico de partidas

================================================================================
2. TECNOLOGIAS UTILIZADAS
================================================================================

BACKEND:
- Laravel 12 (Framework PHP)
- MySQL (Banco de dados)
- Eloquent ORM (Para manipular o banco de dados)

FRONTEND:
- Vue.js 3 (Framework JavaScript para interfaces reativas)
- Tailwind CSS (Framework CSS para estilização)
- Blade (Template engine do Laravel)
- Vite (Bundler para compilar CSS/JS)

AUTENTICAÇÃO:
- Laravel Breeze (Sistema de login/registro pronto)

================================================================================
3. ESTRUTURA DE PASTAS (ONDE ESTÁ CADA COISA)
================================================================================

Quiz/
├── app/                          → Código PHP principal
│   ├── Http/
│   │   └── Controllers/
│   │       ├── QuizController.php      → Lógica do quiz (iniciar, verificar, enviar)
│   │       └── ProfileController.php   → Gerenciamento de perfil do usuário
│   │
│   └── Models/                   → Modelos do banco de dados
│       ├── User.php              → Modelo de usuário
│       ├── Question.php          → Modelo de pergunta
│       ├── Option.php            → Modelo de opção/alternativa
│       └── QuizResult.php        → Modelo de resultado do quiz
│
├── database/
│   ├── migrations/               → Criação das tabelas
│   │   ├── create_users_table.php
│   │   ├── create_questions_table.php
│   │   ├── create_options_table.php
│   │   ├── create_quiz_results_table.php
│   │   └── add_category_to_questions_table.php
│   │
│   └── seeders/
│       ├── DatabaseSeeder.php    → Seeder principal (chama os outros)
│       ├── QuestionSeeder.php    → Perguntas do quiz (36 perguntas)
│       └── UserSeeder.php        → 10 usuários com resultados para ranking
│
├── resources/
│   ├── js/
│   │   ├── app.js                → Ponto de entrada do JavaScript
│   │   └── components/
│   │       ├── QuizApp.vue       → Componente principal do quiz
│   │       ├── Ranking.vue       → Componente do ranking (top 10)
│   │       └── History.vue       → Componente do histórico do usuário
│   │
│   ├── css/
│   │   └── app.css               → Estilos CSS (Tailwind)
│   │
│   └── views/                    → Templates HTML (Blade)
│       ├── welcome.blade.php     → Página inicial (landing page)
│       ├── dashboard.blade.php   → Página do quiz + ranking (após login)
│       ├── historico.blade.php   → Página de histórico do usuário
│       │
│       ├── auth/
│       │   ├── login.blade.php   → Página de login
│       │   └── register.blade.php→ Página de cadastro
│       │
│       └── layouts/
│           ├── app.blade.php     → Layout principal (logado)
│           ├── guest.blade.php   → Layout para visitantes
│           └── navigation.blade.php → Menu de navegação
│
├── routes/
│   ├── web.php                   → Rotas das páginas web
│   └── auth.php                  → Rotas de autenticação
│
├── public/
│   └── imgs/
│       ├── Hands Graduate.png    → Logo do projeto
│       └── g132.png              → Ilustração da landing page
│
├── tailwind.config.js            → Configuração das cores (primary, accent, muted)
└── vite.config.js                → Configuração do Vite (bundler)

================================================================================
4. BANCO DE DADOS
================================================================================

TABELAS PRINCIPAIS:

┌─────────────────────────────────────────────────────────────────────────────┐
│ users (Usuários)                                                            │
├─────────────────────────────────────────────────────────────────────────────┤
│ id          │ Identificador único                                           │
│ name        │ Nome do usuário                                               │
│ email       │ Email (único)                                                 │
│ password    │ Senha criptografada                                           │
│ created_at  │ Data de criação                                               │
└─────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────┐
│ questions (Perguntas)                                                       │
├─────────────────────────────────────────────────────────────────────────────┤
│ id          │ Identificador único                                           │
│ statement   │ Texto da pergunta                                             │
│ category    │ Categoria (games, cinema, historia)                           │
│ created_at  │ Data de criação                                               │
└─────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────┐
│ options (Opções/Alternativas)                                               │
├─────────────────────────────────────────────────────────────────────────────┤
│ id          │ Identificador único                                           │
│ question_id │ ID da pergunta (chave estrangeira)                            │
│ text        │ Texto da alternativa                                          │
│ is_correct  │ Se é a resposta correta (true/false)                          │
└─────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────┐
│ quiz_results (Resultados)                                                   │
├─────────────────────────────────────────────────────────────────────────────┤
│ id                  │ Identificador único                                   │
│ user_id             │ ID do usuário (chave estrangeira)                     │
│ score               │ Pontuação total (10 pontos por acerto)                │
│ correct_count       │ Quantidade de acertos                                 │
│ error_count         │ Quantidade de erros                                   │
│ total_time_seconds  │ Tempo total em segundos                               │
└─────────────────────────────────────────────────────────────────────────────┘

RELACIONAMENTOS:
- Um usuário pode ter vários resultados (1:N)
- Uma pergunta tem várias opções (1:N)
- Cada opção pertence a uma pergunta (N:1)

================================================================================
5. BACKEND (LARAVEL) - ARQUIVOS IMPORTANTES
================================================================================

─────────────────────────────────────────────────────────────────────────────
📁 app/Http/Controllers/QuizController.php
─────────────────────────────────────────────────────────────────────────────

Este é o "cérebro" do quiz. Contém 5 métodos principais:

1. start($request)
   - O que faz: Busca 10 perguntas aleatórias do banco
   - Recebe: Categorias selecionadas pelo usuário (opcional)
   - Retorna: Lista de perguntas com suas opções (sem mostrar qual é correta)
   - Rota: GET /api/quiz/start

2. checkAnswer($request)
   - O que faz: Verifica se a resposta está correta
   - Recebe: ID da pergunta e ID da opção escolhida
   - Retorna: Se acertou + qual era a opção correta
   - Rota: POST /api/quiz/check-answer

3. submit($request)
   - O que faz: Salva o resultado final do quiz
   - Recebe: Array de respostas + tempo total
   - Calcula: Pontuação (10 pts por acerto), acertos e erros
   - Salva: Resultado no banco de dados
   - Retorna: Resultado completo
   - Rota: POST /api/quiz/submit

4. ranking()
   - O que faz: Busca os 10 melhores jogadores
   - Ordena: Por pontuação (maior) e tempo (menor)
   - Retorna: Lista do ranking
   - Rota: GET /api/quiz/ranking

5. history()
   - O que faz: Busca o histórico de partidas do usuário logado
   - Ordena: Por data (mais recente primeiro)
   - Retorna: Lista de resultados do usuário
   - Rota: GET /api/quiz/history

─────────────────────────────────────────────────────────────────────────────
📁 app/Models/ (Modelos)
─────────────────────────────────────────────────────────────────────────────

Question.php:
- Representa uma pergunta
- Relacionamento: hasMany(Option) → uma pergunta tem várias opções
- Campo 'category' permite filtrar por tema

Option.php:
- Representa uma alternativa
- Campo 'is_correct' indica se é a resposta certa
- Relacionamento: belongsTo(Question)

User.php:
- Representa um usuário
- Relacionamento com QuizResult para ranking

QuizResult.php:
- Guarda os resultados de cada partida
- Relacionamento: belongsTo(User)

─────────────────────────────────────────────────────────────────────────────
📁 routes/web.php
─────────────────────────────────────────────────────────────────────────────

Rotas principais:
- GET /              → Página inicial (welcome.blade.php)
- GET /dashboard     → Página do quiz + ranking (precisa estar logado)
- GET /historico     → Página do histórico (precisa estar logado)

Rotas da API:
- GET  /api/quiz/ranking      → Buscar ranking (pública)
- GET  /api/quiz/start        → Iniciar quiz (autenticada)
- POST /api/quiz/check-answer → Verificar resposta (autenticada)
- POST /api/quiz/submit       → Enviar resultado (autenticada)
- GET  /api/quiz/history      → Buscar histórico (autenticada)

================================================================================
6. FRONTEND (VUE.JS + BLADE)
================================================================================

─────────────────────────────────────────────────────────────────────────────
📁 resources/js/components/QuizApp.vue
─────────────────────────────────────────────────────────────────────────────

É o componente principal do quiz. Divide-se em 3 telas:

TELA 1 - SELEÇÃO DE TEMAS (v-if="!quizStarted && !quizFinished")
- Mostra 3 botões: Games, Cinema, História
- Usuário clica para selecionar/desselecionar
- Botão "Iniciar Quiz" chama a função startQuiz()

TELA 2 - QUIZ (v-if="quizStarted && !quizFinished")
- Barra de progresso no topo
- Cronômetro contando o tempo
- Pergunta atual com 4 opções
- Ao clicar em opção: selectOption()
- Ao confirmar: confirmAnswer() → chama API para verificar
- Feedback visual: verde (certo) ou vermelho (errado)
- Botão "Próxima" ou "Ver Resultado" (última questão)

TELA 3 - RESULTADO (v-if="quizFinished")
- Mostra pontuação total
- Quantidade de acertos e erros
- Botão "Jogar Novamente" → resetQuiz()

VARIÁVEIS IMPORTANTES:
- questions: Array com as 10 perguntas
- currentQuestionIndex: Índice da pergunta atual (0-9)
- selectedTopics: Temas escolhidos ['games', 'cinema', 'historia']
- answerChecked: Se já confirmou a resposta
- correctOptionId: ID da resposta correta (após confirmar)
- result: Objeto com score, correct_count, error_count

─────────────────────────────────────────────────────────────────────────────
📁 resources/js/components/Ranking.vue
─────────────────────────────────────────────────────────────────────────────

Componente do ranking com destaque visual:
- Carrega ranking da API ao iniciar (onMounted)
- Mostra lista dos 10 melhores jogadores
- Top 3 com destaque especial (medalhas 🥇🥈🥉)
- Fundo colorido para top 3 (ouro, prata, bronze)
- Avatares coloridos com sombra para destaque
- Exibe posição, nome, pontuação e tempo

─────────────────────────────────────────────────────────────────────────────
📁 resources/js/components/History.vue
─────────────────────────────────────────────────────────────────────────────

Componente do histórico do usuário:
- Carrega histórico da API ao iniciar (onMounted)
- Mostra todas as partidas do usuário logado
- Exibe pontuação, acertos/erros, tempo e data
- Ordenado por data (mais recente primeiro)

─────────────────────────────────────────────────────────────────────────────
📁 resources/views/ (Templates Blade)
─────────────────────────────────────────────────────────────────────────────

welcome.blade.php:
- Página inicial para visitantes
- Logo + título + botões "Entrar" e "Criar conta"
- Ilustração ao lado

login.blade.php:
- Formulário de login
- Campos: email, senha
- Link para criar conta

register.blade.php:
- Formulário de cadastro
- Campos: nome, email, senha, confirmar senha

dashboard.blade.php:
- Página principal após login
- Inclui o componente <quiz-app>
- Inclui o componente <ranking-component> logo abaixo

historico.blade.php:
- Página de histórico do usuário
- Inclui o componente <history-component>

layouts/navigation.blade.php:
- Menu superior
- Links: Quiz, Histórico
- Dropdown do usuário (Perfil, Sair)

================================================================================
7. FLUXO DE FUNCIONAMENTO
================================================================================

FLUXO DO USUÁRIO:

1. Acessa a página inicial (welcome.blade.php)
   ↓
2. Clica em "Criar conta" → register.blade.php
   ↓
3. Preenche dados e cria conta
   ↓
4. É redirecionado para /dashboard
   ↓
5. Vê o quiz + ranking na mesma página
   ↓
6. Escolhe os temas desejados (Games, Cinema, História)
   ↓
7. Clica em "Iniciar Quiz"
   ↓
8. API GET /api/quiz/start busca 10 perguntas
   ↓
9. Para cada pergunta:
   a. Usuário clica em uma opção
   b. Clica em "Confirmar"
   c. API POST /api/quiz/check-answer verifica
   d. Mostra feedback (verde/vermelho)
   e. Clica em "Próxima"
   ↓
10. Ao terminar, API POST /api/quiz/submit salva resultado
    ↓
11. Tela de resultado mostra pontuação
    ↓
12. Ranking é atualizado automaticamente
    ↓
13. Pode clicar em "Histórico" para ver suas partidas
    ↓
14. Pode clicar em "Jogar Novamente"

FLUXO DE DADOS (Verificar Resposta):

┌─────────────────────────────────────────────────────────────────────────────┐
│ FRONTEND (QuizApp.vue)                                                      │
│ confirmAnswer() → axios.post('/api/quiz/check-answer', {                    │
│     question_id: 5,                                                         │
│     option_id: 18                                                           │
│ })                                                                          │
└─────────────────────────────────────────────────────────────────────────────┘
                                    ↓
┌─────────────────────────────────────────────────────────────────────────────┐
│ BACKEND (QuizController.php)                                                │
│ checkAnswer()                                                               │
│ 1. Busca a pergunta pelo ID                                                 │
│ 2. Busca a opção correta (is_correct = true)                                │
│ 3. Compara com a opção escolhida                                            │
│ 4. Retorna { is_correct: true/false, correct_option_id: 20 }                │
└─────────────────────────────────────────────────────────────────────────────┘
                                    ↓
┌─────────────────────────────────────────────────────────────────────────────┐
│ FRONTEND (QuizApp.vue)                                                      │
│ correctOptionId = response.data.correct_option_id                           │
│ answerChecked = true                                                        │
│ → Aplica classes CSS (verde/vermelho) baseado no resultado                  │
└─────────────────────────────────────────────────────────────────────────────┘

================================================================================
8. COMO RODAR O PROJETO
================================================================================

PRÉ-REQUISITOS:
- PHP 8.2+
- Composer
- Node.js 18+
- MySQL

PASSO A PASSO:

1. Clonar o repositório
   git clone [url-do-repositorio]
   cd Quiz

2. Instalar dependências PHP
   composer install

3. Instalar dependências JavaScript
   npm install

4. Configurar ambiente
   cp .env.example .env
   php artisan key:generate

5. Configurar banco de dados no .env
   DB_DATABASE=quiz
   DB_USERNAME=root
   DB_PASSWORD=sua_senha

6. Criar tabelas
   php artisan migrate

7. Popular com perguntas e usuários
   php artisan db:seed

   Ou separadamente:
   php artisan db:seed --class=QuestionSeeder
   php artisan db:seed --class=UserSeeder

   USUÁRIOS DE TESTE (senha: 123456):
   - joao@email.com (100 pts - 1º lugar)
   - maria@email.com (90 pts - 2º lugar)
   - pedro@email.com (80 pts - 3º lugar)
   - ana@email.com (70 pts)
   - lucas@email.com (60 pts)
   - julia@email.com (50 pts)
   - rafael@email.com (40 pts)
   - fernanda@email.com (30 pts)
   - bruno@email.com (20 pts)
   - carla@email.com (10 pts)

8. Compilar assets
   npm run build

9. Iniciar servidor
   php artisan serve

10. Acessar no navegador
    http://localhost:8000

================================================================================
9. RESUMO RÁPIDO PARA APRESENTAÇÃO
================================================================================

"O GênioQuiz é uma aplicação web de quiz desenvolvida com Laravel e Vue.js.

O BACKEND usa Laravel 12 com:
- 4 modelos principais: User, Question, Option e QuizResult
- QuizController com métodos para iniciar quiz, verificar respostas, salvar resultados e ranking
- API RESTful para comunicação com o frontend

O FRONTEND usa Vue.js 3 com:
- Componente QuizApp.vue que gerencia toda a lógica do quiz
- Componente Ranking.vue com destaque visual para o top 3
- Componente History.vue para histórico do usuário
- 3 telas no quiz: seleção de temas, perguntas e resultado
- Tailwind CSS para estilização responsiva

O BANCO DE DADOS armazena:
- Usuários com autenticação
- 36 perguntas divididas em 3 categorias
- Resultados para gerar o ranking

O FLUXO funciona assim:
1. Usuário faz login
2. Vê o quiz e o ranking na página principal
3. Escolhe os temas
4. Responde 10 perguntas com feedback instantâneo
5. Vê sua pontuação e posição no ranking
6. Pode acessar seu histórico de partidas"

================================================================================
                              FIM DA DOCUMENTAÇÃO
================================================================================
