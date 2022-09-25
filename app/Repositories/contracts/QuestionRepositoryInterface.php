<?php

namespace App\Repositories\contracts;

use App\Models\Question;
use App\Models\User;

interface QuestionRepositoryInterface
{
    /**
     * @param array $data
     * @param User $user
     * @return void
     */
    public function store(array $data, User $user): ?int;

    /**
     * @param $id
     * @return Question|null
     */
    public function find($id): ?Question;

    /**
     * @param array $data
     * @param int $gameId
     * @return bool
     */
    public function update(array $data, int $gameId): bool;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
