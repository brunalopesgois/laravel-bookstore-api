<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CreateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Gate::forUser(Auth::guard('api')->user())->allows('can-administrate');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'isbn' => 'required|max:17',
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'sale_price' => 'required|numeric',
            'author_id' => 'required',
            'publisher_id' => 'required'
        ];
    }
}
