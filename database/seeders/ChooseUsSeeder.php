<?php

namespace Database\Seeders;

use App\Models\ChooseUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $nizBlokova = [
        [
            "icon" => "bi bi-clipboard-data",
            "title" => "Nice place for dinning",
            "text" => "One of the reasons to take over your girl or family and have a beautifull enterier while dinning",
            "delayTime" => "200"
        ],
        [
            "icon" => "bi bi-gem",
            "title" => "best Service",
            "text" => "If you want to enjoy with classy service and our top tier bartenders, with good quality food, this is
            right place for You!",
            "delayTime" => "300"
        ],
        [
            "icon" => "bi bi-inboxes",
            "title" => "Always keeping fresh",
            "text" => "Everything we serve and each meal is story for itself, we do have 1 michelin star and growing up more!",
            "delayTime" => "400"
        ]
    ];
    public function run(): void
    {
        foreach ($this->nizBlokova as $n) {
            ChooseUs::create([
                'icon' => $n['icon'],
                'title' => $n['title'],
                'text' => $n['text'],
                'delayTime' => $n['delayTime']
            ]);
        }
    }
}
