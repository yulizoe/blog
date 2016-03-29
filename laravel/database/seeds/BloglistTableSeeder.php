<?php
use Illuminate\Database\Seeder;
use App\Bloglist;


class BloglistTableSeeder extends Seeder{
    public function run(){

        //清空原始数据
        DB::table('bloglists')->delete();

        //创建新纪录
        // Bloglist::create([
        //     'btitle' => 'title1',
        //     'author' => 'yuli',
        //     'bcontent' => 'this is first comment',
        //     'bclass' => '1'

        //     ]);

        for ($i=1; $i < 4; $i++) { 
             Bloglist::create([
            'id'=>$i,   
            'btitle' => 'title'.$i,
            'author' => 'yuli'.$i,
            'bcontent' => 'this is content'.$i,
            'bclass' => $i

            ]);
        }



    }





}