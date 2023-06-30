<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>UsenStudios 返品対応完了のお知らせ</title>
    <link rel="stylesheet" href="/css/confirm.css">
</head>
<body>
    {{-- ヘッダーのインポート --}}
    <div>
        <h1 class="U-S">UsenStudios</h1>
        <h2> 返品対応完了のお知らせ。</h2>
        <br>
        <h2> 料金の振込完了まで今しばらくお待ちください。 </h2>
        <div>
            注文ID：#{{$sale->id}}
        </div>
    </div>
    <div class="viewAll">
        <p>
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
    </div>


    {{-- フッターのインポート --}}
</body>
</html>
