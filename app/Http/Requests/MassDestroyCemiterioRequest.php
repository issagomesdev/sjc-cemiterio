<?php

namespace App\Http\Requests;

use App\Models\Cemiterio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCemiterioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cemiterio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cemiterios,id',
        ];
    }
}
