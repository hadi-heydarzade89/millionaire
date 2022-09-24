<?php

namespace App\Services;

use App\Models\Game;
use App\Models\User;
use App\Repositories\contracts\GameRepositoryInterface;
use App\Services\contracts\GameServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GameService implements GameServiceInterface
{
    public function __construct(
        private GameRepositoryInterface $gameRepository
    )
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getGamePaginate(): LengthAwarePaginator
    {
        return $this->gameRepository->index();
    }

    /**
     * @inheritDoc
     */
    public function store(array $gameData, User $user): ?int
    {
        return $this->gameRepository->store($gameData, $user);
    }

    /**
     * @inheritDoc
     */
    public function findGameById(int $id): ?Game
    {
        return $this->gameRepository->find($id);
    }

    /**
     * @inheritDoc
     */
    public function update(string $name, int $maxAllowedQuestions, bool $status, int $gameId): void
    {
        $this->gameRepository->update(
            [
                'name' => $name,
                'max_allowed_questions' => $maxAllowedQuestions,
                'status' => $status,
            ],
            $gameId
        );
    }

    public function delete(int $id): void
    {
        $this->gameRepository->delete($id);
    }
}
