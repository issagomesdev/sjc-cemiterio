<?php

namespace App\Http\Requests;

use App\Models\Lote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lote_create');
    }

    public function rules()
    {
        return [
            'comprimento' => [
                'string',
                'nullable',
            ],
            'altura' => [
                'string',
                'nullable',
            ],
            'indentificacao' => [
                'string',
                'nullable',
            ],
        ];
    }
}
