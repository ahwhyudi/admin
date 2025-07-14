<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Al Mujib',
        //     'email' => 'mijib@truth.com',
        //     'username' => 'mujib',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'phone' => '08001',
        //     'roles' => ''
        // ]);

        // \App\Models\DataTarget::create([
        //     'nama'=>'Iqbal',
        //     'alamat'=>'Pamulang Barat',
        //     'foto_bersama'=>'',
        //     'user_survey_id'=>'3',
        //     'latitude'=>'-6.3251547',
        //     'longitude'=>'106.5837802',
        //     'provinsi_id'=>'36',
        //     'kota_id'=>'3674',
        //     'kecamatan_id'=>'3674010',
        //     'desa_id'=>'49206'
        // ]);
        $this->call([
            // SoalSeeder::class,
            // ProvinsiSeeder::class,
            // KotaSeeder::class,
            // KecamatanSeeder::class,
            // DesaSeeder::class,
            // RespondenSeeder::class
        ]);
    }
}
