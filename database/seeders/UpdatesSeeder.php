<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $create = [
            [
                'module' => 'Updates',
                'sub_module' => 'updates'
            ],
        ];  

        // Use create to insert data
        foreach ($create as $item) {
            Permission::create($item);
        }
    }
}
