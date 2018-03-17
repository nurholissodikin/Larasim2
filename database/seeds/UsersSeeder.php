<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

         $guruRole = new Role();
        $guruRole->name = "guru";
        $guruRole->display_name = "Guru";
        $guruRole->save();

          $karyawanRole = new Role();
        $karyawanRole->name = "karyawan";
        $karyawanRole->display_name = "Karyawaan";
        $karyawanRole->save();

          $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('rahasia');
		$admin->save();
		$admin->attachRole($adminRole);

        $guru = new User();
        $guru->name = 'Sample guru';
        $guru->email = 'guru@gmail.com';
        $guru->password = bcrypt('rahasia');
        $guru->save();
        $guru->attachRole($guruRole);

        $guru = new User();
        $guru->name = 'Sample karyawan';
        $guru->email = 'karyawan@gmail.com';
        $guru->password = bcrypt('rahasia');
        $guru->save();
        $guru->attachRole($karyawanRole);
    }
}
