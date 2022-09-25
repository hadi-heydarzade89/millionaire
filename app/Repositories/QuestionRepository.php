<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\User;
use App\Repositories\contracts\QuestionRepositoryInterface;


class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    public function __construct(Question $model)
    {
        parent::__construct($model);
    }

    public function store(array $data, User $user): ?int
    {
        return $this->model->create(array_merge($data, ['created_by' => $user->id]))?->id;
    }

    public function update(array $data, int $id): bool
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->model->where('id',$id)->delete();
    }

    /**
     * @inheritdoc
     */
    public function find($id): ?Question
    {
        return $this->model->where('id', $id)->first();
    }
}
