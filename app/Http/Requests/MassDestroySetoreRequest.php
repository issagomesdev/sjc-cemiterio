<?php

namespace App\Http\Requests;

use App\Models\Setore;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySetoreRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('setore_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:setores,id',
        ];
    }
}
