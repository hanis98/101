<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
       	'Pejabat Yang Dipertua',
        'Korporat Dan Perhubungan Awam',
        'Undang-Undang',
        'Audit Dalam',
        'Kesihatan Awam',
        'Teknologi Maklumat',
        'Kawalan Bangunan',
        'Khidmat Pengurusan',
        'Pengurusan Kontrak',
        'Landskap',
         'Perancang Bandar',
         'Penguatkuasaan',
         'Industri Dan Penyelengaraan Aset',
         'Pembangunan Masyarakat',
         'Penilaian Dan Pengurususan Harta',
         'Yayasan Pasir Gudang',
         'Kaunter Bersepadu',
         'Kewangan',
         'Kejuruteraan',
         'Kelab Sukan Dan Kebajikan Mppg',
         'Pagema',
         'Koperasi Wawasan Mppg Johor',
         'Anulae'
,
       	];

       	foreach ($data as $datum) {	
       		\App\Models\Department::create([
				'name' => $datum,
				'code'=> kebab_case($datum),
			]);
		}
	}
}


