<?php

namespace App\Http\Requests;

use App\Models\Solicitante;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySolicitanteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('solicitante_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:solicitantes,id',
        ];
    }
}
