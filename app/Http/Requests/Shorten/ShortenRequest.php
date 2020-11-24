<?php

namespace App\Http\Requests\Shorten;

use Illuminate\Foundation\Http\FormRequest;

class ShortenRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'destination_url' => 'required|url|max:768'
        ];
    }
}
