<?php

namespace App\Http\Requests;

use App\Models\Gavetum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGavetumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gavetum_create');
    }

    public function rules()
    {
        return [
            'indentificacao' => [
                'string',
                'nullable',
            ],
        ];
    }
}
