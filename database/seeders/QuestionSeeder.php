<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'statement' => 'Qual é o personagem principal do jogo Mario Bros?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Luigi', 'is_correct' => false],
                    ['text' => 'Mario', 'is_correct' => true],
                    ['text' => 'Bowser', 'is_correct' => false],
                    ['text' => 'Yoshi', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual jogo tem blocos quadrados e permite construir casas?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Minecraft', 'is_correct' => true],
                    ['text' => 'Fortnite', 'is_correct' => false],
                    ['text' => 'Roblox', 'is_correct' => false],
                    ['text' => 'Tetris', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual é a cor do personagem Sonic?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Vermelho', 'is_correct' => false],
                    ['text' => 'Verde', 'is_correct' => false],
                    ['text' => 'Azul', 'is_correct' => true],
                    ['text' => 'Amarelo', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Em qual jogo capturamos criaturas chamadas Pokémon?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Pokémon', 'is_correct' => true],
                    ['text' => 'Digimon', 'is_correct' => false],
                    ['text' => 'Yu-Gi-Oh', 'is_correct' => false],
                    ['text' => 'Dragon Ball', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual console é fabricado pela Nintendo?',
                'category' => 'games',
                'options' => [
                    ['text' => 'PlayStation', 'is_correct' => false],
                    ['text' => 'Xbox', 'is_correct' => false],
                    ['text' => 'Switch', 'is_correct' => true],
                    ['text' => 'PC', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual personagem é conhecido por coletar anéis dourados?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Mario', 'is_correct' => false],
                    ['text' => 'Sonic', 'is_correct' => true],
                    ['text' => 'Crash', 'is_correct' => false],
                    ['text' => 'Pac-Man', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual jogo é famoso pela frase "The cake is a lie"?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Portal', 'is_correct' => true],
                    ['text' => 'Half-Life', 'is_correct' => false],
                    ['text' => 'Bioshock', 'is_correct' => false],
                    ['text' => 'Fallout', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual é o objetivo principal no jogo Tetris?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Encaixar peças e completar linhas', 'is_correct' => true],
                    ['text' => 'Construir casas', 'is_correct' => false],
                    ['text' => 'Derrotar inimigos', 'is_correct' => false],
                    ['text' => 'Coletar moedas', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual jogo de corrida tem personagens da Nintendo?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Need for Speed', 'is_correct' => false],
                    ['text' => 'Mario Kart', 'is_correct' => true],
                    ['text' => 'Gran Turismo', 'is_correct' => false],
                    ['text' => 'Forza', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual é o nome do protagonista de The Legend of Zelda?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Zelda', 'is_correct' => false],
                    ['text' => 'Link', 'is_correct' => true],
                    ['text' => 'Ganondorf', 'is_correct' => false],
                    ['text' => 'Sheik', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual jogo tem um personagem amarelo que come bolinhas?',
                'category' => 'games',
                'options' => [
                    ['text' => 'Pac-Man', 'is_correct' => true],
                    ['text' => 'Space Invaders', 'is_correct' => false],
                    ['text' => 'Donkey Kong', 'is_correct' => false],
                    ['text' => 'Pong', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual jogo de batalha real é conhecido pelo ônibus voador?',
                'category' => 'games',
                'options' => [
                    ['text' => 'PUBG', 'is_correct' => false],
                    ['text' => 'Fortnite', 'is_correct' => true],
                    ['text' => 'Apex Legends', 'is_correct' => false],
                    ['text' => 'Call of Duty Warzone', 'is_correct' => false],
                ]
            ],

            [
                'statement' => 'Qual é o nome do boneco de neve em Frozen?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Olaf', 'is_correct' => true],
                    ['text' => 'Elsa', 'is_correct' => false],
                    ['text' => 'Anna', 'is_correct' => false],
                    ['text' => 'Kristoff', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual super-herói usa uma roupa vermelha e azul e lança teias?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Batman', 'is_correct' => false],
                    ['text' => 'Superman', 'is_correct' => false],
                    ['text' => 'Homem-Aranha', 'is_correct' => true],
                    ['text' => 'Homem de Ferro', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual filme tem um peixe-palhaço chamado Nemo?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Procurando Nemo', 'is_correct' => true],
                    ['text' => 'Tubarão', 'is_correct' => false],
                    ['text' => 'Moana', 'is_correct' => false],
                    ['text' => 'A Pequena Sereia', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual personagem diz "Ao infinito e além"?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Woody', 'is_correct' => false],
                    ['text' => 'Buzz Lightyear', 'is_correct' => true],
                    ['text' => 'Rex', 'is_correct' => false],
                    ['text' => 'Sr. Cabeça de Batata', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual filme da Disney tem uma princesa com cabelos mágicos muito longos?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Cinderela', 'is_correct' => false],
                    ['text' => 'Enrolados', 'is_correct' => true],
                    ['text' => 'A Bela Adormecida', 'is_correct' => false],
                    ['text' => 'Branca de Neve', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual é o nome do leão protagonista de O Rei Leão?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Mufasa', 'is_correct' => false],
                    ['text' => 'Simba', 'is_correct' => true],
                    ['text' => 'Scar', 'is_correct' => false],
                    ['text' => 'Timão', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual filme tem um ogro verde chamado Shrek?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Monstros S.A.', 'is_correct' => false],
                    ['text' => 'Shrek', 'is_correct' => true],
                    ['text' => 'O Gato de Botas', 'is_correct' => false],
                    ['text' => 'Madagascar', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual super-herói usa um escudo com as cores da bandeira americana?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Thor', 'is_correct' => false],
                    ['text' => 'Capitão América', 'is_correct' => true],
                    ['text' => 'Hulk', 'is_correct' => false],
                    ['text' => 'Gavião Arqueiro', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual filme tem um robô chamado Wall-E?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Robôs', 'is_correct' => false],
                    ['text' => 'Wall-E', 'is_correct' => true],
                    ['text' => 'O Gigante de Ferro', 'is_correct' => false],
                    ['text' => 'Operação Big Hero', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual filme da Pixar tem emoções como personagens?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Viva - A Vida é uma Festa', 'is_correct' => false],
                    ['text' => 'Divertida Mente', 'is_correct' => true],
                    ['text' => 'Soul', 'is_correct' => false],
                    ['text' => 'Luca', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual vilão é o arqui-inimigo do Batman?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Thanos', 'is_correct' => false],
                    ['text' => 'Coringa', 'is_correct' => true],
                    ['text' => 'Loki', 'is_correct' => false],
                    ['text' => 'Lex Luthor', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual filme tem uma casa que voa com balões?',
                'category' => 'cinema',
                'options' => [
                    ['text' => 'Up - Altas Aventuras', 'is_correct' => true],
                    ['text' => 'O Mágico de Oz', 'is_correct' => false],
                    ['text' => 'A Fantástica Fábrica de Chocolate', 'is_correct' => false],
                    ['text' => 'Pinóquio', 'is_correct' => false],
                ]
            ],

            [
                'statement' => 'Quem descobriu o Brasil?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Pedro Álvares Cabral', 'is_correct' => true],
                    ['text' => 'Cristóvão Colombo', 'is_correct' => false],
                    ['text' => 'Vasco da Gama', 'is_correct' => false],
                    ['text' => 'Dom Pedro I', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Em qual país foram construídas as pirâmides?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Brasil', 'is_correct' => false],
                    ['text' => 'Egito', 'is_correct' => true],
                    ['text' => 'México', 'is_correct' => false],
                    ['text' => 'Grécia', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual país tem a Torre Eiffel?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Inglaterra', 'is_correct' => false],
                    ['text' => 'Itália', 'is_correct' => false],
                    ['text' => 'França', 'is_correct' => true],
                    ['text' => 'Espanha', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Quem foi o primeiro presidente do Brasil?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Getúlio Vargas', 'is_correct' => false],
                    ['text' => 'Deodoro da Fonseca', 'is_correct' => true],
                    ['text' => 'Juscelino Kubitschek', 'is_correct' => false],
                    ['text' => 'Dom Pedro II', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual animal é símbolo da realeza no antigo Egito?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Leão', 'is_correct' => false],
                    ['text' => 'Gato', 'is_correct' => true],
                    ['text' => 'Cachorro', 'is_correct' => false],
                    ['text' => 'Cavalo', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Em que ano o Brasil declarou sua independência?',
                'category' => 'historia',
                'options' => [
                    ['text' => '1822', 'is_correct' => true],
                    ['text' => '1889', 'is_correct' => false],
                    ['text' => '1500', 'is_correct' => false],
                    ['text' => '1900', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual civilização construiu o Coliseu?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Grega', 'is_correct' => false],
                    ['text' => 'Romana', 'is_correct' => true],
                    ['text' => 'Egípcia', 'is_correct' => false],
                    ['text' => 'Persa', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Quem pintou a Mona Lisa?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Vincent van Gogh', 'is_correct' => false],
                    ['text' => 'Leonardo da Vinci', 'is_correct' => true],
                    ['text' => 'Pablo Picasso', 'is_correct' => false],
                    ['text' => 'Michelangelo', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual é a capital do Brasil?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Rio de Janeiro', 'is_correct' => false],
                    ['text' => 'São Paulo', 'is_correct' => false],
                    ['text' => 'Brasília', 'is_correct' => true],
                    ['text' => 'Salvador', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual monumento é conhecido como símbolo do Rio de Janeiro?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Torre Eiffel', 'is_correct' => false],
                    ['text' => 'Cristo Redentor', 'is_correct' => true],
                    ['text' => 'Estátua da Liberdade', 'is_correct' => false],
                    ['text' => 'Big Ben', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual país presenteou os EUA com a Estátua da Liberdade?',
                'category' => 'historia',
                'options' => [
                    ['text' => 'Inglaterra', 'is_correct' => false],
                    ['text' => 'França', 'is_correct' => true],
                    ['text' => 'Alemanha', 'is_correct' => false],
                    ['text' => 'Itália', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Em que ano o homem pisou na lua pela primeira vez?',
                'category' => 'historia',
                'options' => [
                    ['text' => '1969', 'is_correct' => true],
                    ['text' => '1959', 'is_correct' => false],
                    ['text' => '1979', 'is_correct' => false],
                    ['text' => '1989', 'is_correct' => false],
                ]
            ],
        ];

        foreach ($questions as $q) {
            $question = Question::create([
                'statement' => $q['statement'],
                'category' => $q['category']
            ]);
            foreach ($q['options'] as $opt) {
                $question->options()->create($opt);
            }
        }
    }
}
