<?php

namespace App\Services\contracts;

use App\Models\Question;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface QuestionServiceInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getQuestionPaginate(): LengthAwarePaginator;

    /**
     * @param array<string,int,bool> $gameData
     * @param User $user
     * @return int|null
     */
    public function store(array $gameData, User $user): ?int;

    /**
     * @param int $id
     * @return Question|null
     */
    public function findQuestionById(int $id): ?Question;

    /**
     * @param int $id
     * @param int $gameId
     * @param string $question
     * @param int $rate
     * @return bool
     */
    public function update(int $id, int $gameId, string $question, int $rate): bool;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
