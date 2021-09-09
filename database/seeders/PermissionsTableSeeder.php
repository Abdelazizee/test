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
                'title' => 'look_table_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 21,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 22,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 23,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 24,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 25,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 26,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 27,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 28,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 29,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 30,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 31,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 32,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 33,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 34,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 35,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 36,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 37,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 38,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 39,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 40,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 41,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 42,
                'title' => 'status_create',
            ],
            [
                'id'    => 43,
                'title' => 'status_edit',
            ],
            [
                'id'    => 44,
                'title' => 'status_show',
            ],
            [
                'id'    => 45,
                'title' => 'status_delete',
            ],
            [
                'id'    => 46,
                'title' => 'status_access',
            ],
            [
                'id'    => 47,
                'title' => 'country_create',
            ],
            [
                'id'    => 48,
                'title' => 'country_edit',
            ],
            [
                'id'    => 49,
                'title' => 'country_show',
            ],
            [
                'id'    => 50,
                'title' => 'country_delete',
            ],
            [
                'id'    => 51,
                'title' => 'country_access',
            ],
            [
                'id'    => 52,
                'title' => 'city_create',
            ],
            [
                'id'    => 53,
                'title' => 'city_edit',
            ],
            [
                'id'    => 54,
                'title' => 'city_show',
            ],
            [
                'id'    => 55,
                'title' => 'city_delete',
            ],
            [
                'id'    => 56,
                'title' => 'city_access',
            ],
            [
                'id'    => 57,
                'title' => 'bank_create',
            ],
            [
                'id'    => 58,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 59,
                'title' => 'bank_show',
            ],
            [
                'id'    => 60,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 61,
                'title' => 'bank_access',
            ],
            [
                'id'    => 62,
                'title' => 'userbank_create',
            ],
            [
                'id'    => 63,
                'title' => 'userbank_edit',
            ],
            [
                'id'    => 64,
                'title' => 'userbank_show',
            ],
            [
                'id'    => 65,
                'title' => 'userbank_delete',
            ],
            [
                'id'    => 66,
                'title' => 'userbank_access',
            ],
            [
                'id'    => 67,
                'title' => 'setting_access',
            ],
            [
                'id'    => 68,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
