
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/product_detail.css">
    <link rel="stylesheet" href="/css/product_detail.css">
    <title>Document</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}
    <x-header-component></x-header-component>
    <div class="container">
        <div class="message">
            {{(session("message"))}}
        </div>
        <script>
            (function() {
                'use strict';
            
                // フラッシュメッセージのfadeout
                $(function(){
                    $('.message').fadeOut(3000);
                });
            
            })();
        </script>

        <form class="detailForm" action="/cart/add" method="post">
            @foreach($product_detail as $product)
                @foreach($product->image as $image)
                    <img src="{{$image->filepath}}" class="productImg" alt="No Image" width="300" height="500">
                @endforeach
                <div class="textArea">
                    <div class="leftText">
                        <p>{{$product->name}}  
                        <p>￥@php echo number_format($product->price) @endphp</p>
            
                        <p class="productdetail">商品詳細：<br>{{$product->detail}}</p>
                        サイズ：<select name="size">
                        @foreach($product->sizes as $size)
                            <option value="{{$size->id}}">{{$size->size}}</option>
                        @endforeach
                        </select><br>
                        @if($product->stock->stock <= 5 && $product->stock->stock != 0)
                            <p>在庫残り{{$product->stock->stock}}点</p>
                        @endif
                        個数（最大10個）：
                        @if($product->stock->stock != 0)
                            <select name="quantity">
                            @for($i = 1;$i <= $product->stock->stock;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @if ($i == 10)
                                        @php break; @endphp                                      
                                    @endif
                            @endfor
                            </select>
                            
                        @else
                            <p class="alert">在庫切れ</p>
                        @endif
                            
                        
                        <br>
        
                        <p class="Annotation">
                            ※消費税が含まれています
                            <br>
                            ※送料は別途発生します
                        </p>
                    </div>

                    
                    @endforeach
                    
                    <input class="button" type="submit" value="カートに入れる"
                    @if($product->stock->stock == 0)
                        disabled
                    @endif >
        
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    @csrf

                </div>
        </form>
    </div>
        {{-- フッターのインポート --}}
    @include("/header_footer.footer")
</body>
</html>