<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\Kota;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kota = Kota::all();
        $client = new Client();

        foreach ($kota as $item) {
            $url = "https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$item->id_kota}.json";
            $response = $client->get($url);
            $res = json_decode($response->getBody(), true);
            foreach ($res as $kecamatan) {
                Kecamatan::create([
                    'nama' => $kecamatan['name'],
                    'id_kecamatan' => $kecamatan['id'],
                    'kota_id' => $item->id_kota,
                ]);
            }
        }
    }
}
