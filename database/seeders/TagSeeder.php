<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        $tags = [
            ['name' => json_encode(['en' => 'tag_1_en', 'ar' => 'tag_1_ar'])],
            ['name' => json_encode(['en' => 'tag_2_en', 'ar' => 'tag_2_ar'])],
            ['name' => json_encode(['en' => 'tag_3_en', 'ar' => 'tag_3_ar'])],
        ];
        
    
      
        Tag::insert($tags);
    }
}
