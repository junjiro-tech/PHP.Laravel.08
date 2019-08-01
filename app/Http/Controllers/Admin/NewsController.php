<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\News;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }
    
    // 以下を追記
    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, News::$rules);
        
        $news = new News;
        $from = $request->all();
        
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['images'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['_image']);
        
         // データベースに保存する
         $news->fill('form');
         $news->save();
        
    // admin/news/createにリダイレクトする
    return redirect('admin/news/create');
    }


     public function index(Request $request)
     {
         $cond_title = $request->cond_title;
         if($cond_title != '') {
             // 検索されたら検索結果を取得する
             $posts = News::where('title', $cond_title)->get();
         } else {
             // それ以外はすべてのニュースを取得する
             $posts = News::all();
         }
         return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
     }
     
     public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = News::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.news.edit', ['news_form' => $news]);
  }
     
     public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, News::$rules);
      // News Modelからデータを取得する
      $news = News::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      if (isset($news_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
        unset($news_form['image']);
      } elseif (isset($request->remove)) {
        $news->image_path = null;
        unset($news_form['remove']);
      }
      unset($news_form['_token']);
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('admin/news');
  }
}

/*
課題1. データベースとテーブルの関係を説明してください。
エクセルのようなもので一定の規則で整されている表。
縦行：カラム(id.name.birthday,)etc　横行：レコード(1、福田、1月15日)など

課題2. テーブルを作成するときに事前にしなければならないことはなんですか？
SQLコマンドを打って作成しなくてはならない。Laravelでは、migrationを使って自動的にデータベースでテーブルを作成してくれる。

課題3. Validationはどのような役目をしていますか？
バリデーション (validation: 検証) とは主にユーザーの入力情報が正しいかどうかを確かめる処理・機能のことを言う。
何かのサービスを使い始める時、アカウント登録で「パスワードが短すぎる」、「このアカウント名はすでに存在します」など注意されたことはないでしょうか？
これらはバリデーションが行われている一例です。
バリデーションを行えば、Web サービスを矛盾なく動作させるために、ユーザーから情報がちゃんと入力されているのを「入り口」の時点で確かめることができる。

