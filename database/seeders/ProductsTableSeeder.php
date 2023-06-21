<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
        [
            ['name' => "ディストレストレザージャケット",'price' => 275000,'category_id' => 1,'release_date' => new DateTime(),'detail' => 'Usen Studiosのブラックのジャケット。','gender' => 'メンズ'], 
            ['name' => "ルーズフィットデニムジャケット",'price' => 72600,'category_id' => 1,'release_date' => new DateTime(),'detail' => 'Usen Studiosのライトブルーデニムジャケット。','gender' => 'メンズ'], 
            ['name' => "グロウロゴセーター",'price' => 59400,'category_id' => 2,'release_date' => new DateTime(),'detail' => 'Usen Studiosのクルーネックセーター。','gender' => 'メンズ'], 
            ['name' => "クルーネックスウェット",'price' => 46200,'category_id' => 2,'release_date' => new DateTime(),'detail' => 'Usen Studiosのクルーネックスウェット。','gender' => ''], 
            ['name' => "エンブロイダリーロゴセーター ",'price' => 68200,'category_id' => 3,'release_date' => new DateTime(),'detail' => 'Usen Studiosのダークブルークルーネックセーター。','gender' => 'メンズ'], 
            ['name' => "ジャカードロゴセーター",'price' => 64900,'category_id' => 3,'release_date' => new DateTime(),'detail' => 'Usen Studiosのセーター','gender' => 'メンズ'], 
            ['name' => "グロウプリントTシャツ ",'price' => 36300,'category_id' => 4,'release_date' => new DateTime(),'detail' => 'Usen StudiosのTシャツ。','gender' => 'メンズ'], 
            ['name' => "コットンTシャツ ",'price' => 23650,'category_id' => 4,'release_date' => new DateTime(),'detail' => 'Usen StudiosのTシャツ。','gender' => 'メンズ'], 
            ['name' => "ルーズフィットジーンズ ",'price' => 65450,'category_id' => 5,'release_date' => new DateTime(),'detail' => 'Usen Studiosのルーズフィットジーンズ。ミッドブルーの色合いで、ミッドウエスト、長めの丈に仕立てたワイドレッグスタイル。ファイブポケットデザイン。シーズナルガーメントダイ仕上げを施したコットンのリジッドデニムを使用。ダメージ感のあるディテールがポイント。','gender' => 'メンズ'], 
            ['name' => "レギュラーフィットジーンズ",'price' => 50050,'category_id' => 5,'release_date' => new DateTime(),'detail' => 'Usen Studiosのレギュラーフィットジーンズ。ブラックの色合いで、ミッドウエスト、レギュラー丈のストレートレッグスタイル。ファイブポケットデザイン。1996ジーンズには、コットンのリジッドデニムを使用。','gender' => 'メンズ'], 
            ['name' => "テーラードプリーツショートパンツ",'price' => 42900,'category_id' => 6,'release_date' => new DateTime(),'detail' => 'Usen Studiosのブラックのプリーツショートパンツ。ウールブレンド素材を使用。レギュラーフィットスタイル。フロントにアングルポケットと、バックにボタン開閉式ジェッテッドポケットの仕上げ。','gender' => 'メンズ'], 
            ['name' => "コットンスウェットショートパンツ ",'price' => 34100,'category_id' => 6,'release_date' => new DateTime(),'detail' => 'Usen Studiosのスウェットショートパンツ。ブラックの中厚コットンジャージーを使用。伸縮性のあるウエストバンドとロゴプリント入りパッチポケットがポイント。リラックスフィットスタイル。','gender' => 'メンズ'], 
            ['name' => "テーラードトラウザーズ",'price' => 55550,'category_id' => 7,'release_date' => new DateTime(),'detail' => 'Usen Studiosのテーラードスーツトラウザーズ。ブラックのウールブレンド素材を使用。脚部の前後にセンタープレス入り。アングルサイドシームポケットとバックに2つのジェッテッドポケット付き。丈が長めのレギュラーフィットスタイル。','gender' => 'メンズ'], 
            ['name' => "リラックスフィットトラウザーズ ",'price' => 55000,'category_id' => 7,'release_date' => new DateTime(),'detail' => 'Usen Studiosのブラックトラウザーズ。ウールブレンド素材を使用。伸縮性のあるウエストバンドとドローストリングを配したデザイン。サイドポケットとバックパッチポケット付き。長めの丈、リラックスフィット、レギュラーライズウエストのスタイル。','gender' => 'メンズ'], 
            ['name' => "レザーボンバージャケット",'price' => 266200,'category_id' => 1,'release_date' => new DateTime(),'detail' => 'Usen Studiosのレザージャケット。ピグメント加工を施したブラックのレザーを使用。コントラストカラーの襟、カフス、ヘムはリブ編み仕上げ。フロントセンタージッパー開閉スタイル、ウェルトポケットと2つのジッパー付きジェッテッドポケット付き。ウエスト丈、リラックスフィットスタイル。','gender' => 'ウィメンズ'], 
            ['name' => "ダブルブレストトレンチコート",'price' => 188100,'category_id' => 1,'release_date' => new DateTime(),'detail' => 'Usen Studiosのベルト付きダブルブレスト トレンチコート。全体にプリントを施したダークブラウンのコットンを使用。ボタン留めスタイル、ウェルトポケット付き。ミディ丈レギュラーフィットスタイル。','gender' => 'ウィメンズ'], 
            ['name' => "クルーネックセーター",'price' => 46200,'category_id' => 2,'release_date' => new DateTime(),'detail' => 'Usen Studiosのクルーネックセーター。ブラックのコットンブレンド素材を使用。カフスとヘムはリブ編み仕上げ。リラックスフィットのユニセックススタイル。','gender' => 'ウィメンズ'], 
            ['name' => "スタンプロゴスウェットシャツ",'price' => 49500,'category_id' => 2,'release_date' => new DateTime(),'detail' => 'Usen Studiosのクルーネックスウェットシャツ。ブラックの色合いで、フロントのロゴプリントがポイント。リラックスフィットスタイル。リブ編みネック、カフス、ヘムを配したデザイン。ピグメントダイ仕上げを施したコットン製の厚手フリースを使用。','gender' => 'ウィメンズ'], 
            ['name' => "ワイドリブカーディガン ",'price' => 55000,'category_id' => 3,'release_date' => new DateTime(),'detail' => 'Usen Studiosのカーディガン。コールドベージュのリネンブレンド素材を使用した、ワイドリブ編みデザイン。やや透け感のある不均一な風合いがポイント。ウエスト丈に仕上げたフィット感のあるフロントセンターボタン留めスタイル。','gender' => 'ウィメンズ'], 
            ['name' => "スリーブレスTシャツ",'price' => 22000,'category_id' => 4,'release_date' => new DateTime(),'detail' => 'Usen StudiosのスリーブレスTシャツ','gender' => 'ウィメンズ'], 
            ['name' => "ロゴロングスリーブTシャツ ",'price' => 38500,'category_id' => 4,'release_date' => new DateTime(),'detail' => 'Usen StudiosのロングスリーブTシャツ。オプティックホワイトの中厚ジャージーコットンを使用。フロントセンターにAcne Studiosロゴのディテール、リラックスフィットスタイル。','gender' => 'ウィメンズ'], 
            ['name' => "モヘアブレンドセーター",'price' => 51700,'category_id' => 3,'release_date' => new DateTime(),'detail' => 'Usen Studiosのセーター。ソフトな肌触りに仕上げたシャーベットピンクのモヘア＆ウールブレンド素材を使用。透け感のあるオープンニット仕上げ。Vネックラインにチェーンリンク付き、レギュラーフィットスタイル。','gender' => 'ウィメンズ'], 
            ['name' => "リラックスフィットジーンズ",'price' => 53900,'category_id' => 5,'release_date' => new DateTime(),'detail' => 'Usen Studiosのリラックスフィットジーンズ。ブラックの色合いで、ハイウエスト、長めの丈に仕立てたワイドレッグスタイル。ファイブポケットデザイン。2022ジーンズには、コットンのリジッドデニムを使用。','gender' => 'ウィメンズ'], 
            ['name' => "リラックスフィットジーンズ",'price' => 56650,'category_id' => 5,'release_date' => new DateTime(),'detail' => 'Usen Studiosのリラックスフィットジーンズ。ベージュの色合いで、ハイライズウエスト、フルレングスに仕立てたワイドレッグスタイル。ファイブポケットデザイン。2022ジーンズには、コットンのリジッドデニムを使用。','gender' => 'ウィメンズ'], 
            ['name' => "ルーズフィットデニムショートパンツ ",'price' => 57200,'category_id' => 6,'release_date' => new DateTime(),'detail' => 'Usen Studiosのデニムショートパンツ。ライトピンク/グレーの色合いで、コットンのリジッドインディゴデニムを使用。ファイブポケットデザイン。膝下丈、ゆったりとしたユニセックスフィットスタイル。','gender' => 'ウィメンズ'], 
            ['name' => "チェックフランネルショートパンツ",'price' => 34100,'category_id' => 6,'release_date' => new DateTime(),'detail' => 'Usen Studiosのショートパンツ。グレー/ダークグリーンのチェックパターンをあしらったツイル織フランネルコットンを使用。フロントポケットに施したマイクロFaceロゴパッチ刺繍がポイント。伸縮性のあるウエストバンド、サイドシームポケットとバックパッチポケット付き。ミッドライズウエスト、太腿半ば丈に仕上げたレギュラーユニセックスフィットのスタイル','gender' => 'ウィメンズ'], 
            ['name' => "テーラードフレアートラウザーズ ",'price' => 70400,'category_id' => 7,'release_date' => new DateTime(),'detail' => 'Usen Studiosのブラックトラウザーズ。ウールブレンド素材を使用。トップステッチを施したフロントのレッグプリーツとロールアップヘムがポイント。サイドポケットとバックウェルトポケット付き。ミッドウエスト、フレアレッグ、丈が長めのレギュラーフィットスタイル。','gender' => 'ウィメンズ'], 
            ['name' => "リラックスフィットプリントトラウザーズ ",'price' => 73700,'category_id' => 7,'release_date' => new DateTime(),'detail' => 'Usen Studiosのトラウザーズ。光沢仕上げを施したライトブラウンのベルベットを使用。全体にプリント入り、ファイブポケットデザイン。ハイウエスト、ワイドレッグ、丈が長めのリラックスフィットスタイル。','gender' => 'ウィメンズ'], 
           
        ]);
    }
}
