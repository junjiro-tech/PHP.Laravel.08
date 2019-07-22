<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <!--X-UA-Compatibleは下位互換またはバージョンの指定、IE=edgeは「閲覧者の環境でインストールされているIEの中の【最新のもの】でWebサイトを表示」-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    　　<!-- meta name="viewport" content="width=360,initial-scale=1"←数字を明確に記入することにより端末の画面が大小あっても表示を統一できるが、スペースの有効活用ができない-->
        <meta name="viewport" content="width=device, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token () }}"><!-- CSRF Token　CSRF(クロスサイトリクエストフォージェリ)　csrfからの攻撃を防ぐ-->
       
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>
        
          {{-- Laravel標準で用意されているJavascriptを読み込みます --}} <!--secure_asset()でHTTPSを含んだURLを取得する
          。echo secure_asset('img/photo.jpg');これを実行すると右のようになる。https://*****.test/img/photo.jpg-->
          <script src="{{ secure_asset('js/app/js') }}" difer></script>
          
          <!-- fonts-->
          <link rel="dns-prefetch" href="https://fonts.gstatic.com"> <!--そのページ」と「別のファイルやページ」を関連づけるためのタグ,＊aタグは訪問者が別のリンクへ飛ぶ用-->
        　<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"><!--link relは関係性、link hrefは読み込むURL-->
        
        <!--styles-->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css')}}" rel="stylesheet">
    </head>
    <body>
        <div id="app"><!--id属性は同じpageに１つだけ-->
         {{-- 画面上部に表示するナビゲーションバーです。 --}}
         <nav class="navbar navbar-expanded-md navbar-dark navbar-Laravel">
             <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                     {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="botton" date-toggle="collapse" date-target="#navbarSupportedContent"
                              ria-controls="navbarSupportedContent" area-expanded="false" aria-label="Toggle navigation">
                    <span class="collapse navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left side of navbar-->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    
                    <!-- Right side  of navbar-->
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
             </div>
         </nav>
            {{-- ここまでナビゲーションバー --}}
            
            <main class="py-4">
                  {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                   @yield('content')
            </main>
        </div>
    </body>
</html>