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

    @if ( isset($cart->cart_details) )
        @foreach ($cart->cart_details as $cart_detail)
            <div>
                <p>カートに入っている商品</p>
                <div>
                    @foreach( $cart_detail->product->image as $image )
                        <img src='{{asset($image->filepath)}}' alt={{$image->explanation}}>
                    @endforeach
                </div>
                <div>
                    <div>
                        <form action='/cart/delete/{{$cart_detail->id}}' method='post'>
                            @csrf
                            <button type='submit'>X</button>
                        </form>
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
                        <form action='/cart/update' method='post'>
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
        @endforeach
    @endif
    

    <div>
        <p>
            <span>小計</span>
                @if ( isset($cart->amount) )
                    <span>{{$cart->amount}}</span>
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
                <span>￥{{$cart->amount + 800}}</span>
            @else
                <span>￥800</span>
            @endif
        </p>
    </div>


    <button onclick="location.href='/sale/confirm'">購入画面へ</button>

    {{-- フッターのインポート --}}
</body>
</html>
