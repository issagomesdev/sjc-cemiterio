<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Recadastramento extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

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

    public const SEXO_SELECT = [
        'Feminino'        => 'Feminino',
        'Masculino'       => 'Masculino',
        'Sem informações' => 'Sem informações',
    ];

    public const COR_RACA_SELECT = [
        'Branco/a'       => 'Branco/a',
        'Negro/a'        => 'Negro/a',
        'Pardo/a'        => 'Pardo/a',
        'Amarela'         => 'Amarela',
        'Sem Informações' => 'Sem Informações',
    ];

    public $table = 'recadastramentos';

    public static $searchable = [
      'nome_do_falecido',
      'data_de_nascimento',
      'data_de_falecimento',
      'data_de_sepultamento',
      'nome_da_mae',
      'nome_do_pai',
      'sexo',
      'cor_raca',
      'certidao_de_obito',
      'causa_da_morte',
      'naturalidade',
      'estado',
      'cidade',
      'bairro',
      'rua',
      'numero',
      'observacoes',
    ];

    protected $appends = [
        'anexos',
    ];

    protected $dates = [
        'data_de_nascimento',
        'data_de_falecimento',
        'data_de_sepultamento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cemiterio_id',
        'setor_id',
        'quadra_id',
        'lote_id',
        'nome_do_falecido',
        'data_de_nascimento',
        'data_de_falecimento',
        'data_de_sepultamento',
        'nome_da_mae',
        'nome_do_pai',
        'sexo',
        'cor_raca',
        'certidao_de_obito',
        'causa_da_morte',
        'naturalidade',
        'estado',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'observacoes',
        'assinatura_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
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

    public function getDataDeNascimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataDeNascimentoAttribute($value)
    {
        $this->attributes['data_de_nascimento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataDeFalecimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataDeFalecimentoAttribute($value)
    {
        $this->attributes['data_de_falecimento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataDeSepultamentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataDeSepultamentoAttribute($value)
    {
        $this->attributes['data_de_sepultamento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAnexosAttribute()
    {
        return $this->getMedia('anexos');
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
