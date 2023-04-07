<?php

namespace App\Http\Requests;

use App\Models\ParaOssuario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateParaOssuarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('para_ossuario_edit');
    }

    public function rules()
    {
        return [
            'data_de_transferencia' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
