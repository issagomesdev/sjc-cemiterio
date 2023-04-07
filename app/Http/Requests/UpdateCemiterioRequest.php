<?php

namespace App\Http\Requests;

use App\Models\Cemiterio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCemiterioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cemiterio_edit');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'nullable',
            ],
            'cidade' => [
                'string',
                'nullable',
            ],
            'bairro' => [
                'string',
                'nullable',
            ],
            'rua' => [
                'string',
                'nullable',
            ],
            'numero' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'complemento' => [
                'string',
                'nullable',
            ],
            'numero_de_contato' => [
                'string',
                'nullable',
            ],
            'numero_de_contato_2' => [
                'string',
                'nullable',
            ],
        ];
    }
}
