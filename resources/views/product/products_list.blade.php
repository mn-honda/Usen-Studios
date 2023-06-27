<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/product.css">
    <title>商品一覧</title>
</head>
<body>
    <div class="all">
        @if($category != "")
            <h1>{{$category->name}}</h1>
        @endif
        @if($word != "")
            <h1>検索：{{$word}}</h1>
        @endif
        
        <div class="container">
        @foreach($products as $product)
            <div class="box">
                <a href="/product_detail/{{$product->id}}">
                    <div class="images">
                        @foreach($product->image as $image)
                            <img class="img" src="{{$image->filepath}}" alt="">
                            <!-- <img src="{{$image->filepath}}" alt="" width=373 heght=600> -->
                        @endforeach
                    </div>
                    <div class="text">
                        <p>{{$product->name}}</p>
                        <p>￥@php echo number_format($product->price) @endphp</p>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
</body>
</html>