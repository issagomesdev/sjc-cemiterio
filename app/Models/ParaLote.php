<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParaLote extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'para_lotes';

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
        'ossuario_id',
        'gaveta_id',
        'cemiterio_de_destino_id',
        'setor_de_destino_id',
        'quadra_de_destino_id',
        'lote_de_destino_id',
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

    public function ossuario()
    {
        return $this->belongsTo(Ossuario::class, 'ossuario_id');
    }

    public function gaveta()
    {
        return $this->belongsTo(Gavetum::class, 'gaveta_id');
    }

    public function cemiterio_de_destino()
    {
        return $this->belongsTo(Cemiterio::class, 'cemiterio_de_destino_id');
    }

    public function setor_de_destino()
    {
        return $this->belongsTo(Setore::class, 'setor_de_destino_id');
    }

    public function quadra_de_destino()
    {
        return $this->belongsTo(Quadra::class, 'quadra_de_destino_id');
    }

    public function lote_de_destino()
    {
        return $this->belongsTo(Lote::class, 'lote_de_destino_id');
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
