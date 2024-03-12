<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $roles = ['user', 'admin'];
    public function run(): void
    {
        for($i=0;$i<count($this->roles);$i++){
            Role::create([
                'role' => $this->roles[$i]
            ]);
        }
    }
}
