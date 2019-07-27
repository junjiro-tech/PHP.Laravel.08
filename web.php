<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
     Route::post('news/create', 'Admin\NewsController@create');
     Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
     Route::post('profile/create', 'Admin\ProfileController@create');
     Route::post('profile/edit', 'Admin\ProfileController@update');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
課題1. GET/POSTメソッドについて調べ、どのような違いがあるか説明してください。
getメソッドは、ブラウザにURLを入力しURL内の内容を取り出すための要求。
postメソッドは、URLに対して内容を取り出すだけでなく、クライアントから様々なデータを
送信できる。主にデータを更新するような時に使われる。

課題2. GET/POSTメソッド以外にどのようなメソッドがあるか、またどのように使われるかを
       説明してください。
PUT　・・・　（データの更新に使用）
PATCH　・・・　（ほぼPUTと同じですが、ごく一部を更新）
DELETE　・・・　（データの削除に使用）
OPTIONS　・・・　（使えるメソッド一覧を表示)

課題3. routes/web.php を編集して、 admin/profile/create に postメソッドでアクセスしたら ProfileController の
       create Action に割り当てるように設定してください。
上記記載

課題4. resources/views/admin/profile/create.blade.php を編集して、氏名(name)、
       性別(gender)、趣味(hobby)、自己紹介欄(introduction)を入力するフォームを
       作成してください。また、formの送信先(<form action=”この部分”>)を、
       Admin\ProfileController の create Action に指定してください。
       (ヒント: resources/views/admin/news/create.blade.php)