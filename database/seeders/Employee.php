<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Employee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('employees')->insert([
        'name'=>'Beby Nosderita Lahagu',
        'jeniskelamin'=>'pria',
        'notelpon'=> '082361998907',
       ]);
    }
}
