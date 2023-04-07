<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quadra extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'quadras';

    public static $searchable = [
        'indentificacao',
        'descricao',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cemiterio_id',
        'setor_id',
        'indentificacao',
        'descricao',
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

    public function assinatura()
    {
        return $this->belongsTo(User::class, 'assinatura_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
