<html>
    <head>
        <title> 領収書 </title>
        <style>
            @font-face{
                font-family: ipag;
                font-style: bold;
                font-weight: bold;
                src: url("{{ storage_path('/fonts/IPAfont00303/ipagp.ttf') }}") format('truetype');
            }
            @font-face{
                font-family: ipag;
                font-style: normal;
                font-weight: normal;
                src: url("{{ storage_path('/fonts/IPAfont00303/ipag.ttf') }}") format('truetype');
            }
            body {
                font-family: ipag;
            }
            </style>
            <link rel="stylesheet" href="{{public_path('/css/receipt.css')}}">
    </head>
    <body>
        <div class="viewAll">
            <h1> Usen Studios </h1>
            <h4>目黒セントラルスクエア店
                <br>
                東京都品川区大崎１１１ー１１ー１
            </h4>
            <h2> 領収書 </h2>
            <h2> {{ $sale->user->name }} 様 </h2>
            <div>
                {{ $sale->created_at }}
            </div>
            <div>
                <table>
                    <tr>
                        <th> 購入商品 </th>
                        <th> 料金 </th>
                    </tr>
                    @foreach($sale->sale_details as $sale_detail)
                        <tr>
                            <td> {{ $sale_detail->product->name }} <td>
                            <td> {{ $sale_detail->product->price }} <td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div>
                <table>
                    <tr>
                        <td> 小計: <td>
                        <td> ￥{{ $sale->amount }} <td>
                    </tr>
                    <tr>
                        <td> 送料: <td>
                        <td> ￥800 <td>
                    </tr>
                    <tr>
                        <td> 合計: <td>
                        <td> ￥{{ $sale->amount + 800 }} <td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
    </body>
</html>