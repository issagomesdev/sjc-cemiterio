<?php

namespace App\Http\Requests;

use App\Models\Obito;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreObitoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('obito_create');
    }

    public function rules()
    {
        return [
            
        ];
    }
}
