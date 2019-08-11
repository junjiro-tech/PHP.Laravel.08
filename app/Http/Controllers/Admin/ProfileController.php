<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Profilehistory;
use Carbon\Carbon;
class ProfileController extends Controller
{
  public function add()
  {
      return view('admin.profile.create');
  }
  
 
 
 
 public function create(Request $request)
  {
    $this->validate($request, Profile::$rules);
      $profile = new Profile;
      $form = $request->all();
      unset($form['_token']);
      $profile->fill($form)->save();
      
      return redirect('admin/profile/create');
  }
 
 
 
 public function edit(Request $request)
  {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
  }
  
  
  
 
  
 public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    if($cond_title !=''){
      $posts = Profile::where('title',$cond_title)->get();
      } else{
        $posts = Profile::all();
      }
  return view('admin.profile.index',['posts'=>$posts, 'cond_title'=>$cond_title]);    
  }
  
  
 
 
  
 public function update(Request $request)
  {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();
      unset($profile_form['_token']);
      
      $profile->fill($profile_form)->save();
      $profilehistory = new Profilehistory;
      $profilehistory->profile_id = $profile->id;
      $profilehistory->edited_at = Carbon::now();
      $profilehistory->save();
      
      return redirect('admin/profile');
  }
  
  
  
  
  
  public function delete(Request $request)
  {
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('admin/profile/');
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
