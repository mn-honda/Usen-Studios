<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カート</title>
    <link rel="stylesheet" href="/css/cart.css">
</head>
<body>
    <div class="viewAll">
        {{-- ヘッダーのインポート --}}
        <x-header-component></x-header-component>

        {{-- < ショップに戻る --}}
        <a href='/product'>
            <input class="arrow_left" type="image" src= '/icon/keyboard_arrow_left.png'>
            <span class='back_to_shop'> ショップに戻る </span>
        </a>

        <div>
            <p class='product_in_cart'>カートに入っている商品</p>
        </div>
        
        @if ( isset($cart->cart_details) )
            @foreach ($cart->cart_details as $cart_detail)
                <div>

                    <div class="overView">
                        <div class='product_image'>
                            @foreach( $cart_detail->product->image as $image )
                                <img class='inner_product_image' src='{{asset($image->filepath)}}' alt='{{$image->explanation}}'>
                            @endforeach
                        </div>
                        <div class="productEx">
                            <div class='close'>
                                <form action='/cart/delete/{{$cart_detail->id}}' method='post'>
                                    @csrf
                                    <input type="image" src= '/icon/close.png'>
                                </form>
                            </div>
                            <div class='product_detail'>
                                <div class="productName">
                                    <p> 商品名: {{$cart_detail->product->name}} </p>
                                    <!-- <p> {{$cart_detail->product->name}} </p> -->
                                </div>
                                <div>
                                    {{-- <p> カラー: {{}} </p> --}}
                                    <p> サイズ: {{$cart_detail->size->size}} </p>
                                </div>
                                <div>
                                    <p>
                                        ￥{{$cart_detail->amount}}
                                        {{-- プルダウン --}}
                                        <form action='/cart/update' method='post' class='num_of_pulldown'>
                                            <select name='cart_detail_quantity' onchange="submit(this.form)">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    @if ($i == $cart_detail->quantity)
                                                        <option value='{{$i}}' selected>{{$i}}</option>
                                                    @else
                                                        <option value='{{$i}}'>{{$i}}</option>
                                                    @endif
                                                    {{$cart_detail->quantity}}
                                                @endfor
                                                <input type="hidden" name='cart_detail_id' value='{{$cart_detail->id}}'>
                                                @csrf
                                            </select>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
            @endforeach
        @endif
        
        
        <div class='amount'>
            <div class="Sub">
                <div class="subtotal">小計</div>
                    @if ( isset($cart->amount) )
                        <div>￥{{$cart->amount}}</div>
                    @else
                        <div>0</div>
                    @endif
            </div>
            <div class="Post">
                <div class="postage">送料</div>
                <div class="posNum">￥800</div>
            </div>
            <div class="Sum">
                <div class="sum">合計</div>
                @if ( isset($cart->amount) )
                    <div class="sumNum">￥{{$cart->amount + 800}}</span>
                @else
                    <div>￥800</div>
                @endif
            </div>
        </div>
        
        
        <div class='href_button_rectangle'>
            <button class="button" onclick="location.href='/sale/confirm'">
                <div class='href_button_text'>購入画面へ</div>
            </button>
        <div>
        
        {{-- フッターのインポート --}}
        @include("/header_footer.footer")
    </div>
</body>
</html>
