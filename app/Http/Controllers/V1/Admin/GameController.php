<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Game\StoreRequest;
use App\Http\Requests\V1\Game\UpdateRequest;
use App\Services\contracts\GameServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class GameController extends Controller
{


    public function __construct(
        private GameServiceInterface $gameService
    )
    {

    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.game.index', ['games' => $this->gameService->getGamePaginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        $this->gameService->store($request->only(array_keys($request->rules())), auth('web')->user());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        return view('admin.game.show', ['game', $this->gameService->findGameById($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('admin.game.edit', ['game' => $this->gameService->findGameById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $gameId
     */
    public function update(UpdateRequest $request, int $gameId)
    {
        $this->gameService->update(
            $request->name,
            $request->max_allowed_questions,
            $request->status,
            $gameId
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        $this->gameService->delete($id);
    }
}
