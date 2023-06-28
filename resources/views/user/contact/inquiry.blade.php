<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(!empty($message))
        echo $message;
    @endif
    <h1>contact form</h1>
    <p>お問い合わせ内容を入力してください</p>

    <form action="" method="post">
        返信先メールアドレス（必須）：<input type="text" value="{{Auth::user()->email}}" require><br>
        件名（必須）:<input type="text" name="title" require><br>
        注文ID:<input type="sale_detail_id" name="sale_detail_id"><br>
        お問い合わせ詳細（必須）：<br>
        <textarea name="detail" cols="50" rows="20" require></textarea>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="submit" value="送信">
        @csrf
    </form>
    @include("/header_footer.footer")
</body>
</html>