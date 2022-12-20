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
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_type_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_type_edit',
            ],
            [
                'id'    => 19,
                'title' => 'user_type_show',
            ],
            [
                'id'    => 20,
                'title' => 'user_type_delete',
            ],
            [
                'id'    => 21,
                'title' => 'user_type_access',
            ],
            [
                'id'    => 22,
                'title' => 'bank_master_create',
            ],
            [
                'id'    => 23,
                'title' => 'bank_master_edit',
            ],
            [
                'id'    => 24,
                'title' => 'bank_master_show',
            ],
            [
                'id'    => 25,
                'title' => 'bank_master_delete',
            ],
            [
                'id'    => 26,
                'title' => 'bank_master_access',
            ],
            [
                'id'    => 27,
                'title' => 'stage_master_create',
            ],
            [
                'id'    => 28,
                'title' => 'stage_master_edit',
            ],
            [
                'id'    => 29,
                'title' => 'stage_master_show',
            ],
            [
                'id'    => 30,
                'title' => 'stage_master_delete',
            ],
            [
                'id'    => 31,
                'title' => 'stage_master_access',
            ],
            [
                'id'    => 32,
                'title' => 'product_master_create',
            ],
            [
                'id'    => 33,
                'title' => 'product_master_edit',
            ],
            [
                'id'    => 34,
                'title' => 'product_master_show',
            ],
            [
                'id'    => 35,
                'title' => 'product_master_delete',
            ],
            [
                'id'    => 36,
                'title' => 'product_master_access',
            ],
            [
                'id'    => 37,
                'title' => 'master_access',
            ],
            [
                'id'    => 38,
                'title' => 'customer_create',
            ],
            [
                'id'    => 39,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 40,
                'title' => 'customer_show',
            ],
            [
                'id'    => 41,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 42,
                'title' => 'customer_access',
            ],
            [
                'id'    => 43,
                'title' => 'loan_master_create',
            ],
            [
                'id'    => 44,
                'title' => 'loan_master_edit',
            ],
            [
                'id'    => 45,
                'title' => 'loan_master_show',
            ],
            [
                'id'    => 46,
                'title' => 'loan_master_delete',
            ],
            [
                'id'    => 47,
                'title' => 'loan_master_access',
            ],
            [
                'id'    => 48,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 49,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 50,
                'title' => 'team_create',
            ],
            [
                'id'    => 51,
                'title' => 'team_edit',
            ],
            [
                'id'    => 52,
                'title' => 'team_show',
            ],
            [
                'id'    => 53,
                'title' => 'team_delete',
            ],
            [
                'id'    => 54,
                'title' => 'team_access',
            ],
            [
                'id'    => 55,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
