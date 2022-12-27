<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\AppSetting;

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

        AppSetting::create([
            'app_name'  => 'Kesantrian',
            'app_description'   => 'Aplikasi Kesantrian',
            'app_logo_light'  => '',
            'app_logo_dark'  => '',
            'app_version'   => '0.0.1',
            'school_full_name'  => 'Nama Sekolah Negeri',
            'school_short_name' => 'NSN',
            'school_logo_light'   => '',
            'school_logo_dark'   => '',
            'school_address'    => 'Jl. Banda Aceh - Medan',
            'school_phone'  => '081263280610',
            'school_mobile' => '081263280610',
            'school_email'  => 'admin@admin.com',
            'school_npsn'   => '123456',
            'school_instagram'  => '#',
            'school_facebook'   => '#',
            'school_twitter'    => '#',
            'school_youtube'    => '#',
            'school_website'    => '#',
            'school_headmaster' => 'Ryan Syah',
            'is_interface_maintenance'  => '0',
            'is_api_maintenance'    => '1',
            'is_payment_maintenance'    => '1',
        ]);
    }
}
