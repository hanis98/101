<?php

use Illuminate\Database\Seeder;

class PeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
       	'Notebook',
       	'LCD Projecter',
       	'Skrin Putih 6x6',
        'Skrin Putih 8x8',
        'Printer',
        'Cable VGA',
        'Cable HDMI',
       	'Broadband ',
       	'Portal WiFi',
        'Monitor',
        'Converter',
       	'Pointer',
        'Barcode Scanner',
        'Televisyen(TV)',
       	
       	];

       	foreach ($data as $datum) {	
       		\App\Models\Peralatan::create([
				'name' => $datum,
				'code'=> kebab_case($datum),
        'quantity' => 2,
			]);
		}
	}
}


