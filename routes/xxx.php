<?php 
/*
課題1. URLとControllerやActionを紐付ける機能を何といいますか？
Routing

課題2. あなたが考える、group化をすることのメリットを考えてみてください。
・別グループと区別をつけやすい
・似た項目をまとめる事ができる。例えば違うcontrollerを使用してもadminの中身を変えるだけで
　使用できるなど


課題3. 「http://XXXXXX.jp/XXX というアクセスが来たときに、
AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください。*/
Route::get('/xxx', 'AAAController@bbb');

/*課題4. 【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを
追加しました。web.phpを編集して、admin/profile/create にアクセスしたら ProfileController
の add Action に、admin/profile/edit にアクセスしたら ProfileController のedit Actionに
割り当てるように設定してください。*/

