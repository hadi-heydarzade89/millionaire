<?php

namespace App\Services;

use App\Models\Question;
use App\Models\User;
use App\Repositories\contracts\QuestionRepositoryInterface;
use App\Services\contracts\QuestionServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionService implements QuestionServiceInterface
{
    public function __construct(
        private QuestionRepositoryInterface $questionRepository
    )
    {
    }

    public function getQuestionPaginate(): LengthAwarePaginator
    {
        return $this->questionRepository->index();
    }

    public function store(array $gameData, User $user): ?int
    {
        return $this->questionRepository->store($gameData, $user);
    }

    public function findQuestionById(int $id): ?Question
    {
        return $this->questionRepository->find($id);
    }

    public function update(int $id, int $gameId, string $question, int $rate): bool
    {
        return $this->questionRepository->update([
            'game_id' => $gameId,
            'question' => $question,
            'rate' => $rate,
        ],
            $id);
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
