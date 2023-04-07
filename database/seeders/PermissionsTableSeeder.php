<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_show',
            ],
            [
                'id'    => 3,
                'title' => 'permission_access',
            ],
            [
                'id'    => 4,
                'title' => 'role_create',
            ],
            [
                'id'    => 5,
                'title' => 'role_edit',
            ],
            [
                'id'    => 6,
                'title' => 'role_show',
            ],
            [
                'id'    => 7,
                'title' => 'role_delete',
            ],
            [
                'id'    => 8,
                'title' => 'role_access',
            ],
            [
                'id'    => 9,
                'title' => 'user_create',
            ],
            [
                'id'    => 10,
                'title' => 'user_edit',
            ],
            [
                'id'    => 11,
                'title' => 'user_show',
            ],
            [
                'id'    => 12,
                'title' => 'user_delete',
            ],
            [
                'id'    => 13,
                'title' => 'user_access',
            ],
            [
                'id'    => 14,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 15,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 16,
                'title' => 'cadastro_access',
            ],
            [
                'id'    => 17,
                'title' => 'cemiterio_create',
            ],
            [
                'id'    => 18,
                'title' => 'cemiterio_edit',
            ],
            [
                'id'    => 19,
                'title' => 'cemiterio_show',
            ],
            [
                'id'    => 20,
                'title' => 'cemiterio_delete',
            ],
            [
                'id'    => 21,
                'title' => 'cemiterio_access',
            ],
            [
                'id'    => 22,
                'title' => 'setore_create',
            ],
            [
                'id'    => 23,
                'title' => 'setore_edit',
            ],
            [
                'id'    => 24,
                'title' => 'setore_show',
            ],
            [
                'id'    => 25,
                'title' => 'setore_delete',
            ],
            [
                'id'    => 26,
                'title' => 'setore_access',
            ],
            [
                'id'    => 27,
                'title' => 'quadra_create',
            ],
            [
                'id'    => 28,
                'title' => 'quadra_edit',
            ],
            [
                'id'    => 29,
                'title' => 'quadra_show',
            ],
            [
                'id'    => 30,
                'title' => 'quadra_delete',
            ],
            [
                'id'    => 31,
                'title' => 'quadra_access',
            ],
            [
                'id'    => 32,
                'title' => 'lote_create',
            ],
            [
                'id'    => 33,
                'title' => 'lote_edit',
            ],
            [
                'id'    => 34,
                'title' => 'lote_show',
            ],
            [
                'id'    => 35,
                'title' => 'lote_delete',
            ],
            [
                'id'    => 36,
                'title' => 'lote_access',
            ],
            [
                'id'    => 37,
                'title' => 'ossuario_create',
            ],
            [
                'id'    => 38,
                'title' => 'ossuario_edit',
            ],
            [
                'id'    => 39,
                'title' => 'ossuario_show',
            ],
            [
                'id'    => 40,
                'title' => 'ossuario_delete',
            ],
            [
                'id'    => 41,
                'title' => 'ossuario_access',
            ],
            [
                'id'    => 42,
                'title' => 'gavetum_create',
            ],
            [
                'id'    => 43,
                'title' => 'gavetum_edit',
            ],
            [
                'id'    => 44,
                'title' => 'gavetum_show',
            ],
            [
                'id'    => 45,
                'title' => 'gavetum_delete',
            ],
            [
                'id'    => 46,
                'title' => 'gavetum_access',
            ],
            [
                'id'    => 47,
                'title' => 'solicitante_create',
            ],
            [
                'id'    => 48,
                'title' => 'solicitante_edit',
            ],
            [
                'id'    => 49,
                'title' => 'solicitante_show',
            ],
            [
                'id'    => 50,
                'title' => 'solicitante_delete',
            ],
            [
                'id'    => 51,
                'title' => 'solicitante_access',
            ],
            [
                'id'    => 52,
                'title' => 'lancamento_access',
            ],
            [
                'id'    => 53,
                'title' => 'obito_create',
            ],
            [
                'id'    => 54,
                'title' => 'obito_edit',
            ],
            [
                'id'    => 55,
                'title' => 'obito_show',
            ],
            [
                'id'    => 56,
                'title' => 'obito_delete',
            ],
            [
                'id'    => 57,
                'title' => 'obito_access',
            ],
            [
                'id'    => 58,
                'title' => 'compra_de_lote_create',
            ],
            [
                'id'    => 59,
                'title' => 'compra_de_lote_edit',
            ],
            [
                'id'    => 60,
                'title' => 'compra_de_lote_show',
            ],
            [
                'id'    => 61,
                'title' => 'compra_de_lote_delete',
            ],
            [
                'id'    => 62,
                'title' => 'compra_de_lote_access',
            ],
            [
                'id'    => 63,
                'title' => 'recadastramento_create',
            ],
            [
                'id'    => 64,
                'title' => 'recadastramento_edit',
            ],
            [
                'id'    => 65,
                'title' => 'recadastramento_show',
            ],
            [
                'id'    => 66,
                'title' => 'recadastramento_delete',
            ],
            [
                'id'    => 67,
                'title' => 'recadastramento_access',
            ],
            [
                'id'    => 68,
                'title' => 'transferencium_access',
            ],
            [
                'id'    => 69,
                'title' => 'entre_lote_create',
            ],
            [
                'id'    => 70,
                'title' => 'entre_lote_edit',
            ],
            [
                'id'    => 71,
                'title' => 'entre_lote_show',
            ],
            [
                'id'    => 72,
                'title' => 'entre_lote_delete',
            ],
            [
                'id'    => 73,
                'title' => 'entre_lote_access',
            ],
            [
                'id'    => 74,
                'title' => 'para_ossuario_create',
            ],
            [
                'id'    => 75,
                'title' => 'para_ossuario_edit',
            ],
            [
                'id'    => 76,
                'title' => 'para_ossuario_show',
            ],
            [
                'id'    => 77,
                'title' => 'para_ossuario_delete',
            ],
            [
                'id'    => 78,
                'title' => 'para_ossuario_access',
            ],
            [
                'id'    => 79,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
