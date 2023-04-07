<?php

namespace App\Http\Requests;

use App\Models\Setore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSetoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setore_create');
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
