<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Responden;

class RespondenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Responden::insert(
            [
                [

                    'user' => '16',
                    'as' => 'Mahasiswa',

                ], [

                    'user' => '17',
                    'as' => 'Alumni',

                ], [

                    'user' => '18',
                    'as' => 'Calon Mahasiswa',

                ],
            ]
        );
    }
}
