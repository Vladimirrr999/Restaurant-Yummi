<?php

namespace Database\Seeders;

use App\Models\CustomerCounter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $nizCounter = [
        [
            "statCounter" => '232',
            "title" => "Clients"
        ],
        [
            "statCounter" => '521',
            "title" => 'Projects'
        ],
        [
            "statCounter" => '1453',
            "title" => "Hours of Support"
        ],
        [
            "statCounter" => '200',
            "title" => 'Different dishes'
        ]
    ];

    public function run(): void
    {
        foreach($this->nizCounter as $n){
            CustomerCounter::create([
                'statCounter' => $n['statCounter'],
                'title' => $n['title']
            ]);
        }
    }
}
