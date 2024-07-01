<?php



namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionTableSeeder extends Seeder

{

public function run()
{

$permissions = [

[
'group_name' => 'dashboard',
'permissions' => [
'dashboard.view',
]
],
[
'group_name' => 'User',
'permissions' => [
'User-create',
'User-view',
'User-edit',
'User-delete',
]
],
[
'group_name' => 'role',
'permissions' => [
// role Permissions
'role-list',
'role-create',
'role-edit',
'role-delete',
]
],
[
'group_name' => 'settigs',
'permissions' => [
'settings-create'
]
],

[
'group_name' => 'Lead',
'permissions' => [
'lead.list',
]
],

[
'group_name' => 'Salary',
'permissions' => [
'salary.list',
]
],

[
'group_name' => 'Campaign',
'permissions' => [
'campaign.list',
]
],

[
'group_name' => 'Department',
'permissions' => [
'department.list',
]
],  
[
'group_name' => 'Designation',
'permissions' => [
'designation.list',
]
],       
[
'group_name' => 'Employee',
'permissions' => [
'employee.list',
]
],
[
'group_name' => 'Attendance',
'permissions' => [
'attendance.list',
]
],
[
'group_name' => 'Late Attend',
'permissions' => [
'attendance.late_attend',
]
],
[
'group_name' => 'Apply for Leave',
'permissions' => [
'leave.add',
]
],
[
'group_name' => 'Per Lead',
'permissions' => [
'per_lead.list',
]
],

[
'group_name' => 'Offer',
'permissions' => [
'lead_offer.list',
]
],

[
'group_name' => 'Monthly Salary',
'permissions' => [
'monthly_salary.list',
]
],

                                    
];
        // Do same for the admin guard for tutorial purposes

        $roleSuperAdmin = Role::firstOrCreate([
            'name' => 'superadmin',
            'guard_name' => 'web'
        ]);

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::firstOrCreate(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup, 'guard_name' => 'web']);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
        // DB::table('model_has_roles')->insertOrUpdate([
        //     'role_id' => 1,
        //     'model_id' => 1,
        //     'model_type' => 'App\Models\User'
        // ]);
        // Assign super admin role permission to superadmin user
        $admin = User::where('email', 'admin@gmail.com')->first();
        if ($admin) {
            $admin->assignRole($roleSuperAdmin);
        }
    }
}
