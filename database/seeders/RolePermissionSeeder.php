<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'Super Admin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleMember = Role::create(['name' => 'Member']);
        $roleAcademicVolunteer = Role::create(['name' => 'Academic Volunteer']);
        $roleNonAcademicVolunteer = Role::create(['name' => 'Non Academic Volunteer']);

        // Permissions list as array
        $permissions = [
            //Dashboard permissions
            [
                'group_name'=>'dashboard',
                'permissions'=>['dashboard.view',]
            ],
            //admin permissions
            [
                'group_name'=>'admin',
                'permissions'=>['admin.create', 'admin.view', 'admin.edit', 'admin.delete']
            ],
            //role permissions
            [
                'group_name'=>'role',
                'permissions'=>['role.create', 'role.view', 'role.edit', 'role.delete']
            ],
            //profile permissions
            [
                'group_name'=>'profile',
                'permissions'=>['profile.create', 'profile.view', 'profile.edit', 'profile.delete']
            ],
        ];


        //Create and Assign permissions
//        $permission = Permission::create(['name' => 'edit articles']);

        foreach ($permissions as $permissionGroup){
            $groupName = $permissionGroup['group_name'];
            foreach ($permissionGroup['permissions'] as $item){
                $permission = Permission::create(['name' => $item, 'group_name' =>$groupName]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
