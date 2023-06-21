<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カート</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}

    {{-- < ショップに戻る --}}

    @foreach ($user->cart->cart_details as $cart_detail)
        <div>
            <p>カートに入っている商品</p>
            <div>
                <img src='{{asset($cart_detail->product->image->filepath)}}'>
            </div>
            <div>
                <p> 商品名 </p>
                <p> {{$cart_detail->product->name}} </p>
            </div>
            <div>
                {{-- <p> カラー: {{}} </p> --}}
                <p> サイズ: {{$cart_detail->size}} </p>
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

    <div>
        <p>
            <span>小計</span>
            <span>{{$user->cart->amount}}</span>
            <br>
            <span>送料</span>
            <span>￥800</span>
        </p>
        <p>
            <span>合計</span>
            <span>{{$user->cart->amout + 800}}</span>
        </p>
    </div>

    {{-- フッターのインポート --}}
</body>
</html>
