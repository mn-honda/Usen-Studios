<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>メンバー情報編集</title>
</head>
<body>
    <x-header-component>
        <div><br><h1 class="text-3xl flex justify-center">メンバー情報編集</h1><br></div>
        @foreach ($errors->all() as $error)
            <li class="flex justify-center"> <span class="error">{{ $error }}</span></li>
        @endforeach
        <br><br>
        <div class="font-medium flex justify-center">
            <form action="" method="post">
                <table>
                    <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">お名前</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><input type="text" name="name" value="{{$user->name}}"></td></tr>
                    <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">Eメールアドレス</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><input type="email" name="email" value="{{$user->email}}"></td></tr>
                    <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">住所</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5">〒<input type="text" name="post_code" value="{{$user->post_code}}"></td></tr>
                    <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5"></th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><input type="text" name="address" value="{{$user->address}}"></td></tr>
                </table>
                <br><br><br>
                <div class="text-center">
                    <input type="submit" value="送信" class="ml-2 rounded-lg bg-gray-500 p-2 text-white hover:bg-gray-800">
                </div>
                @csrf
            </form>
        </div>
        <br><br>
        <a href="/user/list" class="flex justify-center">ユーザー情報に戻る</a>
    </x-header-component>
</body>
@include("/header_footer.footer")
</html>
