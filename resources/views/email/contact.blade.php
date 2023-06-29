<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>購入完了</title>
</head>
<body>

    <h1>CONTACT</h1>

        {{-- <div> --}}
            {{-- ご注文日時: {{ date('Y-m-d', $sale->date) }} --}}
        {{-- </div> --}}
        <div>
            <h1>お問い合わせありがとうございます。</h1>
                <div>
                   <h2>件名：</h2>
                    <p>{{$inquiry->title}}</p>
                </div>
                <div>
                   <h2>注文詳細ID：</h2>
                   <p>#{{$inquiry->sale_detail_id}}</p>
                </div>
                <div>
                    <h2> お問い合わせ内容 </h2>
                    <p> {{$inquiry->detail}} </p>
                </div>
        </div>
       
    {{-- フッターのインポート --}}
</body>
</html>
