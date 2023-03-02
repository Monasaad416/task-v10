<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'en'=> 'Technology',
                'ar'=> 'التكنولوجيا'
            ],
            [

                'en'=> 'Health',
                'ar'=> 'الصحة'
            ],
            [

                'en'=> 'Science',
                'ar'=> 'العلوم'
            ],
            [

                'en'=> 'Sport',
                'ar'=> 'الرياضة'
            ],
      ];
        foreach ($categories as $category) {
            Category::create(
                [
                'name' => [
                    'en' => $category['en'],
                    'ar' => $category['ar']
                ],
                ],
            );
        }
    }
}
