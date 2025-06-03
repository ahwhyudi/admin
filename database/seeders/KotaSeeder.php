<?php

namespace Database\Seeders;

use App\Models\Kota;
use App\Models\Provinsi;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinsi = Provinsi::all();
        $client = new Client();
        
        foreach($provinsi as $item){
            // ganti endpoint ke wilayah.id

            $url = "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$item->id_provinsi}.json";
            // dd($url);
            $response = $client->get($url);
            $res = json_decode($response->getBody(), true); // decode ke array
        
            // data kotanya ada di $res['data']
            foreach($res as $kota){
                Kota::create([
                    'nama' => $kota['name'],          // key 'name' sesuai API wilayah.id
                    'id_kota' => $kota['id'],         // key 'id'
                    'provinsi_id' => $item->id_provinsi, // sambungkan ke id provinsi lokal
                ]);
            }
        }
    }
}
