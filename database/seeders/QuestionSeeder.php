<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'statement' => 'Qual é a capital do Brasil?',
                'options' => [
                    ['text' => 'Rio de Janeiro', 'is_correct' => false],
                    ['text' => 'São Paulo', 'is_correct' => false],
                    ['text' => 'Brasília', 'is_correct' => true],
                    ['text' => 'Salvador', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Quanto é 2 + 2?',
                'options' => [
                    ['text' => '3', 'is_correct' => false],
                    ['text' => '4', 'is_correct' => true],
                    ['text' => '5', 'is_correct' => false],
                    ['text' => '6', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual a cor do céu em um dia limpo?',
                'options' => [
                    ['text' => 'Verde', 'is_correct' => false],
                    ['text' => 'Azul', 'is_correct' => true],
                    ['text' => 'Vermelho', 'is_correct' => false],
                    ['text' => 'Amarelo', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Quem descobriu o Brasil?',
                'options' => [
                    ['text' => 'Pedro Álvares Cabral', 'is_correct' => true],
                    ['text' => 'Cristóvão Colombo', 'is_correct' => false],
                    ['text' => 'Vasco da Gama', 'is_correct' => false],
                    ['text' => 'Dom Pedro I', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual o maior planeta do sistema solar?',
                'options' => [
                    ['text' => 'Terra', 'is_correct' => false],
                    ['text' => 'Marte', 'is_correct' => false],
                    ['text' => 'Júpiter', 'is_correct' => true],
                    ['text' => 'Saturno', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual é o animal mais rápido do mundo?',
                'options' => [
                    ['text' => 'Guepardo', 'is_correct' => true],
                    ['text' => 'Leão', 'is_correct' => false],
                    ['text' => 'Tigre', 'is_correct' => false],
                    ['text' => 'Cavalo', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual é o elemento químico com símbolo O?',
                'options' => [
                    ['text' => 'Ouro', 'is_correct' => false],
                    ['text' => 'Oxigênio', 'is_correct' => true],
                    ['text' => 'Ósmio', 'is_correct' => false],
                    ['text' => 'Oliva', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Quantos continentes existem?',
                'options' => [
                    ['text' => '5', 'is_correct' => false],
                    ['text' => '6', 'is_correct' => true], // América, Europa, Ásia, África, Oceania, Antártida (modelo mais comum)
                    ['text' => '7', 'is_correct' => false],
                    ['text' => '4', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Qual a moeda do Japão?',
                'options' => [
                    ['text' => 'Dólar', 'is_correct' => false],
                    ['text' => 'Euro', 'is_correct' => false],
                    ['text' => 'Iene', 'is_correct' => true],
                    ['text' => 'Won', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Quem pintou a Mona Lisa?',
                'options' => [
                    ['text' => 'Vincent van Gogh', 'is_correct' => false],
                    ['text' => 'Leonardo da Vinci', 'is_correct' => true],
                    ['text' => 'Pablo Picasso', 'is_correct' => false],
                    ['text' => 'Michelangelo', 'is_correct' => false],
                ]
            ],
             [
                'statement' => 'Qual é a fórmula da água?',
                'options' => [
                    ['text' => 'H2O', 'is_correct' => true],
                    ['text' => 'CO2', 'is_correct' => false],
                    ['text' => 'O2', 'is_correct' => false],
                    ['text' => 'NaCl', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'Em que ano o homem pisou na lua?',
                'options' => [
                    ['text' => '1969', 'is_correct' => true],
                    ['text' => '1959', 'is_correct' => false],
                    ['text' => '1979', 'is_correct' => false],
                    ['text' => '1989', 'is_correct' => false],
                ]
            ]
        ];

        foreach ($questions as $q) {
            $question = Question::create(['statement' => $q['statement']]);
            foreach ($q['options'] as $opt) {
                $question->options()->create($opt);
            }
        }
    }
}
