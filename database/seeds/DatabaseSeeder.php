<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Domain\Models\User\Avatar\DefaultAvatar;

class DatabaseSeeder extends Seeder
{
    /**
     * データベース初期値設定実行.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //region キャラクター作成

        $sato = User::create([
            'url_name' => 'sato',
            'email' => 'sato@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Yoshihiro',
            'description' => '勉強するデブ',
            'avatar' => new DefaultAvatar(),
        ]);

        $makino = User::create([
            'url_name' => 'makino',
            'email' => 'makino@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Shinichi',
            'description' => '勉強するヒョロガリ',
            'avatar' => new DefaultAvatar(),
        ]);

        $tsukinari = User::create([
            'url_name' => 'tsukinari',
            'email' => 'kenta.tsukinari@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Kenta',
            'description' => '結婚したいです',
            'avatar' => new DefaultAvatar(),
        ]);

        $kaneshima = User::create([
            'url_name' => 'kaneshima',
            'email' => '	yushi.kaneshima@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Yushi',
            'avatar' => new DefaultAvatar(),
        ]);

        $inoue = User::create([
            'url_name' => 'inoue',
            'email' => 'eri.inoue@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Eri',
            'avatar' => new DefaultAvatar(),
        ]);

        $imai = User::create([
            'url_name' => 'imai',
            'email' => 'imai@example.co.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Hiroki',
            'avatar' => new DefaultAvatar(),
        ]);

        //endregion

        //region 人間関係作成

        $sato->follow($makino);
        $sato->follow($inoue);

        $tsukinari->follow($kaneshima);
        $tsukinari->follow($inoue);

        $kaneshima->follow($sato);
        $kaneshima->follow($tsukinari);
        $kaneshima->follow($makino);
        $kaneshima->follow($inoue);

        $inoue->follow($makino);

        //endregion

        //region つぶやき作成

        $sato->tweet('仕事楽しい');
        sleep(1);
        $sato->tweet('なんてすばらしい会社なんだろう');
        sleep(1);
        $sato->tweet('給料5倍ぐらいにならないかな');
        sleep(1);

        $makino->tweet('早く帰りたい');
        sleep(1);
        $makino->tweet('PHP最高です');
        sleep(1);
        $makino->tweet('PHP以外考えられない');
        sleep(1);

        $tsukinari->tweet('彼女がブーケ受け取りました');
        sleep(1);
        $tsukinari->tweet('結婚します');
        sleep(1);

        $kaneshima->tweet('設計書楽しいです');

        $inoue->tweet('今日からインターンです');
        sleep(1);
        $inoue->tweet('緊張します');

        //endregion
    }
}
