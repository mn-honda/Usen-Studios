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
    <br><br>
    <div class="flex justify-center">
        <form action="" method="post" enctype="multipart/form-data">
            名前：
            <input type="text" name="name" value="{{old('name')}}"><br><br>
            カテゴリー：
            <select name="category">
                <option value="1">アウター</option>
                <option value="2">スウェット</option>
                <option value="3">ニット</option>
                <option value="4">Tシャツ</option>
                <option value="5">ジーンズ</option>
                <option value="6">ショーツ</option>
                <option value="7">トラウザーズ</option>
            </select><br><br>
            性別：
            <select name="gender">
                <option value="メンズ">メンズ</option>
                <option value="ウィメンズ">ウィメンズ</option>
            </select><br><br>
            値段：
            <input type="number" name="price" value="{{old('price')}}" min="1"><br><br>
            発売日：
            <input type="date" name="release_date" value="{{old('release_date')}}"><br><br>
            備考欄：
            <textarea name="detail" cols="30" rows="5">{{old('detail')}}</textarea>
            <br><br>
            写真：
            <input type="file" name="image"><br><br><br>
            <div class="text-center">
                <input type="submit" value="登録" class="ml-2 rounded-lg bg-blue-500 p-2 text-white hover:bg-blue-600">
            </div>
            @csrf
        </form>
    </div><br><br>
    <div class="text-center border divide-x">
        <a href="purchase_register">仕入れ登録</a>
        <a href="purchase_list">　　仕入れ一覧</a>
        <a href="stock_list">　　在庫一覧</a>
        <a href="sale_list">　　売上一覧</a>
    </div>
</body>
</html>
