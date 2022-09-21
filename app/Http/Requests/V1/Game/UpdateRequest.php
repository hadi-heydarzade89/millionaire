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
            'name' => 'required|string|max:255|min:3',
            'max_allowed_questions' => 'required|integer',
            'status' => [
                'required',
                Rule::in(GameStatusEnum::cases())
            ],
        ];
    }
}
