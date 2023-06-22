
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
            @foreach($product->image as $image)
                <img src="{{$image->filepath}}" alt="">
            @endforeach
            <p>{{$product->name}}</p>
            <p>{{$product->price}}</p>

            <p>商品詳細：<br>{{$product->detail}}</p>
            サイズ：<select name="size">
                @php dump($product->sizes); 
            @foreach($product->sizes as $size)
                <option value="{{$size->size}}">{{$size->size}}</option>
            @endforeach
            </select><br>
            個数：
            <select name="quantity">
            @for($i = 1;$i <= 10;$i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
            </select><br>
            
        @endforeach
        <input type="submit" value="カートに入れる">
        <input type="hidden" value="{{$product->id}}">
        @csrf
    </form>
    <p>
        ※消費税が含まれています
        ※送料は別途発生します
    </p>

</body>
</html>