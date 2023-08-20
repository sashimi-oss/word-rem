<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
                'title' => '網膜',
                'body' => '視細胞の集まり、光を神経信号に変換',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1,
         ]);
    }
}
