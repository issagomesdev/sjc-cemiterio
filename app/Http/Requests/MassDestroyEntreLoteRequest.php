<?php

namespace App\Http\Requests;

use App\Models\EntreLote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEntreLoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('entre_lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:entre_lotes,id',
        ];
    }
}
