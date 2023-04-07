<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsavel extends Model
{
    use SoftDeletes;
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
        'Feminino'  => 'Feminino',
        'Masculino' => 'Masculino',
    ];

    public const PARENTESCO_SELECT = [
        'Pai'            => 'Pai',
        'Mãe'            => 'Mãe',
        'Filho/a'        => 'Filho/a',
        'Irmão/a'        => 'Irmão/a',
        'Avô'            => 'Avô',
        'Avó'            => 'Avó',
        'Neto/a'         => 'Neto/a',
        'Sobrinho/a'     => 'Sobrinho/a',
        'Primo/a'        => 'Primo/a',
        'Tio/a'          => 'Tio/a',
        'Bisavô'         => 'Bisavô',
        'Bisavó'         => 'Bisavó',
        'Sogro/a'        => 'Sogro/a',
        'Genro'          => 'Genro',
        'Nora'           => 'Nora',
        'Madastra'       => 'Madastra',
        'Enteado/a'      => 'Enteado/a',
        'Esposo/a'       => 'Esposo/a',
        'Outros'         => 'Outros',
        'Sem Informações'=> 'Sem Informações',
    ];

    public $table = 'responsavel';

    public static $searchable = [
      'nome',
      'parentesco',
      'sexo',
      'cpf_cnpj',
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
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'parentesco',
        'sexo',
        'cpf_cnpj',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
