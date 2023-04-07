<?php

namespace App\Http\Requests;

use App\Models\ObitosOssuario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyObitosOssuarioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('obitos_ossuario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:obitos_ossuarios,id',
        ];
    }
}
