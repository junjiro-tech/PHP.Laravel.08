<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token () }}">
       
        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>
        
          {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
          　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
          <script src="{{ secure_asset('js/app/js') }}" difer></script>
          
          <!-- fonts-->
          <link rel="dns-prefetch" href="https://fonts.gstatic.com"> 
        　<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!--styles-->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/profile.css')}}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
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
                    
                     <!--Authentication Links-->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                        
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('messages.Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
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

<!----課題1. Bladeテンプレートで、埋め込みたい箇所に利用するワードは何だったでしょうか？
@yieldの中にテキストやコンテンツを埋め込み

課題2.Webpackで使われているBootstrapやSCSSはどういったものか、調べられる範囲で調べてみましょう。
・Bootstrapとは、twitterが開発しているcssフレームワーク。フォームやボタン、ナビゲーション、モーダルなど汎用的なウェブサイトのパーツのスタイルが提供されています。
　このような汎用パーツは一から作ると手間がかかるもの。Bootstrapを使えば車輪の再発明をおさえられるので、生産性をあげられます。
　巷でBootstrapのサイトに対してよく言われるのは「Bootstrapくさいよね」という指摘。そのまま使うと、見た目が共通の仕上がりとなりBootstrap臭がどうしても出てしまいます。
　CDN版だとカスタマイズ性にかけており、Bootstrapらしさを軽減するのが難しいといった課題があります。
　Bootstrapをwebpack+Sass構成で取り込む最大のうまみは、簡単にカスタマイズできることです。特定のSass変数の値を上書きすることで、Boostrapの装飾を変更できます。
　カスタマイズすることでBootstrapっぽさを軽減し、コンテンツのテイストにスタイルをあわせられます。
・SCSSとは、SCSSにはネストされたルール、変数、ミックスイン、セレクタ継承などCSSにあるととっても便利な拡張を使うことができるようになります。
　その他にもif,for,each,whileなども使えるようになります。
　なみにSassには2つの構文があり、SCSS（Sassy CSS）とSass（インデント構文）に別れます。SCSSは.scssという拡張子、Sassは.sassという拡張子を持ち、
　お互いにSass-convertコマンドラインツールを使うことで変換もできますし、どちらの構文で書かれたとしてもインポートできます。
　SCSSの変数は「$」を使って定義します。
　
課題3.このページです
課題4. プロフィール作成画面用に、resources/views/admin/profile/create.blade.php ファイルを作成し、3. で作成した profile.blade.phpファイルを読み込み、
       また プロフィールのページであることがわかるように titleとcontentを編集しましょう。（ヒント: resources/views/admin/news/create.blade.php を参考にします。）
       このページです

課題5. resources/sass/admin.scss をコピーして profile.scss をresources/sassに作成しましょう。後ほ どこちらは課題で編集します。

課題6. webpack.mix.jsを編集して、profile.scss をコンパイルするように編集してみましょう。
課題7. 7. ができたら、実際に npm run watch コマンドでコンパイルしてみましょう。
課題8. 8. ができたら、ブラウザで /admin/profile/createでプロフィール作成画面が表 示されるか確認しましょう。-->