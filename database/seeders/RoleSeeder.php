<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => Role::SUPER_ADMIN, 'name' => 'Super Admin', 'slug' => 'super_admin'],
            ['id' => Role::ADMIN, 'name' => 'Admin', 'slug' => 'admin'],
            ['id' => Role::EDITOR, 'name' => 'Editor', 'slug' => 'name']
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                [
                    'id' => $role['id'],
                ],
                $role);
        }
    }
}
