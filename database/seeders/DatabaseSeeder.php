<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     ProvinceSeeder::class,
        //     CitySeeder::class,
        //     DistrictSeeder::class,
        //     VillageSeeder::class,
        // ]);

        Role::create([
            'name'  => 'Guru',
            'slug'  => 'guru'
        ]);
        Role::create([
            'name'  => 'Ustad',
            'slug'  => 'ustad'
        ]);
        Role::create([
            'name'  => 'Ustazah',
            'slug'  => 'ustazah'
        ]);
        Role::create([
            'name'  => 'Staff Sekolah',
            'slug'  => 'staff-sekolah'
        ]);
        $role = Role::create([
            'name'  => 'Staff Yayasan',
            'slug'  => 'staff-yayasan'
        ]);
        Role::create([
            'name'  => 'Kepala Sekolah',
            'slug'  => 'kepala-sekolah'
        ]);
        Role::create([
            'name'  => 'Wakil Kepala Sekolah',
            'slug'  => 'wakil-kepala-sekolah'
        ]);

        Role::create([
            'name'  => 'Bendahara',
            'slug'  => 'bendahara'
        ]);

        Role::create([
            'name'  => 'Santri',
            'slug'  => 'santri'
        ]);

        User::create([
            'email'             => 'admin@admin.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password'          => bcrypt('password'),
            'name'              => 'Ryan Achdiadsyah',
            'user_level'        => 'super',
            'is_active'         => '1',
            'role_id'           => $role->id,
        ]);

    }
}
