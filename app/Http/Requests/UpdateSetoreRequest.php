<?php

namespace App\Http\Requests;

use App\Models\Setore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSetoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setore_edit');
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
