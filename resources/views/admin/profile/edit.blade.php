@extends('layouts.admin')
@section('title', 'Myプロフィールの編集')
@section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-8 mx-auto">
                  <h2>プロフィールの編集</h2>
                  <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/from-data">
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
                                    <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                              </div>
                        </div>
                        <p>性別</p>
                        <div class="form-group row">
                              <label class="col-md-2" for="body">男</label>
                              <div class="col-md-10">
                                    @if ($profile_form->gender == "男")
                                    <input type="radio" name="gender" value="男" checked="checked">
                                    @else 
                                        <input type="radio" name="gender" value="男">
                                    @endif    
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="body">女</label>
                              <div class="col-md-10">
                                    @if ($profile_form->gender == "女")
                                    <input type="radio" name="gender" value="女" checked="checked">
                                    @else
                                    <input type="radio" name="gender" value="女">
                                    @endif
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="title">電話番号</label>
                              <div class="col-md-10">
                                    <input type="tel" class="form-control" name="tell" value="{{ $profile_form->tell }}">
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="title">趣味</label>
                              <div class="col-md-10">
                                    <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby }}">
                              </div>
                        </div>
                        <div class="form-group row">
                              <label class="col-md-2" for="title">自己紹介</label>
                              <div class="col-md-10">
                                    <textarea class="form-control" name="introduction" rouws="10">{{ $profile_form->introduction }}</textarea>
                              </div>
                        </div>
                    
                        <div class="form-group row">
                              <div class="col-md-10">
                                    <input type="hidden" name="id" value="{{ $profile_form->id }}">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="更新">
                              </div>
                        </div>
                  </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->profilehistories != NULL)
                                @foreach ($profile_form->profilehistories as $profilehistory)
                                    <li class="list-group-item">{{ $profilehistory->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection