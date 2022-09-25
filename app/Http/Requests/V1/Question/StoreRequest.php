<?php

namespace App\Http\Requests\V1\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'question' => 'required|string|max:300',
            'game_id' => 'required|int|exists:games,id',
            'rate' => 'required|integer|min:' . config('app.minimum_score') . '|max:' . config('app.maximum_score'),
        ];
    }
}
