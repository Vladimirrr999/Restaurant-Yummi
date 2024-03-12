<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $categories = ['Starters', 'Breakfast', 'Lunch', 'Dinner'];
    public function run(): void
    {
        for($i=0;$i<count($this->categories);$i++){
            Category::create([
                'name' => $this->categories[$i]
            ]);
        }
    }
}
