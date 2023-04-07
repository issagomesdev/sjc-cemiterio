<?php

namespace App\Http\Requests;

use App\Models\CompraDeLote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCompraDeLoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('compra_de_lote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:compra_de_lotes,id',
        ];
    }
}
