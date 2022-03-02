<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'Feeding'],
            ['name'=>'Breeding'],
            ['name'=>'Spacing'],
            ['name'=>'Medication'],
            ['name'=>'Feed Formulation'],
            ['name'=>'Weaning'],
            ['name'=>'Curling']
        ];
        DB::table('dimensions')
          ->insert($data);
    }
}
