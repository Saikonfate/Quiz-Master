<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\QuizResult;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * ATENÇÃO: Este seeder cria usuários com senha fraca (123456)
     * para fins de desenvolvimento e testes.
     * NÃO execute em produção!
     */
    public function run(): void
    {
        if (app()->environment('production')) {
            $this->command->warn('UserSeeder não deve ser executado em produção!');
            return;
        }
        $users = [
            ['name' => 'João Silva', 'email' => 'joao@email.com', 'score' => 100, 'correct' => 10, 'error' => 0, 'time' => 45],
            ['name' => 'Maria Santos', 'email' => 'maria@email.com', 'score' => 90, 'correct' => 9, 'error' => 1, 'time' => 52],
            ['name' => 'Pedro Costa', 'email' => 'pedro@email.com', 'score' => 80, 'correct' => 8, 'error' => 2, 'time' => 68],
            ['name' => 'Ana Oliveira', 'email' => 'ana@email.com', 'score' => 70, 'correct' => 7, 'error' => 3, 'time' => 75],
            ['name' => 'Lucas Souza', 'email' => 'lucas@email.com', 'score' => 60, 'correct' => 6, 'error' => 4, 'time' => 80],
            ['name' => 'Julia Lima', 'email' => 'julia@email.com', 'score' => 50, 'correct' => 5, 'error' => 5, 'time' => 90],
            ['name' => 'Rafael Alves', 'email' => 'rafael@email.com', 'score' => 40, 'correct' => 4, 'error' => 6, 'time' => 95],
            ['name' => 'Fernanda Rocha', 'email' => 'fernanda@email.com', 'score' => 30, 'correct' => 3, 'error' => 7, 'time' => 100],
            ['name' => 'Bruno Martins', 'email' => 'bruno@email.com', 'score' => 20, 'correct' => 2, 'error' => 8, 'time' => 110],
            ['name' => 'Carla Ferreira', 'email' => 'carla@email.com', 'score' => 10, 'correct' => 1, 'error' => 9, 'time' => 120],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('123456'),
            ]);

            QuizResult::create([
                'user_id' => $user->id,
                'score' => $userData['score'],
                'correct_count' => $userData['correct'],
                'error_count' => $userData['error'],
                'total_time_seconds' => $userData['time'],
            ]);
        }

        $teste = User::create([
            'name' => 'Teste',
            'email' => 'teste@email.com',
            'password' => Hash::make('123456'),
        ]);

        for ($i = 1; $i <= 20; $i++) {
            $correct = rand(3, 10);
            $error = 10 - $correct;
            QuizResult::create([
                'user_id' => $teste->id,
                'score' => $correct * 10,
                'correct_count' => $correct,
                'error_count' => $error,
                'total_time_seconds' => rand(30, 180),
                'created_at' => now()->subDays(20 - $i)->subHours(rand(0, 23)),
            ]);
        }
    }
}
