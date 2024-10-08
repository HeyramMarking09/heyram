<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskManagementSeeder extends Seeder
{
    public function run(): void
    {
        // Array of data to be inserted
        $create = [
            [
                'module' => 'Task Management',
                'sub_module' => 'task management'
            ],
        ];  

        // Use create to insert data
        foreach ($create as $item) {
            Permission::create($item);
        }
    }
}
