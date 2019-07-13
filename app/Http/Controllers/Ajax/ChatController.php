<?php

namespace App\Http\Controllers\Ajax;

use App\Events\MessageCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{

  public function index(Request $request) { // 新着順にメッセージ一覧を取得];
    return \App\Message::orderBy('created_at', 'asc')
                        ->where('thread_id', $request->thread_id)
                        ->get();
  }

  public function create(Request $request) { // メッセージを登録
    $message = \App\Message::create([
      'thread_id' => $request->thread_id,
      'text' => $request->message
    ]);
    event(new MessageCreated($message));
  }
}
