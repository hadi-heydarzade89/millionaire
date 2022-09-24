<?php

namespace App\Http\Requests\V1\Game;

use App\Enums\GameStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:3',
            'max_allowed_questions' => 'required|integer|min:' . config('app.minimum_score') . '|max:' . config('app.maximum_score'),
            'description' => 'nullable|max:255',
            'status' => [
                'required',
                Rule::in(array_map(
                    fn(GameStatusEnum $status) => $status->value,
                    GameStatusEnum::cases()
                ))
            ],
        ];
    }
}
