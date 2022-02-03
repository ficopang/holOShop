<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas=[
            [
                'id'=>Str::uuid(),
                'category_name'=>'CD',
            ], [
                'id'=>Str::uuid(),
                'category_name'=>'Merch',
            ], [
                'id'=>Str::uuid(),
                'category_name'=>'Voice',
            ]

        ];
        foreach($datas as $d){
            $model=new Category();
            $model->id=$d['id'];
            $model->category_name=$d['category_name'];
            $model->save();
        }
    }
}
