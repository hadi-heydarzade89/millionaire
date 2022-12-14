<?php

namespace App\Repositories;

use App\Models\Game;
use App\Models\User;
use App\Repositories\contracts\GameRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class GameRepository extends BaseRepository implements GameRepositoryInterface
{
    public function __construct(Game $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritdoc
     */
    public function find($id): ?Game
    {
        return $this->model->where('id', $id)->first();
    }

    public function store(array $data, User $user): ?int
    {
        return $this->model->create(array_merge($data, ['created_by' => $user->id]))?->id;
    }

    public function update(array $data, int $gameId): void
    {
        $this->model->where('id', $gameId)->update($data);
    }

    public function delete(int $id): void
    {
        $this->model->where('id', $id)->delete();
    }

    /**
     * @inheritDoc
     */
    public function getAll(): Collection
    {
        return $this->model->select(['name', 'id'])->get();
    }
}
