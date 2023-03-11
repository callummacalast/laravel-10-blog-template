<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create appropriate permissions
        Permission::create(['name' => 'edit blogs']);
        Permission::create(['name' => 'delete blogs']);
        Permission::create(['name' => 'publish blogs']);
        Permission::create(['name' => 'unpublish blogs']);

        // create roles and assign existing permissions
        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo('edit blogs');
        $editor->givePermissionTo('publish blogs');
        $editor->givePermissionTo('unpublish blogs');
        $editor->givePermissionTo('delete blogs');

        $subscriber = Role::create(['name' => 'subscriber']);

        $super_admin = Role::create(['name' => 'Super-Admin']);

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
        ]);
        $user->assignRole($editor);

          // create demo users
          $user = \App\Models\User::factory()->create([
            'name' => 'Subscriber User',
            'email' => 'subscriber@example.com',
        ]);
        $user->assignRole($subscriber);
    }
}
