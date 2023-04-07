<?php

namespace App\Http\Requests;

use App\Models\Ossuario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOssuarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ossuario_edit');
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
