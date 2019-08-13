<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profilehistory extends Model
{
    protected $guarded = ['id'];

    // 以下を追記
    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );

    
    public function Profilehistories()
    {
      return $this->hasMany('App\Profilehistory');

    }
}
