<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f=Faker\Factory::create();
        for ($i=4; $i < 32; $i++) { 
           $var= $f->numberBetween(50,12000);
       
        Product::create([
            
            'name' => $f->sentence(5),
            'image_name' => "1.jpg",
            'description' => $f->text,
            'colors' => $f->hexcolor.','.$f->hexcolor.','.$f->hexcolor,
            'price' => $var,
            'discount'=>$f->numberBetween($var-30,$var-5),
            'stock' =>$f->numberBetween(20,5000),
            'tag' =>$f->sentence(7),
            'category_id'=>$f->numberBetween(1,5),
        ]);
      }
    }
}
