<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $subCategories = [

            [
                'en'=> 'Technology1',
                'ar'=> 'التكنولوجيا1',
                'category_id' => 1 
            ],
            [
                'en'=> 'Technology1',
                'ar'=> 'التكنولوجيا2',
                'category_id' => 1 
            ],
            [

                'en'=> 'Health1',
                'ar'=> '1الصحة',
                'category_id' => 2
            ],
            [

                'en'=> 'Health2',
                'ar'=> '2الصحة',
                'category_id' => 2
            ],
            [

                'en'=> 'Science1',
                'ar'=> '1العلوم',
                'category_id' => 3
            ],
            [

                'en'=> 'Science2',
                'ar'=> '2العلوم',
                'category_id' => 3
            ],
            [

                'en'=> 'Sport1',
                'ar'=> '1الرياضة',
                'category_id' => 4
            ],

            [

                'en'=> 'Sport2',
                'ar'=> '2الرياضة',
                'category_id' => 4
            ],
      ];
        foreach ($subCategories as $subcategory) {
            SubCategory::create(
                [
                'name' => [
                    'en' => $subcategory['en'],
                    'ar' => $subcategory['ar']
                ],'category_id' => $subcategory['category_id']
                ],
            );
        }
    }
}
