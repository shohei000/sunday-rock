<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="/css/style.css">
  <meta name="viewport" content="width=device-width">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta property="og:title" content="邦ロック好きと繋がりたい" />
  <meta property="og:description" content="邦ロック好きな人と繋がりたい！！！気になった人お迎えします" />
  <meta property="og:site_name" content="http://sunday-rock.site/" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta property="og:image" content="/img/ogp.png" />

</head>
<body>

  <header class="header">
    <h1>邦ロック好きと繋がりたい</h1>
  </header>

  <div class="contents">
    
    <ul class="threads" data-thread="sansen">
      @foreach($threads_sansen as $thread)
        <li><a href="/chat/{{ $thread->id }}">{{$thread->title}}</a></li>
      @endforeach
    </ul>

  </div>

<div data-thread-create class="thread-create">＋</div>

<div class="modal-wrapper">
  <div class="modal-inner">
    <form action="/thread/create" method="post" class="thread-form">
      {{ csrf_field() }}
      <input type="text" name="title" placeholder="アーティスト名" class="thread-input">
      <a class="btn">作成</a>
    </form>
  </div>
  <div class="close">✕</div>
</div>

  
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script>
    $(function(){
      $('body').on('click','[data-thread-create]', function(){
        $('.modal-wrapper').fadeIn();
      });
      $('body').on('click', '.close', function(e){
        $('.modal-wrapper').fadeOut();
      });
      $('.btn').on('click',function(e){
        e.preventDefault();
        if($('.thread-input').val() == ''){
          alert('入力欄が空です。');
        }else{
          $('.thread-form').submit();
        }
      });
    });
  </script>
</body>
</html>