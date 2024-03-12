<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $nizChefs = [
        [
            "delay" => "300",
            "img" => "chefs-1.jpg",
            "name" => "William Anderson",
            "jobDesc" => "cook",
            "about" => "I love to cook, im the main chef of the kitchen."
        ],
        [
            "delay" => "200",
            "img" => "chefs-2.jpg",
            "name" => "Mendela Kerson",
            "jobDesc" => "executive chef",
            "about" => "I can prepare any kind of meal you wish."
        ],
        [
            "delay" => "100",
            "img" => "chefs-3.jpg",
            "name" => "Steve Maken ",
            "jobDesc" => "salad chef",
            "about" => "Any kind of salads you like, i do."
        ]
    ];
    public function run(): void
    {
        foreach($this->nizChefs as $n){
            Chef::create([
                'delay' => $n['delay'],
                'img' => $n['img'],
                'name' => $n['name'],
                'jobDesc' => $n['jobDesc'],
                'about' => $n['about']
            ]);
        }
    }
}
