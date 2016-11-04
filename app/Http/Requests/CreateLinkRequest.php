<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class CreateLinkRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'required|url',
            'name' => 'link.name_available|min:3|max:10',
            'description' => 'max:255'
        ];
    }
}
