<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class memberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('membres')->insert([
            'nom' => 'Doe',
            'prenom' => 'Doe',
            'email' => 'doe@doe.com',
            'ville' => 'New York',
            'pays' => 'United States',
            'date' => Carbon::now()->toDateString(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
