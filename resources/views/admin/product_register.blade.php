<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium">
    <div><br><h1 class="text-3xl flex justify-center">商品登録</h1><br></div>
    @foreach ($errors->all() as $error)
        <li class="flex justify-center"> <span class="error">{{ $error }}</span></li>
    @endforeach
    <br>
    <div class="flex justify-center">
        <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">名前</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><input type="text" name="name" value="{{old('name')}}"></td></tr>
            <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">カテゴリー</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><select name="category">
                <option value="1">アウター</option>
                <option value="2">スウェット</option>
                <option value="3">ニット</option>
                <option value="4">Tシャツ</option>
                <option value="5">ジーンズ</option>
                <option value="6">ショーツ</option>
                <option value="7">トラウザーズ</option>
            </select></td></tr>
            <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">性別</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><select name="gender">
                <option value="メンズ">メンズ</option>
                <option value="ウィメンズ">ウィメンズ</option>
            </select></td></tr>
            <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">値段</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><input type="number" name="price" value="{{old('price')}}" min="1"></td></tr>
            <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">発売日</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><input type="date" name="release_date" value="{{old('release_date')}}"></td></tr>
            <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">備考欄</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><textarea name="detail" cols="30" rows="5">{{old('detail')}}</textarea></td></tr>
            <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">写真</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5"><input type="file" name="image"></td></tr>
        </table>
            <div class="text-center">
                <input type="submit" value="登録" class="ml-2 rounded-lg bg-gray-500 p-2 text-white hover:bg-gray-800">
            </div>
            @csrf
        </form>
    </div><br><br>
    <div class="text-center border divide-x">
        <a href="purchase_register">仕入れ登録</a>
        <a href="purchase_list">　　仕入れ一覧</a>
        <a href="stock_list">　　在庫一覧</a>
        <a href="sale_list">　　売上一覧</a>
        <a href="contact_list">　　お問い合わせ一覧</a>
    </div>
</body>
</html>
