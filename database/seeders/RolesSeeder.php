<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users  = [
            ['name' =>'admin'],
            ['name' =>'user']
            ];

        
        if (!empty($users)) {
            foreach ($users as  $value) {
                Roles::create([
                    'name' => $value['name']
                ]);
            }
        }
    }
}
