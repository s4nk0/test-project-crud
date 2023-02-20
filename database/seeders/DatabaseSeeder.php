<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
        ]);

        $products = Product::factory()
            ->count(1000)
            ->create();
        Order::factory()
            ->count(1000)
            ->create()->each(function ($order) use ($products){
                foreach ($products->random(rand(1,5)) as $product){
                    $arr[$product->id]= ['count'=>rand(1,20)];
                }
                $order->products()->sync($arr);
            });


    }
}
