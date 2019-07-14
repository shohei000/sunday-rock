<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Thread;

class ChatController extends Controller
{
  public function index($thread_id) {
    $thread_title = Thread::find($thread_id)->title;
    return view('message', [
      'thread_id' => $thread_id,
      'thread_title' => $thread_title
    ]);
  }
}
