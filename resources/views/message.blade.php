<?php
  $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $thread_title_hash = preg_replace("/( |　)/", "", $thread_title );
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>{{ $thread_title }} ｜　邦ロック好きと繋がりたい</title>
  <link rel="stylesheet" href="/css/style.css">
  <meta name="viewport" content="width=device-width">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta property="og:title" content="邦ロック好きと繋がりたい" />
  <meta property="og:description" content="{{$thread_title}}好き語ろう〜！！！" />
  <meta property="og:site_name" content="http://sunday-rock.site/" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta property="og:image" content="http://sunday-rock.site/img/ogp.png" />

</head>
<body>


  <header class="header">
    <h1>{{ $thread_title }}について話そう！</h1>
  </header>

  <div id="chat">
    <div class="contents">
      <ul class="message">

        <li v-for="m in messages">
          <div class="user-name"><span v-text="username"></span><span class="time" v-text="m.created_at"></span></div>
          <p v-text="m.text"></p>
        </li>

      </ul>
    </div>
    
    <div data-thread-create class="thread-create thread-create--message">
     
      <a 
        href="https://twitter.com/intent/tweet?url=<?php echo $url ?>&hashtags=日曜日だし邦ロック好きな人と繋がりたい,日曜日だし邦rock好きな人と繋がりたい,邦ロック好きな人と繋がりたい,<?php echo $thread_title_hash; ?>"
        class="twitter-share-button"
      ><img src="/img/icon_twitter_white.svg" alt=""></a>
    </div>

    <div id="formArea" class="formArea">  
      <div class="formAreaInner">
        <input type="text" id="message" placeeholder="message" class="inputArea" v-model="message">
        <button type="button" class="submitBtn" @click="send()">投稿</button>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="/js/app.js"></script>
  <script>
    let thread_id = {{$thread_id}};
    new Vue({
      el: '#chat',
      data: {
        username: '匿名さん',
        message: '',
        messages: [],
      },
      methods: {
        getMessages() {
          const url = '/ajax/chat';
          const params = {thread_id}
          axios.get(url, {params})
          .then((response) => {
            this.messages = response.data;
          });
        },
        send() {
          const url = '/ajax/chat';
          const params = { 
            message: this.message,
            thread_id
          };
          axios.post(url, params)
          .then((response) => {
            // 成功したらメッセージをクリア
            this.message = '';
          });
        }
      },
      mounted() {
        this.getMessages();
        Echo.channel('chat').listen('MessageCreated', (e) => {
          this.getMessages(); // メッセージを再読込
          $('body, html').animate({ scrollTop: $('body').height() }, 500);
        });
      }
    });
  </script>
  <script>
    $(function(){

      $('#message').focusin(function(e) {
        $(this).css('background-color', '#ffc');
        $('#formArea').css('margin-bottom', '60vw');
      }).focusout(function(e) {
        setTimeout(() => {
          $(this).css('background-color', '#fff');
          $('#formArea').css('margin-bottom', '0');
        }, 100)
        setTimeout(() => {
          $('body, html').animate({ scrollTop: $('body').height() }, 500);
        }, 700)
      });

    });
  </script>
</body>
</html>