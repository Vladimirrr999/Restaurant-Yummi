<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $routes = ['home', 'menu', 'gallery', 'contact', 'author', 'register', 'login'];
    private $names = ['Home', 'Menu', 'Gallery', 'Contact', 'Author', 'Register', 'Login'];
    public function run(): void
    {
        for($i = 0; $i<count($this->names);$i++){
            Navigation::create([
                'route' => $this->routes[$i],
                'name' => $this->names[$i]
            ]);
        }
    }
}
