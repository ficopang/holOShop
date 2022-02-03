<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'role_id'=>'1',
                'username'=>'test1',
                'email_verified_at'=>Carbon::now(),
                'email'=>'test1@gmail.com',
                'password'=>bcrypt('Test1111')


            ], [
                'id'=>Str::uuid(),
                'role_id'=>'2',
                'username'=>'admin',
                'email_verified_at'=>Carbon::now(),
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin123')
            ]

        ];
        foreach($datas as $d){
            $model=new User();
            $model->id=$d['id'];
            $model->role_id=$d['role_id'];
            $model->username=$d['username'];
            $model->email=$d['email'];
            $model->email_verified_at=$d['email_verified_at'];
            $model->password=$d['password'];
            $model->save();
        }
    }
}
