<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['id'=> 1,'name'=>'Create Post','slug'=>'create_posts'],
            ['id'=> 2,'name'=>'Edit Post','slug'=>'edit_posts'],
            ['id'=> 3,'name'=>'View Post','slug'=>'view_posts'],
            ['id'=> 4,'name'=>'Delete Post','slug'=>'delete_posts'],
            ['id'=> 5,'name'=>'Create Role','slug'=>'create_roles'],
            ['id'=> 6,'name'=>'Delete Role','slug'=>'delete_roles'],
            ['id'=> 7,'name'=>'Delete User','slug'=>'delete_users'],
            ['id'=> 8,'name'=>'Add Category','slug'=>'create_categories'],
            ['id'=> 9,'name'=>'Delete Category','slug'=>'delete_categories'],
            ['id'=> 10,'name'=>'Restore Post','slug'=>'restore_posts'],
        ];

        foreach($permissions as $permission)
        {
            Permission::firstOrCreate(
                [
                    'id' => $permission['id']
                ],
                $permission);
        }
    }
}
