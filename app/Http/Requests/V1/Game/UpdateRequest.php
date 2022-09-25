<?php

namespace App\Http\Requests\V1\Game;

use App\Enums\GameStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:3',
            'max_allowed_questions' => 'required|integer|min:1|max:10',
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
