<?php

namespace App\Services\contracts;

use App\Models\Game;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface GameServiceInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getGamePaginate(): LengthAwarePaginator;

    /**
     * @param array $gameData
     * @param User $user
     * @return void
     */
    public function store(array $gameData, User $user): void;

    /**
     * @param int $id
     * @return Game|null
     */
    public function findGameById(int $id): ?Game;

    /**
     * @param string $name
     * @param int $maxAllowedQuestions
     * @param bool $status
     * @param int $gameId
     * @return void
     */
    public function update(string $name, int $maxAllowedQuestions, bool $status, int $gameId): void;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
