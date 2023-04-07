<?php

namespace App\Http\Requests;

use App\Models\Quadra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuadraRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quadra_edit');
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
