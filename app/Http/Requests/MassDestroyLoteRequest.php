<?php

namespace App\Http\Requests;

use App\Models\Lote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lotes,id',
        ];
    }
}
