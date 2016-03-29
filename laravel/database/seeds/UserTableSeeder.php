<?php
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder{
    public function run(){

        //清空原始数据
        DB::table('users')->delete();



        // for ($i=1; $i < 4; $i++) { 
        //              User::create([
        //             'id' => $i,
        //             'name' => 'yuli'.$i,
        //             'email' => '123'.$i.'@qq.com',
        //             'password' => '123456'.$i

        //             ]);

        //         }

    }

}