<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required'
        ];
    }

    public function response(array $errors)
    {
        return response()->json(['message' => 'You should specify the name and the phone the new maker', 'code' => 422]);
    }
}
