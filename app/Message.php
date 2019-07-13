<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function thread(){
    return $this->belongsTo('App\Thread');
  }
  protected $guarded = ['id'];
}
