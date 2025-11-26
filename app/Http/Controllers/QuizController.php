<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function start()
    {
        // Select 10 random questions with their options
        $questions = Question::with(['options' => function ($query) {
            $query->select('id', 'question_id', 'text'); // Don't send is_correct to frontend
        }])->inRandomOrder()->limit(10)->get();

        return response()->json($questions);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.option_id' => 'required|exists:options,id',
            'total_time_seconds' => 'required|integer',
        ]);

        $answers = $request->input('answers');
        $correctCount = 0;
        $errorCount = 0;
        $score = 0;

        foreach ($answers as $answer) {
            $question = Question::find($answer['question_id']);
            $selectedOption = $question->options()->where('id', $answer['option_id'])->first();

            if ($selectedOption && $selectedOption->is_correct) {
                $correctCount++;
                $score += 10; // Example scoring: 10 points per correct answer
            } else {
                $errorCount++;
            }
        }

        $result = QuizResult::create([
            'user_id' => Auth::id(),
            'score' => $score,
            'correct_count' => $correctCount,
            'error_count' => $errorCount,
            'total_time_seconds' => $request->input('total_time_seconds'),
        ]);

        return response()->json($result);
    }

    public function ranking()
    {
        $ranking = \App\Models\User::with('bestQuizResult')
            ->whereHas('bestQuizResult')
            ->get()
            ->map(function ($user) {
                $result = $user->bestQuizResult;
                $result->setRelation('user', $user);
                return $result;
            })
            ->sortBy([
                ['score', 'desc'],
                ['total_time_seconds', 'asc']
            ])
            ->values()
            ->take(10);

        return response()->json($ranking);
    }
}
