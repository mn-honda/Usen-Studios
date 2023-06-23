<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if()

    <h1>お問い合わせ内容を入力してください</h1>

    <form action="" method="post">
        返信先メールアドレス：<input type="text" value="{{Auth::user()->email}}"><br>
        件名:<input type="text" name="title"><br>
        注文ID:<input type="sale_detail_id" name="sale_detail_id"><br>
        お問い合わせ：<br>
        <textarea name="detail" cols="50" rows="20"></textarea>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="submit" value="送信">
    </form>
</body>
</html>