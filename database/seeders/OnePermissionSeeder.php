<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OnePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of data to be inserted
        $create = [
            [
                'module' => 'Roles And Permission',
                'sub_module' => 'roles and permission'
            ],
            [
                'module' => 'Delete Request',
                'sub_module' => 'delete request'
            ],
            [
                'module' => 'Employers List',
                'sub_module' => 'employers list'
            ],
            [
                'module' => 'Apply For An Lmia',
                'sub_module' => 'apply for an lmia'
            ],
            [
                'module' => 'Leads',
                'sub_module' => 'leads'
            ],
            [
                'module' => 'Call Tagging',
                'sub_module' => 'call tagging'
            ],
            [
                'module' => 'Support',
                'sub_module' => 'support'
            ],
        ];  

        // Use create to insert data
        foreach ($create as $item) {
            Permission::create($item);
        }
    }
}
