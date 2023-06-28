<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>購入確認</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}

    <h1>CONTACT</h1>

        <div>
            ご注文概要
            @if ( isset($user->cart->cart_details) )
                @foreach ($user->cart->cart_details as $cart_detail)
                    <div>
                        @foreach( $cart_detail->product->image as $image )
                            <img src='{{asset($image->filepath)}}' alt="$image->explanation">
                        @endforeach
                    </div>
                    <div>
                        <p> 商品名 </p>
                        <p> {{$cart_detail->product->name}} </p>
                    </div>
                    <div>
                        {{-- <p> カラー: {{}} </p> --}}
                        <p> サイズ: {{$cart_detail->size->size}} </p>
                        <p> 数量: {{$cart_detail->quantity}} </p>
                    </div>
                    <div>
                        <p> ￥{{$cart_detail->amount}} </p>
                    </div>
                @endforeach
            @endif
        </div>
        <div>
            <p>
                <span>小計</span>
                    @if ( isset($user->cart->amount) )
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
                @if ( isset($user->cart->amount) )
                    <span>￥{{$user->cart->amount + 800}}</span>
                @else
                    <span>￥800</span>
                @endif
            </p>
        </div>

        <div>
            <div>
                <h2>配送先情報</h2>
                <div>
                    <h3>郵便番号</h3>
                    @if( isset($user->post_code) )
                        <input type='text' name='post_code' value='{{$user->post_code}}' readonly>
                    @else
                        <input type='text' name='post_code'>
                    @endif
                </div>
                <div>
                    <h3>郵便番号</h3>
                    @if( isset($user->address) )
                        <input type='text' name='address' value='{{$user->address}}' readonly>
                    @else
                        <input type='text' name='address'>
                    @endif
                </div>
            </div>

            <div>
                <h2>お支払方法</h2>
                <div>
                    <h2>クレジットカード</h2>
                    <div>
                        <h3>カード番号</h3>
                        @if( isset($card["number"]) )
                            <input type='text' name='card_number' value='{{$card["number"]}}' readonly>
                        @else
                            <input type='text' name='card_number'>
                        @endif
                    </div>
                    <div>
                        <h3>カード名義</h3>
                        @if( isset($card["name"]) )
                            <input type='text' name='card_name' value='{{$card["name"]}}' readonly>
                        @else
                            <input type='text' name='card_name'>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        
        <form action="/sale/procedure" method="POST">
            @csrf
            <button type="submit">購入確定</button>
        </form>

{{-- 
                        <form id="card-form" action="/sale/procedure" method="POST">
                            <div>
                                合計
                                ￥ {{ $user->cart->amount + 800 }}
                                <input type="hidden" name='amount' value='{{ $user->cart->amount + 800 }}'>
                            @csrf
                            <div>
                                <label for="card_number">カード番号</label>
                                <div id="card-number" class="form-control"></div>
                            </div>
    
                            <div>
                                <label for="card_expiry">有効期限</label>
                                <div id="card-expiry" class="form-control"></div>
                            </div>
    
                            <div>
                                <label for="card-cvc">セキュリティコード</label>
                                <div id="card-cvc" class="form-control"></div>
                            </div>
    
                            <div id="card-errors" class="text-danger"></div>
    
                            <button class="mt-3 btn btn-primary">購入確定</button>
                        </form>
    
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            /* 基本設定*/
            const stripe_public_key = "{{ env('STRIPE_PUBLIC_KEY') }}"
            const stripe = Stripe(stripe_public_key);
            const elements = stripe.elements();
    
            var cardNumber = elements.create('cardNumber');
            cardNumber.mount('#card-number');
            cardNumber.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
    
            var cardExpiry = elements.create('cardExpiry');
            cardExpiry.mount('#card-expiry');
            cardExpiry.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
    
            var cardCvc = elements.create('cardCvc');
            cardCvc.mount('#card-cvc');
            cardCvc.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
    
            var form = document.getElementById('card-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                var errorElement = document.getElementById('card-errors');
                if (event.error) {
                    errorElement.textContent = event.error.message;
                } else {
                    errorElement.textContent = '';
                }
    
                stripe.createToken(cardNumber).then(function(result) {
                    if (result.error) {
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });
    
            function stripeTokenHandler(token) {
                var form = document.getElementById('card-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        </script>
--}}


    {{-- フッターのインポート --}}
</body>
</html>
