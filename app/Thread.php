<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
  public function messages(){
    return $this->hasMany('App\Message');
  }

  protected $dates = [ 'deleted_at' ];//ソフトデリート

  protected $fillable = [
    'user_id', 'title',
  ];

  protected $hidden = [
    'created_at', 'updated_at',
  ];
}
