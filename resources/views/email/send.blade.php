<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>UsenStudios 発送完了のお知らせ</title>
    <link rel="stylesheet" href="/css/confirm.css">
</head>
<body>
    {{-- ヘッダーのインポート --}}
    <div>
        <h1 class="U-S">UsenStudios</h1>
        <h2>ご購入いただきました商品を発送いたしました！</h1>
        <br>
        <h2>到着まで今しばらくお待ちください！</h1>
        <div>
            注文ID：#{{$sale->id}}
        </div>
    </div>
    <div class="viewAll">
        <p class="order">ご注文情報</p>
            <div>
                @if ( isset($sale->sale_details) )
                    @foreach ($sale->sale_details as $sale_detail)
                    <div class="overView">
                        <div class="product_image">
                            @foreach( $sale_detail->product->image as $image )
                                <img class="img" src='{{asset($image->filepath)}}' alt="$image->explanation">
                            @endforeach
                        </div>
                        <div class="product_detail">
                            <div class="productName">
                                <div>
                                    注文詳細ID：{{$sale_detail->id}}
                                </div>
                                <p class="product"> 商品名: {{$sale_detail->product->name}} </p>
                                <!-- <p> {{$sale_detail->product->name}} </p> -->
                            </div>
                            <div>
                                {{-- <p> カラー: {{}} </p> --}}
                                <p> サイズ: {{$sale_detail->size->size}} </p>
                                <p> 数量: {{$sale_detail->quantity}} </p>
                            </div>
                            <div>
                                <p> ￥{{$sale_detail->amount}} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            
            <div class='amount'>
                <div class="Sub">
                    <div class="subtotal">小計</div>
                    @if ( isset($sale->amount) )
                        <div>￥{{$sale->amount}}</div>
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
                    @if ( isset($sale->amount) )
                        <div class="sumNum">￥{{$sale->amount + 800}}</div>
                    @else
                        <div>￥800</div>
                    @endif
                </div>
            </div>
        </p>

        <div>
            <h2>お届け先情報</h2>
            <div class="deliveryContainer">
                <h4>郵便番号</h4>
                @if( isset($user->post_code) )
                    <input class="postcode" type='text' name='post_code' value='{{$user->post_code}}' readonly>
                @else
                    <input class="postcode" type='text' name='post_code'>
                @endif
            </div>
            <div class="deliveryContainer">
                <h4>住所</h4>
                @if( isset($user->address) )
                    <input class="address" type='text' name='address' value='{{$user->address}}' readonly>
                @else
                    <input class="address" type='text' name='address'>
                @endif
            </div>
        </div>
    </div>


    {{-- フッターのインポート --}}
</body>
</html>
