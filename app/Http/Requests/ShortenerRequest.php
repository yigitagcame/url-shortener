<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ShortenerRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'required|active_url'
        ];
    }

    /**
     * Throw and Http Response Exception.
     *
     * @return HttpResponseException
     */
    public function failedValidation(Validator $validator) : HttpResponseException
    {
        throw new HttpResponseException(response()->json([
        'success'   => false,
        'message'   => 'Validation errors',
        'data'      => $validator->errors()
        ])->setStatusCode(400));
    }
}
