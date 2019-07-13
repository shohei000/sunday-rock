<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Thread;

class MessageController extends Controller
{
  public function messages($category, $thread_id){
    if($category !== 'sansen' && $category !== 'suki') return redirect('/');
    $thread = Thread::where('id', $thread_id)->first();
    $messages = $thread->messages()->get();
    return view('message', [
      'messages' => $messages,
      'category' => $category,
      'thread_id' => $thread_id,
    ]);
  }

  public function create(Request $request){
    $data = $request->all();
    $message = new Message;
    $message['thread_id'] = $request->thread_id;
    $message->fill($data)->save();
    return redirect('/' . $request->category . '/' . $request->thread_id);
  }

}
