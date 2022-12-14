<?php

namespace App\Repositories\contracts;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface GameRepositoryInterface
{
    /**
     * @param array $data
     * @param User $user
     * @return bool
     */
    public function store(array $data, User $user): ?int;

    /**
     * @param $id
     * @return Game|null
     */
    public function find($id): ?Game;

    /**
     * @param array $data
     * @param int $gameId
     * @return void
     */
    public function update(array $data, int $gameId): void;

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
