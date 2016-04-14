<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CreateSlideshowModuleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descricao' => 'required|min:3|max:250'
        ];
    }
}
