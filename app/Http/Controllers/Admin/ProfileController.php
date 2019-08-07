<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Profiles::$rules);
        
        $profile = new Profiles;
        $form = $request->all();
       
      
      $profile->fill($form)->save();
      
      return redirect('admin.profile.create');
    }
        
    
    public function edit()
    {
         return view('admin.profile.edit');
    }
    
    public function update()
    {
         return redirect('admin.profile.edit');
    }
}

/* PHP/Laravel .14の課題
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








//PHP/Laravel08
/*
課題2.Controllerの役割について、説明してください。
model(Datebase)から値を取得し、Viewに渡して表示を更新する。
また、Viewで取得した情報を、modelへ追加、更新、保存する。

課題3.ControllerとRoutingの役割について、説明してください。
Routingはユーザーからのアクセスを受け取り、Controller内のActionへ渡す。
ControllerはViewとModelの間でデータを出し入れしたり生成する。

//課題5.Admin/ProfileControllerに、以下のadd, create, edit, update それぞれのActionを追加してみましょう。
*/
