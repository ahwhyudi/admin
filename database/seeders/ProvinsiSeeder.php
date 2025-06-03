<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();
        $get = $client->get("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json");
        $res = json_decode($get->getBody(), true); // decode ke array asosiatif
        // dd($res);
        foreach($res as $item){
            $insert = Provinsi::create([
                'nama' => $item['name'],     // key 'name' bukan 'nama'
                'id_provinsi' => $item['id'] // key 'id' sesuai API wilayah.id
            ]);
        }

    }
}
