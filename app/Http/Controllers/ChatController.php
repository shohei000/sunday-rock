<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class ChatController extends Controller
{
  public function index($thread_id) {
    return view('message', [
      'thread_id' => $thread_id,
      'thread_title' => Message::where('thread_id', $thread_id)->first()->thread->title
    ]);
  }
}
