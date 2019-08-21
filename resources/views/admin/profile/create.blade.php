@extends('layouts.profile')
@section('title', 'Laravel')
@section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-8 mx-auto">
                  <h2>Myプロフィール</h2>
                  <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                        
                        @if (count($errors) > 0)
                        <ul>
                              @foreach($errors->all() as $e)
                              <li>{{ $e }}</li>
                              @endforeach
                        </ul>
                        @endif
                        <div class="form-group row">
                              <label class="col-md-2" for="body">氏名</label>
                              <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                              </div>
                        </div>
                        <p>性別</p>
                        <div class="form-group row">
                              <label class="col-md-2" for="body">男</label>
                              <div class="col-md-10">
                                    <input type="radio" name="gender" value="男"> {{ old('gender') }}
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="body">女</label>
                              <div class="col-md-10">
                                    <input type="radio" name="gender" value="女"> {{ old('gender') }}
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="title">電話番号</label>
                              <div class="col-md-10">
                                    <input type="text" class="form-control" name="tell" value="{{ old('tell') }}">
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="title">趣味</label>
                              <div class="col-md-10">
                                    <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="title">自己紹介</label>
                              <div class="col-md-10">
                                    <textarea class="form-control" name="introduction" rouws="10">{{ old('introduction')}}</textarea>
                              </div>
                        </div>
                        {{ csrf_field() }}
                         <input type="submit" class="btn btn-primary" value="投稿">
                  </form>
              </div>
          </div>
      </div>
@endsection