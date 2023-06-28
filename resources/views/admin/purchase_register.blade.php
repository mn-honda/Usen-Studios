<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仕入れ登録</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium">
    <div><br><h1 class="text-3xl flex justify-center">仕入れ登録</h1><br></div>
    @foreach ($errors->all() as $error)
        <li class="flex justify-center"> <span class="error">{{ $error }}</span></li>
    @endforeach
    <br><br><br>
    <div class="flex justify-center">
        <form action="" method="post">
            商品：
            <select name="product">
                @foreach ($products as $product)
                    <option value={{$product->id}}>{{$product->name}}</option>
                @endforeach
            </select><br><br>
            個数：
            <input type="number" name="quantity" value="" min="1"><br><br>
            日付：
            <input type="date" name="date"><br><br><br>
            <div class="text-center">
                <input type="submit" value="登録" class="ml-2 rounded-lg bg-blue-500 p-2 text-white hover:bg-blue-600">
            </div>
            @csrf
        </form>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="text-center border divide-x">
        <a href="product_register">商品登録</a>
        <a href="purchase_list">　　仕入れ一覧</a>
        <a href="stock_list">　　在庫一覧</a>
        <a href="sale_list">　　売上一覧</a>
    </div>

</body>
</html>
