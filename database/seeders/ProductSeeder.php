<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timestamp=Carbon::now()->timestamp;
        $datas=[
            [
                'id'=>Str::uuid(),
                'category_id'=>Category::where('category_name','CD')->first()->id,
                'product_name'=>'hololive IDOL PROJECT『Bouquet』',
                'product_img'=>'1.png',
                'product_price'=>28.89,


            ], [
                'id'=>Str::uuid(),
                'category_id'=>Category::where('category_name','CD')->first()->id,
                'product_name'=>'Hoshimachi Suisei 1st Album “Still Still Stellar”',
                'product_img'=>'2.png',
                'product_price'=>28.89,
            ], [
                'id'=>Str::uuid(),
                'category_id'=>Category::where('category_name','Merch')->first()->id,
                'product_name'=>'hololive English -Myth- New Outfit Celebration',
                'product_img'=>'3.png',
                'product_price'=>26.26,
            ], [
                'id'=>Str::uuid(),
                'category_id'=>Category::where('category_name','Voice')->first()->id,
                'product_name'=>'hololive Christmas Voice Collections 2021',
                'product_img'=>'4.png',
                'product_price'=>8.75,
            ], [
                'id'=>Str::uuid(),
                'category_id'=>Category::where('category_name','CD')->first()->id,
                'product_name'=>'Tokoyami Towa 1st EP “Scream”',
                'product_img'=>'5.png',
                'product_price'=>19.26,
            ]

        ];
        foreach($datas as $d){
            $model=new Product();
            $model->id=$d['id'];
            $model->category_id=$d['category_id'];
            $model->product_name=$d['product_name'];
            $model->product_img=$d['product_img'];
            $model->product_price=$d['product_price'];
            $model->save();
        }
    }
}
