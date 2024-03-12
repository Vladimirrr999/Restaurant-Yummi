<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $articles = [
        [
            'blockId' => 'menu-starters',
            'category' => 'Starters',
            'src' => 'assets/img/menu/menu-item-1.png',
            'title' => 'Caesar Salad',
            'ingredients' => 'Lettuce, Parmesan Cheese, Croutons, Caesar Dressing',
            'price' => '5.95'
        ],
        [
            'blockId' => 'menu-breakfast',
            'category' => 'Breakfast',
            'src' => 'assets/img/menu/menu-item-2.png',
            'title' => 'Pancakes',
            'ingredients' => 'Flour, Milk, Eggs, Butter, Maple Syrup',
            'price' => '6.50'
        ],
        [
            'blockId' => 'menu-lunch',
            'category' => 'Lunch',
            'src' => 'assets/img/menu/menu-item-3.png',
            'title' => 'Spaghetti Bolognese',
            'ingredients' => 'Spaghetti, Ground Beef, Tomato Sauce, Onion, Garlic',
            'price' => '7.25'
        ],
        [
            'blockId' => 'menu-dinner',
            'category' => 'Dinner',
            'src' => 'assets/img/menu/menu-item-4.png',
            'title' => 'Chicken Tikka Masala',
            'ingredients' => 'Chicken, Yogurt, Tomato Sauce, Cream, Spices',
            'price' => '8.75'
        ],
    ];

    public function run(): void
    {
        foreach ($this->articles as $a) {
            $categoryArray = explode('-', $a['blockId']);
            $categoryName = ucfirst(array_pop($categoryArray));
            $category = Category::firstOrCreate(['name' => $categoryName]);
            Product::create([
                'title' => $a['title'],
                'blockId' => $a['blockId'],
                'ingredients' => $a['ingredients'],
                'price' => $a['price'],
                'src' => $a['src'],
                'category_id' => $category->id
            ]);
        }
    }
}
