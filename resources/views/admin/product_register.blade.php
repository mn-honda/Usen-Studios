<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録画面</title>
</head>
<body>
    <h1>商品登録画面</h1>
    @foreach ($errors->all() as $error)
        <li> <span class="error">{{ $error }}</span></li>
    @endforeach
    <form action="" method="post" enctype="multipart/form-data">
        名前：
        <input type="text" name="name" value="{{old('name')}}"><br>
        カテゴリー：
        <select name="category">
            <option value="1">アウター</option>
            <option value="2">スウェット</option>
            <option value="3">ニット</option>
            <option value="4">Tシャツ</option>
            <option value="5">ジーンズ</option>
            <option value="7">ショーツ</option>
            <option value="6">トラウザーズ</option>
        </select><br>
        性別：
        <select name="gender">
            <option value="メンズ">メンズ</option>
            <option value="ウィメンズ">ウィメンズ</option>
        </select><br>
        値段：
        <input type="number" name="price" value="{{old('price')}}" min="1"><br>
        発売日：
        <input type="date" name="release_date" value="{{old('release_date')}}"><br>
        備考欄：
        <textarea name="detail" cols="30" rows="5">{{old('detail')}}</textarea>
        <br>
        前面写真：
        <input type="file" name="image_front"><br>
        <input type="submit" value="登録">
        @csrf
    </form>

</body>
</html>
