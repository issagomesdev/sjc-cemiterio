<?php

namespace App\Http\Requests;

use App\Models\ObitosOssuario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateObitosOssuarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('obitos_ossuario_edit');
    }

    public function rules()
    {
        return [
            'numero_dam' => [
                'string',
                'nullable',
            ],
            'ano_dam' => [
                'string',
                'nullable',
            ],
            'nome_do_falecido' => [
                'string',
                'nullable',
            ],
            'data_de_nascimento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data_de_falecimento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data_de_sepultamento' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nome_da_mae' => [
                'string',
                'nullable',
            ],
            'nome_do_pai' => [
                'string',
                'nullable',
            ],
            'certidao_de_obito' => [
                'string',
                'nullable',
            ],
            'causa_da_morte' => [
                'string',
                'nullable',
            ],
            'naturalidade' => [
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
            'anexos' => [
                'array',
            ],
        ];
    }
}
