<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use Auth;
use App\News;
use App\Profile;

    
    
    
    class NewsController extends Controller
{
   
   
   
   
   
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        // $cond_title が空白でない場合は、記事を検索して取得する
        if($cond_title !='') {
            $posts = News::where('title', $cond_title).orderBy('updated_at', 'desc')->get();
        } else {
            $posts = News::all()->sortByDesc('updated_at');
        }

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
            
            $posts = Profile::all();
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    
    
    
    public function profile(Request $request)
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
         \Debugbar::info($profile);
        
        if (empty($profile)) {
          abort(404);
         }
        
        return view('news.profile',['profile_form' => $profile]);
    }
}

/*dd($profile);