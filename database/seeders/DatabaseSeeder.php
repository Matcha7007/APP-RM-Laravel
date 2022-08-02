<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Gender;
use App\Models\Kategori;
use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Poli;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('test'),
        // ]);

        //pasien
        Pasien::factory(250)->create();

        //dokter
        Dokter::factory(50)->create();
        
        //user default
        User::create([
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'administrator@mail.com',
            'password' => Hash::make('administrator'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Admin Rekam Medis',
            'username' => 'adminrekammedis',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'Pengunjung',
            'username' => 'pengunjung',
            'email' => 'pengunjung@mail.com',
            'password' => Hash::make('pengunjung'),
            'role_id' => 3
        ]);

        //role
        Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);
        Role::create([
            'name' => 'Admin Rekam Medis',
            'slug' => 'admin-rekam-medis',
        ]);
        Role::create([
            'name' => 'Pengunjung',
            'slug' => 'pengunjung',
        ]);

        //pelayanan
        Pelayanan::create([
            'name' => 'Rawat Jalan',
            'slug' => 'rawat-jalan',
        ]);
        Pelayanan::create([
            'name' => 'Rawat Inap',
            'slug' => 'rawat-inap',
        ]);
        Pelayanan::create([
            'name' => 'Rujukan',
            'slug' => 'rujukan',
        ]);
        Pelayanan::create([
            'name' => 'IGD',
            'slug' => 'igd',
        ]);

        //poli
        Poli::create([
            'name' => 'Spesialis Penyakit Dalam',
            'slug' => 'spesialis-penyakit-dalam',
            'gelar' => 'Sp.PD'
        ]);
        Poli::create([
            'name' => 'Spesialis Anak',
            'slug' => 'spesialis-anak',
            'gelar' => 'Sp.A'
        ]);
        Poli::create([
            'name' => 'Spesialis Saraf',
            'slug' => 'spesialis-saraf',
            'gelar' => 'Sp.N'
        ]);
        Poli::create([
            'name' => 'Spesialis Kandungan dan Ginekologi',
            'slug' => 'spesialis-kandungan-ginekologi',
            'gelar' => 'Sp.OG'
        ]);
        Poli::create([
            'name' => 'Spesialis Kulit dan Kelamin',
            'slug' => 'spesialis-kulit-kelamin',
            'gelar' => 'Sp.KK'
        ]);
        Poli::create([
            'name' => 'Spesialis THT',
            'slug' => 'spesialis-tht',
            'gelar' => 'Sp.THT'
        ]);
        Poli::create([
            'name' => 'Spesialis Mata',
            'slug' => 'spesialis-mata',
            'gelar' => 'Sp.M'
        ]);
        Poli::create([
            'name' => 'Dokter Gigi',
            'slug' => 'dokter-gigi',
            'gelar' => 'Sp.KG'
        ]);
        Poli::create([
            'name' => 'Dokter Umum',
            'slug' => 'dokter-umum',
            'gelar' => 'Sp.K'
        ]);

        //kategori
        Kategori::create([
            'name' => 'BPJS',
            'slug' => 'bpjs',
        ]);
        Kategori::create([
            'name' => 'JKN',
            'slug' => 'jkn',
        ]);
        Kategori::create([
            'name' => 'TNI',
            'slug' => 'tni',
        ]);
        Kategori::create([
            'name' => 'Asuransi Lainnya',
            'slug' => 'asuransi-lainnya',
        ]);

        //gender
        Gender::create([
            'name' => 'Laki-Laki',
            'slug' => 'laki-laki',
        ]);
        Gender::create([
            'name' => 'Perempuan',
            'slug' => 'perempuan',
        ]);





    }
}
