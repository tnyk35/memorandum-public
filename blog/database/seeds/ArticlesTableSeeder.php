<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Article::create(
                [
                    'title' => 'テスト' . $i,
                    'body' => '内容がはいります。てすと' . $i,
                    'url' => 'test' . $i,
                    'release_date' => now(),
                ]
            )->save();
        }
    }
}
