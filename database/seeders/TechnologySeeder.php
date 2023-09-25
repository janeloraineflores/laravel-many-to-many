<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Technology;

// Helpers
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

       
        for ($i = 0; $i < 10 ; $i++) { 
            $title = substr(fake()->word(), 0, 255);
            $slug = str()->slug($title);

            Technology::create([
                'title' => $title,
                'slug' => $slug,
                
            ]);
        }
        
      
    }
}