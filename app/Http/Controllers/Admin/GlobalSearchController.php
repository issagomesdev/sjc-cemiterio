<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GlobalSearchController extends Controller
{
  private $models = [
      'Cemiterio'  => 'cruds.cemiterio.title',
      'Setore'     => 'cruds.setore.title',
      'Quadra'       => 'cruds.quadra.title',
      'Lote'         => 'cruds.lote.title',
      'Ossuario'     => 'cruds.ossuario.title',
      'Gavetum'      => 'cruds.gavetum.title',
      'Solicitante'  => 'cruds.solicitante.title',
      'Obito'           => 'cruds.obito.title',
      'CompraDeLote'    => 'cruds.compraDeLote.title',
      'Recadastramento' => 'cruds.recadastramento.title',
      'EntreLote'       => 'cruds.entreLote.title',
      'ParaOssuario'    => 'cruds.paraOssuario.title',
      'User'       => 'cruds.user.title',
      'AuditLog'   => 'cruds.auditLog.title',
  ];

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search === null || !isset($search['term'])) {
            abort(400);
        }

        $term           = $search['term'];
        $searchableData = [];
        foreach ($this->models as $model => $translation) {
            $modelClass = 'App\Models\\' . $model;
            $query      = $modelClass::query();

            $fields = $modelClass::$searchable;

            foreach ($fields as $field) {
                $query->orWhere($field, 'LIKE', '%' . $term . '%');
            }

            $results = $query->take(10)
                ->get();

            foreach ($results as $result) {
                $parsedData           = $result->only($fields);
                $parsedData['model']  = trans($translation);
                $parsedData['fields'] = $fields;
                $formattedFields      = [];
                foreach ($fields as $field) {
                    $formattedFields[$field] = Str::title(str_replace('_', ' ', $field));
                }
                $parsedData['fields_formated'] = $formattedFields;

                $parsedData['url'] = url('/admin/' . Str::plural(Str::snake($model, '-')) . '/' . $result->id);

                $searchableData[] = $parsedData;
            }
        }

        return response()->json(['results' => $searchableData]);
    }
}
