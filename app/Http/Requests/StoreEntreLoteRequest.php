<?php

namespace App\Http\Requests;

use App\Models\EntreLote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEntreLoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('entre_lote_create');
    }

    public function rules()
    {
        return [
            'destino' => [
                'string',
                'nullable',
            ],
            'data_de_transferencia' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
