<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カート</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}

    {{-- < ショップに戻る --}}
    <a href='/'>ショップに戻る</a>

    @if ( isset($cart->cart_detail) )
        @foreach ($cart->cart_details as $cart_detail)
            <div>
                <p>カートに入っている商品</p>
                <div>
                    <img src='{{asset($cart_detail->product->image->filepath)}}'>
                </div>
                <div>
                    <div>
                        <a href='/cart/delete/{{$cart_detail->id}}'>X</a>
                    </div>
                    <p> 商品名 </p>
                    <p> {{$cart_detail->product->name}} </p>
                </div>
                <div>
                    {{-- <p> カラー: {{}} </p> --}}
                    <p> サイズ: {{$cart_detail->size->size}} </p>
                </div>
                <div>
                    <p>
                        ￥ {{$cart_detail->amount}}
                        {{-- プルダウン --}}
                        <select name='cart_detail_quantity'>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i == $cart_detail->quantity)
                                    <option value='{{$i}}' selected>$i</option>
                                @else
                                    <option value='{{$i}}'>$i</option>
                                @endif
                                {{$cart_detail->quantity}}
                            @endfor
                        </select>
                    </p>
                </div>
            </div>
        @endforeach
    @endif
    

    <div>
        <p>
            <span>小計</span>
                @if ( isset($cart->amount) )
                    <span>{{$user->cart->amount}}</span>
                @else
                    <span>0</span>
                @endif
            <br>
            <span>送料</span>
            <span>￥800</span>
        </p>
        <p>
            <span>合計</span>
            @if ( isset($cart->amount) )
                <span>￥{{$user->cart->amout + 800}}</span>
            @else
                <span>￥800</span>
            @endif
        </p>
    </div>

    {{-- フッターのインポート --}}
</body>
</html>
