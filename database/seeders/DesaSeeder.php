<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Kecamatan;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatan = Kecamatan::get();
        $client = new Client();
        foreach($kecamatan as $item){
            $url="https://www.emsifa.com/api-wilayah-indonesia/api/villages/{$item->id_kecamatan}.json";
            // dd($url);
            $response = $client->get($url);
            $res = json_decode($response->getBody(),true);
            foreach($res as $kelurahan){
                Desa::create([
                    'nama' => $kelurahan['name'],
                    'kecamatan_id' => $item->id_kecamatan
                ]);
            }
        }
        // $kota = Kota::all();
        // $client = new Client();

        // foreach($kota as $item){
        //     $url = "https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$item->id_kota}.json";
        //         $response = $client->get($url);
        //         $res = json_decode($response->getBody(), true);
        //         foreach($res as $kecamatan){
        //             Kecamatan::create([
        //                 'nama' => $kecamatan['name'],
        //                 'id_kecamatan' => $kecamatan['id'],
        //                 'kota_id' => $item->id_kota,
        //             ]);
        //         }
            
        // }
    }
}
