<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //User テーブル全けし
      Message::truncate();

      $faker = Faker\Factory::create('ja_JP');
      foreach (range(0, 10) as $num) {
        DB::table('messages')->insert([
          'user_id' => $num,
          'thread_id' => rand(1,20),
          'text' => $faker->realText($maxNbChars = rand(10,50), $indexSize = 2),
          'created_at' => date('Y/m/d H:i:s'),
          'updated_at' => date('Y/m/d H:i:s'),
        ]);
      }

    }
}
