<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Question\StoreRequest;
use App\Http\Requests\V1\Question\UpdateRequest;
use App\Services\contracts\GameServiceInterface;
use App\Services\contracts\QuestionServiceInterface;

class QuestionController extends Controller
{

    public function __construct(
        private QuestionServiceInterface $questionService,
        private GameServiceInterface     $gameService
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.question.index', ['questions' => $this->questionService->getQuestionPaginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.question.create', ['games' => $this->gameService->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRequest $request)
    {
        if (is_numeric($this->questionService->store($request->only(array_keys($request->rules())), auth('web')->user()))) {
            return redirect()->route('admin.questions.create')->withErrors(['message' => __('Your question is created.')]);
        } else {
            return redirect()->route('admin.questions.create')->withErrors(['failed' => __('Your question is not created, please try again.')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     */
    public function show($id)
    {
        return view('admin.question.edit', [
            'question' => $this->questionService->findQuestionById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit(int $id)
    {
        return view('admin.question.edit', [
            'question' => $this->questionService->findQuestionById($id),
            'games' => $this->gameService->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateRequest $request, $id)
    {
        if ($this->questionService->update($id, $request->game_id, $request->question, $request->rate)) {
            return redirect()->route('admin.questions.edit', ['question' => $id])->withErrors([
                'message' => __('Your question updated.')
            ]);
        } else {
            return redirect()->route('admin.questions.edit', ['question' => $id])->withErrors([
                'failed' => __('Update unsuccessful')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        $this->questionService->delete($id);
        return redirect()->route('admin.questions.index');
    }
}
