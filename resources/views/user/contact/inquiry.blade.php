<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/inquiry.css" rel="stylesheet">
    <title>コンタクトフォーム</title>
</head>
<body>
<x-header-component></x-header-component>
    <div class="container">
    @if(!empty($message))
        <p>{{$message}}</p>
    @endif
    
        <h1>CONTACT</h1>
        
        <p>お問い合わせ内容を入力してください</p>

        <div class="form_container">
        <form action="" method="post">
            <div class="a">
            返信先メールアドレス（必須）<br>
            <input class="b" type="text" value="{{Auth::user()->email}}" required placeholder="Email"><br>
            </div>
            <div class="a">
            件名（必須）<br>
            <input class="b" type="text" name="title" required placeholder="Subject"><br>
            </div>
            <div class="a">
            注文詳細ID <br>
            <input class="b" type="sale_detail_id" name="sale_detail_id" placeholder="OrderID"><br>
            </div>
            <div class="a">
            お問い合わせ詳細（必須）<br>
            <textarea class="c" name="detail" cols="50" rows="20" required placeholder="Inquiry about the contact"></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"><br>
            <input type="submit" value="送信">
            @csrf
        </form>
        </div>
        @include("/header_footer.footer")
    </div>
</body>
</html>
