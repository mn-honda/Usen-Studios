<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メンバー情報編集</title>
</head>
<body>
    <x-header-component></x-header-component>
    <h1 style="text-align: center; font-size: 96px">UsenStudios</h1>
    <p style="text-align: center; font-size:20px">メンバー情報編集</p>
        @foreach ($errors->all() as $error)
            <li style="text-align: center"> <span class="error">{{ $error }}</span></li>
        @endforeach
        <div style="text-align: center">
            <form action="" method="post">
                <table border=1 style="margin-left: auto; margin-right: auto">
                    <tr><th style="background-color: rgb(219, 216, 216); padding: 20px">お名前</th><td style="background-color: rgb(241, 238, 238); padding: 20px"><input type="text" name="name" value="{{$user->name}}"></td></tr>
                    <tr><th style="background-color: rgb(219, 216, 216); padding: 20px">Eメールアドレス</th><td style="background-color: rgb(241, 238, 238); padding: 20px"><input type="email" name="email" value="{{$user->email}}"></td></tr>
                    <tr><th style="background-color: rgb(219, 216, 216); padding: 20px">住所</th><td style="background-color: rgb(241, 238, 238); padding: 20px">〒<input type="text" name="post_code" value="{{$user->post_code}}"></td></tr>
                    <tr><th style="background-color: rgb(219, 216, 216); padding: 20px"></th><td style="background-color: rgb(241, 238, 238); padding: 20px"><input type="text" name="address" value="{{$user->address}}"></td></tr>
                </table>
                <br>
                    <input type="submit" value="送信" style="border: 2px solid gray;">
                @csrf
            </form>
            <br><br>
            <a href="/user/list" class="flex justify-center">ユーザー情報に戻る</a>
        </div>
</body>
@include("/header_footer.footer")
</html>
