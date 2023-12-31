<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お支払方法登録</title>
    <link rel="stylesheet" href="/css/registration_cregit.css">
</head>
<body>
    {{-- ヘッダーのインポート --}}
    <x-header-component></x-header-component>
    
    <div>
        <!-- <h1>ご注文情報</h1> -->
        <h1>お支払方法</h1>

        <div class="All">
            <form class="viewAll" id="card-form" action="" method="post">
                <div class="cash">
                    <div class="cashContainer">
                            <p>クレジットカード</p>
                            <div>
                                <div>
                                    <label for="card_number">カード番号</label>
                                    <div id="card-number" class="form-control">
                                </div>
                                <div>
                                    <div>
                                        <label for="card_expiry">有効期限</label>
                                        <div id="card-expiry" class="limit">
                                    </div>
                                    <div>
                                        <label for="card_cvc">セキュリティコード</label>
                                        <div id="card-cvc" class="security">
                                    </div>
                                </div>
                                <div>
                                    <label for="card_name">カード名義</label>
                                    <br>
                                    <input type="text" name="cardName" id="card-name" value="" placeholder="(例) 田中 太郎">
                                </div>
                                <div id="card-errors" class="text-danger">
                            </div>
                        </div>
    
                        <!-- <div class="orderContainer">
                            ご注文概要
                            @if ( isset($user->cart->cart_details) )
                                @foreach ($user->cart->cart_details as $cart_detail)
                                    <div>
                                        @foreach( $cart_detail->product->image as $image )
                                            <img src='{{asset($image->filepath)}}' alt="$image->explanation" class="inner_product_image">
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
                        <div class="total">
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
                        </div> -->
                    </div>
                </div>
                <div class="cashEle"></div>

                @csrf
                <button class="mt">購入確認画面へ</button>
            </form>
        </div>
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
    @include("/header_footer.footer")
</body>
</html>
