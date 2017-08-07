<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Domain\Models\User\Avatar\FilePath;

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
            'email' => 'sato@asia-quest.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Yoshihiro',
            'description' => '勉強するデブ',
            'avatar' => FilePath::default(),
        ]);

        $makino = User::create([
            'url_name' => 'makino',
            'email' => 'makino@asia-quest.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Shinichi',
            'description' => '勉強するヒョロガリ',
            'avatar' => FilePath::default(),
        ]);

        $tsukinari = User::create([
            'url_name' => 'tsukinari',
            'email' => 'kenta.tsukinari@asia-quest.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Kenta',
            'description' => '結婚したいです',
            'avatar' => FilePath::default(),
        ]);

        $kaneshima = User::create([
            'url_name' => 'kaneshima',
            'email' => '	yushi.kaneshima@asia-quest.jp',
            'password' => bcrypt('password'),
            'display_name' => 'Yushi',
            'avatar' => FilePath::default(),
        ]);

        $nishio = User::create([
            'url_name' => 'nishio',
            'email' => 'nishio@asia-quest.jp',
            'password' => bcrypt('password'),
            'display_name' => 'kento',
            'avatar' => FilePath::default(),
        ]);

        $imai = User::create([
            'url_name' => 'imai',
            'email' => 'imai@asia-quest.jp',
            'password' => bcrypt('password'),
            'display_name' => 'hiroki',
            'avatar' => FilePath::default(),
        ]);

        #endregion

        #region 人間関係作成

        $sato->follow($makino);
        $sato->follow($nishio);

        $tsukinari->follow($kaneshima);
        $tsukinari->follow($nishio);

        $kaneshima->follow($sato);
        $kaneshima->follow($tsukinari);
        $kaneshima->follow($makino);
        $kaneshima->follow($nishio);

        $nishio->follow($makino);

        #endregion

        #region つぶやき作成

        $sato->tweet('仕事楽しい');
        $sato->tweet('なんてすばらしい会社なんだろう');
        $sato->tweet('給料5倍ぐらいにならないかな');

        $makino->tweet('早く帰りたい');
        $makino->tweet('PHP最高です');
        $makino->tweet('PHP以外考えられない');

        $tsukinari->tweet('彼女がブーケ受け取りました');
        $tsukinari->tweet('結婚します');

        $kaneshima->tweet('設計書楽しいです');

        #endregion
    }
}
