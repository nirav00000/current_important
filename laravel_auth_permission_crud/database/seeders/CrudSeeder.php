<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\crud;


class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        crud::create(['title1' => 'nirav','title2' => 'jobanputra']);

    }
}
