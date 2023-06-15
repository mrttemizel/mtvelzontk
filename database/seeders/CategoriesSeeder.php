<?php

namespace Database\Seeders;

use App\Models\KysCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [   'id' => 1,
                'kys_category_name' => 'Projeler'
            ],
            [   'id' => 2,
                'kys_category_name' => 'Eğitim Faliyetleri'
            ],
            [   'id' => 3,
                'kys_category_name' => 'SSK Faliyetleri'
            ],
            [   'id' => 4,
                'kys_category_name' => 'Kültürel Faliyetler'
            ]
        ];

        foreach ($categories as $categorie) {
            KysCategory::create($categorie);
        }
    }
}
