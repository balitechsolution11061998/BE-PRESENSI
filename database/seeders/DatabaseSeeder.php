<?php

namespace Database\Seeders;

use App\Models\Cabang;
use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $cabang = Cabang::create([
            'kode_cabang' => 'B1',
            'nama_cabang' => 'Bali',
            'lokasi_cabang' => 'Bali',
            'radius_cabang' => '1',
        ]);

        $kdIt = Department::create([
            'kode_dept' => 'DIT',
            'nama_dept' => 'IT',
        ]);

        $kdHr = Department::create([
            'kode_dept' => 'HR',
            'nama_dept' => 'HRD',
        ]);

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $employeeRole = Role::create(['name' => 'employee']);

        // Create permissions if needed
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view reports']);

        // Assign permissions to roles if needed
        $adminRole->givePermissionTo('manage users');
        $employeeRole->givePermissionTo('view reports');

        // Create admin user
        $admin = User::create([
            'username' => '1',
            'name' => 'Test Admin',
            'email' => 'testadmin@gmail.com',
            'password' => bcrypt('12345678'),
            'kode_dept' => $kdHr->kode_dept,
            'no_tlpn' => '08123456789',
            'alamat' => 'Jimbaran',
            'kode_jabatan' => '1',
            'kode_cabang' => $cabang->kode_cabang
        ]);
        $admin->assignRole($adminRole);

        // Create employee user
        $employee = User::create([
            'username' => '2',
            'name' => 'Test Employee',
            'email' => 'testemployee@gmail.com',
            'password' => bcrypt('12345678'),
            'kode_dept' => $kdIt->kode_dept,
            'no_tlpn' => '0812345678',
            'alamat' => 'Jimbaran',
            'kode_jabatan' => '2',
            'kode_cabang' => $cabang->kode_cabang
        ]);
        $employee->assignRole($employeeRole);
    }
}
