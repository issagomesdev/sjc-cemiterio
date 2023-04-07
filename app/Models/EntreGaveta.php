<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntreGaveta extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TIPO_DE_DESTINO_RADIO = [
        'Interno' => 'Interno',
        'Externo' => 'Externo',
    ];

    public $table = 'entre_gavetas';

    public static $searchable = [
        'tipo_de_destino',
        'destino',
    ];

    protected $dates = [
        'data_de_transferencia',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'responsavel_id',
        'falecido_id',
        'cemiterio_id',
        'ossuario_id',
        'gaveta_id',
        'tipo_de_destino',
        'destino',
        'cemiterio_de_destino_id',
        'ossuario_de_destino_id',
        'gaveta_de_destino_id',
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
        return $this->belongsTo(ObitosGaveta::class, 'falecido_id');
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

    public function ossuario_de_destino()
    {
        return $this->belongsTo(Ossuario::class, 'ossuario_de_destino_id');
    }

    public function gaveta_de_destino()
    {
        return $this->belongsTo(Gavetum::class, 'gaveta_de_destino_id');
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
