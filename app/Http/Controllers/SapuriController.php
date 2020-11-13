<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//追記
use App\Sapuri;

class SapuriController extends Controller
{
    public function index(Request $request)
    {   //News::all()はEloquentを使った、全てのsapuriテーブルを取得するというメソッドです。
        $posts = Sapuri::all()->sortByDesc('updated_at');
                                 //sortByDescはカッコの中の値（キー）でソートするためのメソッドです → 「投稿日時順に新しい方から並べる」という並べ換えをしている
        if (count($posts) > 0) {
            $headline = $posts->shift();//shift()メソッドは、配列の最初のデータを削除し、その値を返すメソッドです。
        } else {                       //$postsは代入された最新のサプリ投稿データ以外の投稿データが格納されていることになります。
            $headline = null;
        }
        
        // sapuri/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('sapuri.index', ['headline' => $headline, 'posts' => $posts]);
    }
}