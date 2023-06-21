<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cart/add" method="post">
            @foreach($product_detail->images as $image)
                <img src="{{$images->image}}" alt="">
            @endforeach
            <p>{{$product_detail->name}}</p>
            <p>{{$product_detail->price}}</p>

            <p>商品詳細：<br>{{$product_detail->name}}</p>
            サイズ：<select name="size">
            @foreach($product_detail->sizes as $size)
                <option value="{{$size->size}}">{{$size->size}}</option>
            @endforeach
            </select>
            <select name="quantity">
            @for($i = 1;$i <= 10;$i++)
                <option value="{{$i}}">{{$i}}</option>
            </select>
            @endfor
            
        <input type="submit" value="カートに入れる">
        <input type="hidden" value="{{$product_detail->id}}">
        @csrf
    </form>
    <p>
        ※消費税が含まれています
        ※送料は別途発生します
    </p>

</body>
</html>