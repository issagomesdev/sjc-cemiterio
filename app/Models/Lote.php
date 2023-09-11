<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lote extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TIPO_DE_LOTE_SELECT = [
        'Carneira'    => 'Carneira',
        'Capela'      => 'Capela',
        'Estaca'      => 'Estaca',
        'Jazigo'      => 'Jazigo',
        'Gaveta Muro' => 'Gaveta Muro',
    ];

    public $table = 'lotes';

    public static $searchable = [
      'tipo_de_lote',
      'comprimento',
      'altura',
      'indentificacao',
      'descricao',
      'lote_vazio',
      'reservado',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cemiterio_id',
        'setor_id',
        'quadra_id',
        'tipo_de_lote',
        'comprimento',
        'altura',
        'indentificacao',
        'descricao',
        'lote_vazio',
        'reservado',
        'map_lat',
        'map_long',
        'assinatura_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cemiterio()
    {
        return $this->belongsTo(Cemiterio::class, 'cemiterio_id');
    }

    public function setor()
    {
        return $this->belongsTo(Setore::class, 'setor_id');
    }

    public function quadra()
    {
        return $this->belongsTo(Quadra::class, 'quadra_id');
    }

    public function assinatura()
    {
        return $this->belongsTo(User::class, 'assinatura_id');
    }

    public function obito()
    {
        return $this->hasOne(Obito::class, 'lote_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
