<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $guarded = ['id'];
    
    //以下を追記
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'tell' => 'required',
        'introduction' => 'required',
        );
        
        public function profilehistories()
    {
      return $this->hasMany('App\Profilehistory');
    }
}

