<?php

namespace App\Http\Requests;

use App\Models\CompraDeLote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompraDeLoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('compra_de_lote_create');
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
            'data_da_aquisicao' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
