<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * データベース初期値設定実行
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        #region キャラクター作成

        $sato = User::create([
            'url_name' => 'sato',
            'email' => 'sato@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Yoshihiro',
            'description' => 'PHPはいいよ',
            'avatar' => 'images/no-thumb.png',
        ]);

        $makino = User::create([
            'url_name' => 'makino',
            'email' => 'makino@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Shinichi',
            'description' => 'Javaはいいよ',
            'avatar' => 'images/no-thumb.png',
        ]);

        $tsukinari = User::create([
            'url_name' => 'tsukinari',
            'email' => 'kenta.tsukinari@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Kenta',
            'description' => '結婚したいです',
            'avatar' => 'images/no-thumb.png',
        ]);

        $nagai = User::create([
            'url_name' => 'nagai',
            'email' => '	hayato.nagai@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Hayato',
            'avatar' => 'images/no-thumb.png',
        ]);

        $inoue = User::create([
            'url_name' => 'inoue',
            'email' => 'eri.inoue@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Eri',
            'avatar' => 'images/no-thumb.png',
        ]);

        $iwasaki = User::create([
            'url_name' => 'iwasaki',
            'email' => 'iwasaki@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Yuuki',
            'avatar' => 'images/no-thumb.png',
        ]);

        #endregion

        #region 人間関係作成

        $sato->following()->attach($makino->id);
        $sato->following()->attach($inoue->id);

        $tsukinari->following()->attach($nagai->id);
        $tsukinari->following()->attach($inoue->id);

        $nagai->following()->attach($sato->id);
        $nagai->following()->attach($tsukinari->id);
        $nagai->following()->attach($makino->id);
        $nagai->following()->attach($inoue->id);

        $inoue->following()->attach($makino->id);

        #endregion

        #region つぶやき作成

        $sato->tweets()->create(['body' => '仕事楽しい']);
        sleep(1);
        $sato->tweets()->create(['body' => 'なんてすばらしい会社なんだろう']);
        sleep(1);
        $sato->tweets()->create(['body' => '給料5倍ぐらいにならないかな']);
        sleep(1);

        $makino->tweets()->create(['body' => 'そろそろインターンだ']);
        sleep(1);
        $makino->tweets()->create(['body' => 'PHP最高です']);
        sleep(1);
        $makino->tweets()->create(['body' => 'PHP以外考えられない']);
        sleep(1);

        $tsukinari->tweets()->create(['body' => '彼女がブーケ受け取りました']);
        sleep(1);
        $tsukinari->tweets()->create(['body' => '結婚します']);
        sleep(1);

        $nagai->tweets()->create(['body' => '設計書楽しいです']);

        $inoue->tweets()->create(['body' => '今日からインターンです']);
        sleep(1);
        $inoue->tweets()->create(['body' => '緊張します']);

        #endregion
    }
}
