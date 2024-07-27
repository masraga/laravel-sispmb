<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    foreach (config("roles") as $role => $permissions) {
      $r = Role::create(["name" => $role]);
      foreach ($permissions as $permission) {
        $p = Permission::create(["name" => $permission]);
        $r->givePermissionTo($p);
        $p->assignRole($r);
      }
    }

    $admin = User::factory()->create([
      'name' => 'ADMIN',
      'email' => 'admin@admin.com',
    ]);

    $admin->assignRole("admin");
  }
}
