<?php

namespace App\Http\Requests;

use App\Models\Solicitante;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSolicitanteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('solicitante_create');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'nullable',
            ],
            'cnpj' => [
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
                'string',
                'nullable',
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
            'observacoes' => [
                'string',
                'nullable',
            ],
        ];
    }
}
