<?php

use Illuminate\Database\Seeder;
use App\Thread;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Thread::truncate();

      $list = [
        'BiSH',
        'マカロニえんぴつ',
        'クリープハイプ',
        'あいみょん',
        'ヤバイTシャツ屋さん',
        'King Gnu',
        'SHISHAMO',
        'フレデリック',
        'KEYTALK',
        'KANA-BOON',
        '夜の本気ダンス',
        '緑黄色社会',
        'ハルカミライ',
        'go!go!vanillas',
        '打首獄門同好会',
        'キューソネコカミ',
        'きのこ帝国',
        '神はサイコロを振らない',
        '雨のパレード',
        'おいしくるメロンパン',
        '忘れらんねえよ',
        'ゲスの極み乙女',
        'yonige',
        '四星球',
        '人間椅子',
        '感覚ピエロ',
        'ドラマストア',
        '石崎ひゅーい',
        'CHAI',
        'Official髭男dism',
        'sumika',
        'My Hair is Bad'
      ];

      $faker = Faker\Factory::create('ja_JP');
      foreach ($list as $key => $li) {
        DB::table('threads')->insert([
          'user_id' => $key,
          // 'title' => $faker->realText($maxNbChars = rand(10,25), $indexSize = 2),
          'title' => $list[$key],
          "created_at" => date("Y/m/d H:i:s"),
          "updated_at" => date("Y/m/d H:i:s"),
        ]);
      }

    }
}
