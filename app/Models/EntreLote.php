<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntreLote extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TIPO_DE_DESTINO_RADIO = [
        'Interno' => 'Interno',
        'Externo' => 'Externo',
    ];

    public $table = 'entre_lotes';

    public static $searchable = [
      'tipo_de_destino',
      'destino',
      'data_de_transferencia',
      'observacoes',
    ];


    protected $dates = [
        'data_de_transferencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'responsavel_id',
        'responsavel_nome',
        'falecido_id',
        'falecido_nome',
        'cemiterio_id',
        'setor_id',
        'quadra_id',
        'lote_id',
        'tipo_de_destino',
        'destino',
        'cemiterio_destino_id',
        'setor_destino_id',
        'quadra_destino_id',
        'lote_destino_id',
        'data_de_transferencia',
        'observacoes',
        'assinatura_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function responsavel()
    {
        return $this->belongsTo(Responsavel::class, 'responsavel_id');
    }

    public function falecido()
    {
        return $this->belongsTo(Obito::class, 'falecido_id');
    }

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

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }

    public function cemiterio_destino()
    {
        return $this->belongsTo(Cemiterio::class, 'cemiterio_destino_id');
    }

    public function setor_destino()
    {
        return $this->belongsTo(Setore::class, 'setor_destino_id');
    }

    public function quadra_destino()
    {
        return $this->belongsTo(Quadra::class, 'quadra_destino_id');
    }

    public function lote_destino()
    {
        return $this->belongsTo(Lote::class, 'lote_destino_id');
    }

    public function getDataDeTransferenciaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataDeTransferenciaAttribute($value)
    {
        $this->attributes['data_de_transferencia'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function assinatura()
    {
        return $this->belongsTo(User::class, 'assinatura_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
