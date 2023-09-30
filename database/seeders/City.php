<?php

namespace Database\Seeders;

use App\Models\City as ModelsCity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class City extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsCity::create([
            'name' => 'Dhaka',
        ]);

        ModelsCity::create([
            'name' => 'Gazipur',
        ]);

        ModelsCity::create([
            'name' => 'Nārāyanganj',
        ]);
        
        ModelsCity::create([
            'name' => 'Khulna',
        ]);
    }
}
