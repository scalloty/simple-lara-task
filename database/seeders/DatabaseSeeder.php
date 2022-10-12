<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Product::factory(25)->create();
        Color::factory(100)->create();

        $menus = [
            ['title' => 'Home', 'parent_id' => 0, 'order' => 0, 'route' => '/'],
            ['title' => 'Pages', 'parent_id' => 0, 'order' => 1, 'route' => '/pages'],
            ['title' => 'Our Services', 'parent_id' => 2, 'order' => 2, 'route' => '/our-services'],
            ['title' => 'About', 'parent_id' => 2, 'order' => 3, 'route' => '/about'],
            ['title' => 'About Team', 'parent_id' => 4, 'order' => 3, 'route' => '/about-team'],
            ['title' => 'About Clients', 'parent_id' => 4, 'order' => 3, 'route' => '/about-clients'],
            ['title' => 'Contact Team', 'parent_id' => 5, 'order' => 3, 'route' => '/contact-team'],
            ['title' => 'Contact Clients', 'parent_id' => 6, 'order' => 3, 'route' => '/contact-clients'],
            ['title' => 'Contact', 'parent_id' => 2, 'order' => 4, 'route' => '/contact'],
            ['title' => 'Portfolio', 'parent_id' => 2, 'order' => 4, 'route' => '/portfolio'],
            ['title' => 'Gallery', 'parent_id' => 2, 'order' => 4, 'route' => '/gallery']
        ];

        foreach ($menus as $menu) {
            \App\Models\Menu::Create($menu);
        }

    }
}
