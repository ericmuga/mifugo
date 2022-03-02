<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $data=[
                    ['name'=>'Architect'],
                    ['name'=>'Civil Engineer'],
                    ['name'=>'Artist'],
                    ['name'=>'Graphic Design'],
                    ['name'=>'Fashion Design'],
                    ['name'=>'Photographer'],
                    ['name'=>'Education'],
                    ['name'=>'Human Resource'],
                    ['name'=>'Marketing'],
                    ['name'=>'Accounting'],
                    ['name'=>'Business Management'],
                    ['name'=>'Journalism'],
                    ['name'=>'Public Relations'],
                    ['name'=>'Medicine'],
                    ['name'=>'Mechanical Engineering'],
                    ['name'=>'Agriculture'],
                    ['name'=>'Catering'],
                    ['name'=>'Hospitality'],
                    ['name'=>'Law'],
                    ['name'=>'Sales']
                ];

          DB::table('fields')->insert($data);
    }
}
