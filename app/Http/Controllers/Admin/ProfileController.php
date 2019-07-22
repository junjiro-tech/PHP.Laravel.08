<?php
//PHP/Laravel08

/*
課題1.ControllerとRoutingについてわからないことを書き出してメンターに質問してみましょう。
public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create()
    {
        return redirect('admin.profile.create');
    }
    
    public function edit()
    {
         return view('admin.profile.edit');
    }
    
    public function update()
    {
         return redirect('admin.profile.edit');
課題5でそれぞれのActionを追加したのですが、それぞれがどのような働きをするのかわかりません。

課題2.Controllerの役割について、説明してください。
model(Datebase)から値を取得し、Viewに渡して表示を更新する。
また、Viewで取得した情報を、modelへ追加、更新、保存する。

課題3.ControllerとRoutingの役割について、説明してください。
Routingはユーザーからのアクセスを受け取り、Controller内のActionへ渡す。
ControllerはViewとModelの間でデータを出し入れしたり生成する。
*/

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    
//課題5.Admin/ProfileControllerに、以下のadd, create, edit, update それぞれのActionを追加してみましょう。
    public function add()
    {
        return view('admin.profile.create2');
    }
    
    public function create()
    {
        return redirect('admin.profile.create2');
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

