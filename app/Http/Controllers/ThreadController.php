<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;


class ThreadController extends Controller
{

  //スレッド一覧表示 両方
  public function index(){
    $threads_sansen = Thread::orderBy('created_at', 'desc')->get();
    return view('index')->with(compact("threads_sansen"));
  }

  //スレッド作成
  public function create(Request $request){
    $data = $request->all();
    $Thread = new Thread;
    $Thread->fill($data)->save();
    return redirect('/');
  }
}
