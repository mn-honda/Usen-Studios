<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仕入れ登録</title>
</head>
<body>
    <h1>仕入れ登録</h1>
    @foreach ($errors->all() as $error)
        <li> <span class="error">{{ $error }}</span></li>
    @endforeach
    <form action="" method="post">
        商品：
        <select name="product">
            @foreach ($products as $product)
                <option value={{$product->id}}>{{$product->name}}</option>
            @endforeach
        </select><br>
        個数：
        <input type="number" name="quantity" value="" min="1"><br>
        日付：
        <input type="date" name="date"><br>
        <input type="submit" value="登録">
        @csrf
    </form>
    <a href="purchase_list">仕入れ一覧画面</a>
</body>
</html>
