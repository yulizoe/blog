<?php
use Illuminate\Database\Seeder;
use App\Admin;


class AdminTableSeeder extends Seeder{
    public function run(){

        //清空原始数据
        DB::table('admins')->delete();

        //创建新纪录
        Admin::create([
            'email' => 'yuli@126.com',
            'password' => 'yuliyuli',
            
            ]);

    }

}