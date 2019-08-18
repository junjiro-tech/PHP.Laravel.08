@extends('layouts.front')
@section('title', 'My profile')
@section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-8 mx-auto">
                  <h2>My profile</h2>
                  <form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-date">
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
                                    <input type="hidden" name="id" value="{{$profile_form->id}}">
                                     {{ csrf_field() }}
                        <div class="form-group row">
                              <div class="col-md-2"></div>
                              <div class="col-md-10">
                                    <input type="submit" class="btn btn-primary btn-block" value="送信">
                              </div> 
                        </div>
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