<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $menu = [
        [
            'bs-target' => '#menu-starters',
            'name' => 'Starters'
        ],
        [
            'bs-target' => '#menu-breakfast',
            'name' => 'Breakfast'
        ],
        [
            'bs-target' => '#menu-lunch',
            'name' => 'Lunch'
        ],
        [
            'bs-target' => '#menu-dinner',
            'name' => 'Dinner'
        ]
    ];
    public function run(): void
    {
        foreach($this->menu as $m){
            Menu::create([
                'bs-target' => $m['bs-target'],
                'name' => $m['name']
            ]);
        }
    }
}
