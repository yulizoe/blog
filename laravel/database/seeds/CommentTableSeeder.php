<?php
use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder{
    public function run(){

        //清空原始数据
        DB::table('comments')->delete();

        //创建新纪录
        // Comment::create([
        //     'bid' => '2',
        //     'author' => 'yuli',
        //     'ccontent' => 'this is first comment'
        //     ]);


        for ($i=1; $i < 4; $i++) { 
                     Comment::create([
                    'id' => $i,
                    'bid' => $i,
                    'author' => 'yuli'.$i,
                    'ccontent' => 'this is comment'.$i
                    ]);

                }

    }

}