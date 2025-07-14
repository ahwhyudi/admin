<?php

namespace Database\Seeders;

use App\Models\DataTarget;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RespondenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $latitudes = [
        //     '-6.347274',
        //     '-6.348021',
        //     '-6.349572',
        //     '-6.350348',
        //     '-6.347812',
        //     '-6.346912',
        //     '-6.348867',
        //     '-6.346200',
        //     '-6.349100',
        //     '-6.347500',
        // ];
        // $longitudes = [
        //     '106.738839',
        //     '106.740095',
        //     '106.736950',
        //     '106.738437',
        //     '106.735328',
        //     '106.739256',
        //     '106.737578',
        //     '106.736600',
        //     '106.739800',
        //     '106.737100',
        // ];
        // $namaBarat = [
        //     'Iqbal',
        //     'Khalusi',
        //     'Nafal',
        //     'Amelia',
        //     'Andi',
        //     'Najma',
        //     'Yoga',
        //     'Cania',
        //     'Miqdad',
        //     'Riska',
        // ];
        // foreach ($namaBarat as $index => $nama) {
        //     DataTarget::create([
        //         'nama' => $nama,
        //         'alamat' => 'Pamulang Barat',
        //         'foto_bersama' => '',
        //         'user_survey_id' => '8',
        //         'latitude' => $latitudes[$index],
        //         'longitude' => $longitudes[$index],
        //         'provinsi_id' => '36',
        //         'kota_id' => '3674',
        //         'kecamatan_id' => '3674030',
        //         'desa_id' => '49218',
        //     ]);
        // }    
        
        // $namaTimur = [
        //     'Adit',
        //     'Maghfira',
        //     'Hendra',
        //     'Murtinah',
        //     'Joni',
        //     'Okem',
        //     'Dayat',
        //     'Maura',
        //     'Dandi',
        //     'Nabila',
        // ];
        
        // $latitudes = [
        //     '-6.343500',
        //     '-6.344300',
        //     '-6.345100',
        //     '-6.346000',
        //     '-6.343900',
        //     '-6.344800',
        //     '-6.345600',
        //     '-6.343700',
        //     '-6.345000',
        //     '-6.344200',
        // ];
        
        // $longitudes = [
        //     '106.748500',
        //     '106.749200',
        //     '106.747800',
        //     '106.748900',
        //     '106.746700',
        //     '106.750000',
        //     '106.748300',
        //     '106.747200',
        //     '106.749500',
        //     '106.748100',
        // ];
        
        // foreach ($namaTimur as $index => $nama) {
        //     DataTarget::create([
        //         'nama' => $nama,
        //         'alamat' => 'Pamulang Barat',
        //         'foto_bersama' => '',
        //         'user_survey_id' => '6',
        //         'latitude' => $latitudes[$index],
        //         'longitude' => $longitudes[$index],
        //         'provinsi_id' => '36',
        //         'kota_id' => '3674',
        //         'kecamatan_id' => '3674030',
        //         'desa_id' => '49219',
        //     ]);
        // } 
        // $namaBenda = [
        //     'Doni',
        //     'Nopi',
        //     'Malik',
        //     'Asmawati',
        //     'Andre',
        //     'Naria',
        //     'Mulyono',
        //     'Oni',
        //     'Ridwan',
        //     'Dela',
        // ];
        
        // $latitudes = [
        //     '-6.341893',
        //     '-6.343193',
        //     '-6.343593',
        //     '-6.341993',
        //     '-6.342293',
        //     '-6.343493',
        //     '-6.343093',
        //     '-6.342493',
        //     '-6.341793',
        //     '-6.342693',
        // ];
        
        // $longitudes = [
        //     '106.716679',
        //     '106.717279',
        //     '106.714879',
        //     '106.714979',
        //     '106.717479',
        //     '106.716079',
        //     '106.715179',
        //     '106.714579',
        //     '106.715579',
        //     '106.716979',
        // ];
        
        
        // foreach ($namaBenda as $index => $nama) {
        //     DataTarget::create([
        //         'nama' => $nama,
        //         'alamat' => 'Pondok Benda',
        //         'foto_bersama' => '',
        //         'user_survey_id' => '7',
        //         'latitude' => $latitudes[$index],
        //         'longitude' => $longitudes[$index],
        //         'provinsi_id' => '36',
        //         'kota_id' => '3674',
        //         'kecamatan_id' => '3674030',
        //         'desa_id' => '49217', // Contoh ID desa Pondok Benda
        //     ]);
        // }
        
        // DataTarget::where('alamat', 'pondok benda')->delete();

        // $namaBendaBaru = [
        //     'Azzumar',
        //     'Dian',
        //     'Fian',
        //     'Evril',
        //     'Machdi',
        //     'Gabriel',
        //     'Aldi',
        //     'Ajeng',
        //     'Dani',
        //     'Maya',
        // ];
        
        // $latitudes = [
        //     '-6.333984',
        //     '-6.335184',
        //     '-6.334884',
        //     '-6.336684',
        //     '-6.336484',
        //     '-6.337084',
        //     '-6.337384',
        //     '-6.334784',
        //     '-6.333784',
        //     '-6.335684',
        // ];
        
        // $longitudes = [
        //     '106.720825',
        //     '106.717825',
        //     '106.723125',
        //     '106.717725',
        //     '106.723325',
        //     '106.718525',
        //     '106.722225',
        //     '106.718625',
        //     '106.722625',
        //     '106.723025',
        // ];
        
        // foreach ($namaBendaBaru as $index => $nama) {
        //     DataTarget::create([
        //         'nama' => $nama,
        //         'alamat' => 'Benda Baru',
        //         'foto_bersama' => '',
        //         'user_survey_id' => '4',
        //         'latitude' => $latitudes[$index],
        //         'longitude' => $longitudes[$index],
        //         'provinsi_id' => '36',
        //         'kota_id' => '3674',
        //         'kecamatan_id' => '3674030',
        //         'desa_id' => '49224', // Contoh ID desa Benda Baru
        //     ]);
        // }

        // DataTarget::where('alamat', 'kedaung')->delete();
        // $namaKedaung = [
        //     'Leo',
        //     'Novi',
        //     'Denis',
        //     'Marlena',
        //     'Alan',
        //     'Hamidah',
        //     'Luqman',
        //     'Halimah',
        //     'Galang',
        //     'Nia',
        // ];
        // $latitudes = [
        //     '-6.314779',
        //     '-6.315479',
        //     '-6.317079',
        //     '-6.318279',
        //     '-6.318579',
        //     '-6.318379',
        //     '-6.317779',
        //     '-6.316379',
        //     '-6.315179',
        //     '-6.314979',
        // ];
        
        // $longitudes = [
        //     '106.744024',
        //     '106.739924',
        //     '106.739824',
        //     '106.740524',
        //     '106.742324',
        //     '106.744224',
        //     '106.745024',
        //     '106.745224',
        //     '106.744624',
        //     '106.742624',
        // ];        
        // foreach ($namaKedaung as $index => $nama) {
        //     DataTarget::create([
        //         'nama' => $nama,
        //         'alamat' => 'Kedaung',
        //         'foto_bersama' => '',
        //         'user_survey_id' => '9',
        //         'latitude' => $latitudes[$index],
        //         'longitude' => $longitudes[$index],
        //         'provinsi_id' => '36',
        //         'kota_id' => '3674',
        //         'kecamatan_id' => '3674030',
        //         'desa_id' => '49222', // Contoh ID desa Kedaung
        //     ]);
        // } 
    }
}
