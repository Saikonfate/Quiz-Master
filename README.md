# 🧠 GênioQuiz

Uma plataforma de quiz interativo desenvolvida com **Laravel 12** e **Vue.js 3**.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-3-4FC08D?style=for-the-badge&logo=vue.js&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

---

## 📋 Índice

- [Visão Geral](#-visão-geral)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias](#-tecnologias)
- [Requisitos](#-requisitos)
- [Instalação](#-instalação)
- [Usuários de Teste](#-usuários-de-teste)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Banco de Dados](#-banco-de-dados)
- [API Endpoints](#-api-endpoints)
- [Componentes Vue](#-componentes-vue)

---

## 🎯 Visão Geral

O GênioQuiz é uma plataforma de quiz interativo onde os usuários podem:

- ✅ Criar uma conta e fazer login
- ✅ Escolher temas de interesse (Games, Cinema, História)
- ✅ Responder 10 perguntas aleatórias dos temas escolhidos
- ✅ Ver feedback instantâneo (verde = certo, vermelho = errado)
- ✅ Visualizar sua pontuação final
- ✅ Competir no ranking com outros usuários
- ✅ Ver seu histórico de partidas

---

## ✨ Funcionalidades

### Autenticação
| Funcionalidade | Status | Arquivo |
|---------------|--------|---------|
| Registro de usuários | ✅ | `register.blade.php` |
| Login e logout | ✅ | `login.blade.php` |
| Middleware de proteção | ✅ | `routes/web.php` |

### Dashboard
| Funcionalidade | Status | Arquivo |
|---------------|--------|---------|
| Ranking dos usuários | ✅ | `Ranking.vue` |
| Nome do usuário | ✅ | `result.user.name` |
| Pontuação | ✅ | `result.score` |
| Tempo total | ✅ | `result.total_time_seconds` |

### Quiz Interativo
| Funcionalidade | Status | Arquivo |
|---------------|--------|---------|
| Iniciar novo Quiz | ✅ | `QuizApp.vue` |
| 10 perguntas fixas | ✅ | `QuizController.php` |
| Perguntas sequenciadas | ✅ | `currentQuestionIndex` |
| Confirmar resposta | ✅ | `confirmAnswer()` |
| Controle de tempo | ✅ | `elapsedTime` |
| 36 perguntas no banco | ✅ | `QuestionSeeder.php` |
| 4 opções por pergunta | ✅ | `QuestionSeeder.php` |
| Armazenar resultados | ✅ | `QuizResult` |

---

## 🛠 Tecnologias

### Backend
- **Laravel 12** - Framework PHP
- **MySQL** - Banco de dados
- **Eloquent ORM** - Manipulação do banco

### Frontend
- **Vue.js 3** - Framework JavaScript (Composition API)
- **Tailwind CSS** - Estilização
- **Blade** - Template engine
- **Vite** - Bundler

### Autenticação
- **Laravel Breeze** - Sistema de login/registro

---

## 📦 Requisitos

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL

---

## 🚀 Instalação

```bash
# 1. Clonar o repositório
git clone [url-do-repositorio]
cd Quiz

# 2. Instalar dependências PHP
composer install

# 3. Instalar dependências JavaScript
npm install

# 4. Configurar ambiente
cp .env.example .env
php artisan key:generate

# 5. Configurar banco de dados no .env
# DB_DATABASE=quiz
# DB_USERNAME=root
# DB_PASSWORD=sua_senha

# 6. Criar tabelas
php artisan migrate

# 7. Popular banco com dados
php artisan db:seed

# 8. Compilar assets
npm run build

# 9. Iniciar servidor
php artisan serve

# 10. Acessar
# http://localhost:8000
```

---

## 👥 Usuários de Teste

Todos os usuários têm a senha: **`123456`**

| Posição | Nome | Email | Score |
|---------|------|-------|-------|
| 🥇 1º | João Silva | joao@email.com | 100 pts |
| 🥈 2º | Maria Santos | maria@email.com | 90 pts |
| 🥉 3º | Pedro Costa | pedro@email.com | 80 pts |
| 4º | Ana Oliveira | ana@email.com | 70 pts |
| 5º | Lucas Souza | lucas@email.com | 60 pts |
| 6º | Julia Lima | julia@email.com | 50 pts |
| 7º | Rafael Alves | rafael@email.com | 40 pts |
| 8º | Fernanda Rocha | fernanda@email.com | 30 pts |
| 9º | Bruno Martins | bruno@email.com | 20 pts |
| 10º | Carla Ferreira | carla@email.com | 10 pts |

---

## 📁 Estrutura do Projeto

```
Quiz/
├── app/
│   ├── Http/Controllers/
│   │   ├── QuizController.php      # Lógica do quiz
│   │   └── ProfileController.php   # Perfil do usuário
│   └── Models/
│       ├── User.php                # Modelo de usuário
│       ├── Question.php            # Modelo de pergunta
│       ├── Option.php              # Modelo de opção
│       └── QuizResult.php          # Modelo de resultado
│
├── database/
│   ├── migrations/                 # Criação das tabelas
│   └── seeders/
│       ├── DatabaseSeeder.php      # Seeder principal
│       ├── QuestionSeeder.php      # 36 perguntas
│       └── UserSeeder.php          # 10 usuários de teste
│
├── resources/
│   ├── js/components/
│   │   ├── QuizApp.vue             # Componente principal
│   │   ├── Ranking.vue             # Ranking top 10
│   │   └── History.vue             # Histórico do usuário
│   └── views/
│       ├── welcome.blade.php       # Landing page
│       ├── dashboard.blade.php     # Quiz + Ranking
│       └── historico.blade.php     # Histórico
│
├── routes/
│   ├── web.php                     # Rotas web
│   └── auth.php                    # Rotas de auth
│
└── public/imgs/                    # Imagens do projeto
```

---

## 🗄 Banco de Dados

### Tabelas

#### `users`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Identificador único |
| name | string | Nome do usuário |
| email | string | Email (único) |
| password | string | Senha criptografada |
| created_at | timestamp | Data de criação |

#### `questions`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Identificador único |
| statement | text | Texto da pergunta |
| category | string | Categoria (games, cinema, historia) |
| created_at | timestamp | Data de criação |

#### `options`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Identificador único |
| question_id | bigint | FK para questions |
| text | string | Texto da alternativa |
| is_correct | boolean | Se é a resposta correta |

#### `quiz_results`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Identificador único |
| user_id | bigint | FK para users |
| score | integer | Pontuação (10 pts/acerto) |
| correct_count | integer | Quantidade de acertos |
| error_count | integer | Quantidade de erros |
| total_time_seconds | integer | Tempo total em segundos |

### Relacionamentos
- Um usuário pode ter vários resultados (1:N)
- Uma pergunta tem várias opções (1:N)
- Cada opção pertence a uma pergunta (N:1)

---

## 🔌 API Endpoints

### Públicas
| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/api/quiz/ranking` | Buscar ranking top 10 |

### Autenticadas
| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/api/quiz/start` | Iniciar quiz (10 perguntas) |
| POST | `/api/quiz/check-answer` | Verificar resposta |
| POST | `/api/quiz/submit` | Enviar resultado final |
| GET | `/api/quiz/history` | Buscar histórico do usuário |

---

## 🧩 Componentes Vue

### QuizApp.vue
Componente principal do quiz com 3 telas:

1. **Seleção de Temas** - Games, Cinema, História
2. **Quiz** - Perguntas com feedback visual
3. **Resultado** - Pontuação e acertos/erros

### Ranking.vue
- Top 10 jogadores
- Destaque visual para top 3 (🥇🥈🥉)
- Avatares coloridos
- Pontuação e tempo

### History.vue
- Histórico de partidas do usuário
- Pontuação, acertos/erros, tempo e data

---

## 📄 Licença

Este projeto foi desenvolvido para fins educacionais.

---

<div align="center">
  <strong>GênioQuiz</strong> - Teste seus conhecimentos! 🧠
</div>
