<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
</head>
<body>
    <h1>アウター</h1>

    @foreach($products as $product)
        <a href="/product_detail/{{$product->id}}">
            画像
            <p>{{$product->name}}</p>
            <p>{{$product->price}}</p>
        </a>
    @endforeach
</body>
</html>