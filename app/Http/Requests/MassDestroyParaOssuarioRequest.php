<?php

namespace App\Http\Requests;

use App\Models\ParaOssuario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyParaOssuarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('para_ossuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:para_ossuarios,id',
        ];
    }
}
