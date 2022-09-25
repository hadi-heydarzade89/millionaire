<?php

namespace App\Services\contracts;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface GameServiceInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getGamePaginate(): LengthAwarePaginator;

    /**
     * @param array<string,int,bool> $gameData
     * @param User $user
     * @return bool
     */
    public function store(array $gameData, User $user): ?int;

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

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
