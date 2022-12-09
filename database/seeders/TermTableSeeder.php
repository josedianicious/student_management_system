<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::create([
            'term'=>"One"
        ]);
        Term::create([
            'term'=>"Two"
        ]);
        Term::create([
            'term'=>"Three"
        ]);
    }
}
