<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
</head>
<body>
    <h1>{{$category->name}}</h1>

    @foreach($products as $product)
        <a href="/product_detail/{{$product->id}}">
            @foreach($product->image as $image)
                <img src="{{$image->filepath}}" alt="" width=300 height=500>
            @endforeach
            <p>{{$product->name}}</p>
            <p>￥@php echo number_format($product->price) @endphp</p>
        </a>
    @endforeach
</body>
</html>