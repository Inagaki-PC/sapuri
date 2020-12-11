<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
//以下を追記することでProfile Modelが扱えるようになる
use App\Sapuri;
// 以下を追記
use App\History;
// 以下を追記
use Carbon\Carbon;

class SapuriController extends Controller
{
    // 以下を追記
    public function add ()
    {
        return view('admin.sapuri.create');
    }
    
      // 以下を追記
    public function create(Request $request)
    {
        
        // 以下を追記
        // Varidationを行う
        $this->validate($request, Sapuri::$rules);
        $sapuri = new Sapuri;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        //データベースに保存する
        $sapuri->user_id = Auth::id();
        $sapuri->fill($form);
        $sapuri->save();
        // admin/sapuri/createにリダイレクトする→編集一覧に飛ぶように修正
        
        return redirect('admin/sapuri/')->with('new_message', '新規登録しました！');
    }  
    
    // 以下を追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            //[$cond_title]のみだと全文一致検索なので→[$cond_title]→['like','%'.$cond_title.'%']に変更してキーワード検索仕様になるよう実装
            $posts = Sapuri::where('sapuri_name', 'like','%'.$cond_title.'%')->get();
        } else {
            // それ以外はすべてのサプリ情報を取得する
            //$posts = Sapuri::all();　→　すべてのサプリ情報を参照してしまうので、下記whereメソッドでユーザーid毎に管理するように変更
            //以下はユーザーID毎に保存内容を変更するように追記
            $posts = Sapuri::where('user_id', Auth::id())->get();
        }
        
        return view('admin.sapuri.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit (Request $request)
    {
        // Sapuri Modelからデータを取得する
        $sapuri = Sapuri::find($request->id);
        if (empty($sapuri)) {
            abort(404);
        }
        return view('admin.sapuri.edit', ['sapuri_form' => $sapuri]);
    }
    
    public function update (Request $request)
    {
        // Validationをかける
        $this->validate($request, Sapuri::$rules);
        // News Modelからデータを取得する
        $sapuri = Sapuri::find($request->id);
        // 送信されてきたフォームデータを格納する
        $sapuri_form = $request->all();
        unset($sapuri_form['_token']);

        // 該当するデータを上書きして保存する
        $sapuri->fill($sapuri_form)->save();
        
        // 以下を追記
        $history = new History;
        $history->sapuri_id = $sapuri->id;
        $history->edited_at = Carbon::now('Asia/Tokyo');
        $history->save();
        
        return redirect('admin/sapuri')->with('update_message', '更新しました！'); //引数に日本時間を指定 → 編集履歴が日本時間になる
    }

    // 以下を追記
    public function delete(Request $request)
    {
        // 該当するSapuri Modelを取得
        $sapuri = Sapuri::find($request->id);
        // 削除する
        $sapuri->delete();
        return redirect('admin/sapuri/')->with('delete_message', '削除しました！');
    }
    
    // カレンダーを表示する
        public function calendar1 ()
    {
        return view('admin.sapuri.calendar1');
    }
    
    public function calendar2 ()
    {
        return view('admin.sapuri.calendar2');
    }
}
