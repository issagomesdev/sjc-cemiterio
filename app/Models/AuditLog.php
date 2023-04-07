<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    public $table = 'audit_logs';

    protected $fillable = [
        'ação',
        'autor',
        'local',
        'registro',
        'descrição',
        'host',
    ];

    public static $searchable = [
      'ação',
      'local',
      'registro',
      'host',
    ];

    protected $casts = [
        'properties' => 'collection',
    ];

    public function autor_da_acao()
    {
        return $this->belongsTo(User::class, 'autor');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
