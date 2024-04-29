<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(config('mysoftcare.permissions.admin.route'))->flatten()->each(fn ($role) => Permission::firstOrCreate(['name' => $role, 'guard_name' => "web"]));
        $roles = Role::all();

        collect($roles)->each(function ($role) {
            $this->adminPermissions($role);
        });
    }

    private function adminPermissions(Role $role)
    {
        if ($role->name == config('mysoftcare.roles.admin')) {
            $role->givePermissionTo($this->all()->toArray());
        }
    }

    private function all()
    {
        return collect(config('mysoftcare.permissions'))->flatten();
    }

}
