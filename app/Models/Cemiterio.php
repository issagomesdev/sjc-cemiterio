<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Cemiterio extends Model implements HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use InteractsWithMedia;

    protected $appends = [
        'foto_do_cemiterio',
    ];

    public const ESTADO_SELECT = [
      'TO' => 'Tocantins',
      'SP' => 'São Paulo',
      'SE' => 'Sergipe',
      'SC' => 'Santa Catarina',
      'RR' => 'Roraima',
      'RO' => 'Rondônia',
      'RS' => 'Rio Grande do Sul',
      'RN' => 'Rio Grande do Norte',
      'RJ' => 'Rio de Janeiro',
      'PI' => 'Piauí',
      'PE' => 'Pernambuco',
      'PA' => 'Pará',
      'PB' => 'Paraíba',
      'PR' => 'Paraná',
      'MG' => 'Minas Gerais',
      'MS' => 'Mato Grosso do Sul',
      'MT' => 'Mato Grosso',
      'MA' => 'Maranhão',
      'GO' => 'Goiás',
      'ES' => 'Espírito Santo',
      'DF' => 'Distrito Federal',
      'CE' => 'Ceará',
      'BA' => 'Bahia',
      'AM' => 'Amazonas',
      'AP' => 'Amapá',
      'AL' => 'Alagoas',
      'AC' => 'Acre',
    ];

    public $table = 'cemiterios';

    public static $searchable = [
        'nome',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'email',
        'numero_de_contato',
        'numero_de_contato_2',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'email',
        'numero_de_contato',
        'numero_de_contato_2',
        'observacoes',
        'assinatura_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function assinatura()
    {
        return $this->belongsTo(User::class, 'assinatura_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFotoDoCemiterioAttribute()
    {
        $file = $this->getMedia('foto_do_cemiterio')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
