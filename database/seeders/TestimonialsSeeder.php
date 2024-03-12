<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $testimonials = [
        [
            "quotation" => "Such a great atmosphere and very fine place for eating!",
            "name" => "Saul Goodman",
            "role" => "Ceo & Founder",
            "img" => "assets/img/testimonials/testimonials-1.jpg"
        ],
        [
            "quotation" => "I was there couple of times and everything is great, starting from food all the way to service",
            "name" => "Maya Shirel",
            "role" => "Bank associate",
            "img" => "assets/img/testimonials/testimonials-2.jpg"
        ],
        [
            "quotation" => "I enjoyed eating food and specialities, especially Italian kitchen",
            "name" => "Nebojsa Dobic",
            "role" => "Programmer",
            "img" => "assets/img/testimonials/testimonials-3.jpg"
        ],
        [
            "quotation" => "Best restaurant ever!",
            "name" => "Nina Badic",
            "role" => "Barista",
            "img" => "assets/img/testimonials/testimonials-4.jpg"
        ]
    ];
    public function run(): void
    {
        foreach($this->testimonials as $t){
            Testimonial::create([
                'quotation' => $t['quotation'],
                'name' => $t['name'],
                'role' => $t['role'],
                'img' => $t['img']
            ]);
        }
    }
}
