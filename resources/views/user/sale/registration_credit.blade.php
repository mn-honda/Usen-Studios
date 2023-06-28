<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お支払方法登録</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}

    <h1>CONTACT</h1>
    <h2>お支払方法</h2>

    <div>
        <div>
            <form id="card-form" action="/sale/registration_credit" method="POST">
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
                    <label for="card_cvc">セキュリティコード</label>
                    <div id="card-cvc" class="form-control"></div>
                </div>
                <div>
                    <label for="card_name">カード名義</label>
                    <br>
                    <input type="text" name="cardName" id="card-name" class="form-control" value="" placeholder="(例) 田中 太郎">
                </div>
                <div id="card-errors" class="text-danger"></div>
                <button class="mt-3 btn btn-primary">カード登録</button>
            </form>
        </div>

        <div>
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
    </div>
    <div>
        {{-- <form> --}}
            {{-- @csrf --}}
            <button onclick="location.href='/sale/confirm'">購入確認画面へ</button>
            {{-- <button type="submit">購入確認画面へ</button> --}}
        {{-- </form> --}}
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    {{-- <script src="/js/stripe_form.js"></script> --}}
    <script>
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
            stripe.createToken(cardNumber ,{
                name: document.querySelector('#card-name').value
            }).then(function(result) {
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
    {{-- フッターのインポート --}}

</body>
</html>
