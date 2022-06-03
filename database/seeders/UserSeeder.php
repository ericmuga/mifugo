<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')
           ->insert(['name'=>'Eric',
                     'email'=>'eric.muga@gmail.com',
                     'phone'=>'0720816931',
                     'password'=>bcrypt('qwert123.'),
                    'field_id'=>Field::first()->id
                   ]);

                   DB::table('users')
                   ->insert(['name'=>'Admin',
                             'email'=>'admin@mifugoapp.com',
                             'phone'=>'0720000000',
                             'password'=>bcrypt('admin123.'),
                            'field_id'=>Field::first()->id
                           ]);
    }
}
