<?php

use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Model\Filter::create([
        	'name' => 'sepiaToneImage'
        ]);

        App\Model\Filter::create([
        	'name' => 'roundCorners'
        ]);
    }
}
