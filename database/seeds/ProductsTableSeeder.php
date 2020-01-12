<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $p1 = [
          'name' => 'Learn to build websites in HTML5',
          'image' => 'products/book.png',
          'price' => 5000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias beatae corporis dicta, doloribus esse et exercitationem id in incidunt inventore ipsa iure molestiae mollitia nesciunt quae, sit ullam vel.'
        ];

        $p2 = [
            'name' => 'PHP On Laravel Framework',
            'image' => 'products/laravel.png',
            'price' => 10000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias beatae corporis dicta, doloribus esse et exercitationem id in incidunt inventore ipsa iure molestiae mollitia nesciunt quae, sit ullam vel.'
        ];
        App\Product::create($p1);
        App\Product::create($p2);*/

       factory(\App\Product::class, 100)->create();
    }
}

