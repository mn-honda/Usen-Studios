<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cart/add" method="post">
    @foreach($product_detail as $product)
        @foreach($product->images as $image)
            <img src="{{$images->image}}" alt="">
        @endforeach
        <p>{{$product->name}}</p>
        <p>{{$product->price}}</p>

        <p>商品詳細：<br>{{$product->name}}</p>
        サイズ：<select name="size">
        @foreach($product->sizes as $size)
            <option value="{{$size->size}}">{{$size->size}}</option>
        @endforeach
        </select>
        <select name="quantity">
        @for($i = 1;i <= 10;1++)
            <option value="{{$i}}">{{$i}}</option>
        </select>
        @endfor
        <input type="submit" value="かーとにいｒ">
        <p>{{$product->name}}</p>
    @endforeach
    </form>
</body>
</html>