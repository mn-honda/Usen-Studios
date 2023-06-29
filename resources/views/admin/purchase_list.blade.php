<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仕入れ一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium"><br>
    <div class="text-right">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　仕入れ登録</a>
        <a href="stock_list">　在庫一覧</a>
        <a href="sale_list">　売上一覧</a>
        <a href="contacts_list">　お問い合わせ一覧　</a>
    </div>
    <div><br><h1 class="text-3xl flex justify-center">仕入れ一覧</h1><br></div>
    <div class="flex justify-center">
        <table>
            <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                <th class="px-10 py-5">商品ID</th>
                <th class="px-10 py-5">商品名</th>
                <th class="px-10 py-5">写真</th>
                <th class="px-10 py-5">個数</th>
                <th class="px-10 py-5">日付</th>
                <th class="px-10 py-5"></th>
                <th class="px-10 py-5"></th>
            </tr>
            @foreach($purchases as $purchase)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td>{{$purchase->product_id}}</td>
                    <td>{{$purchase->product->name}}</td>
                    <td>@foreach($purchase->product->image as $image)
                            <img src="{{$image->filepath}}" alt="" width=150 heght=300>
                        @endforeach
                    </td>
                    <td>{{$purchase->quantity}}</td>
                    <td>{{$purchase->date->format('Y/m/d')}}</td>
                    <td>
                        <form action="edit_purchase/{{$purchase->id}}" method="post">
                            <input type="hidden" name="id" value="{{$purchase->id}}">
                            <input type="submit" value="編集" class="ml-2 rounded-lg bg-green-500 p-2 text-white hover:bg-green-600">
                            @csrf
                        </form>
                    <td><form action="" method="post" onclick='return confirm_delete()'>
                            <input type="hidden" name="id" value="{{$purchase->id}}">
                            <input type="hidden" name="product_id" value="{{$purchase->product_id}}">
                            <input type="submit" value="削除" class="ml-2 rounded-lg bg-red-500 p-2 text-white hover:bg-red-600">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div><br>
    <div class="text-center border divide-x mb-4">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　　仕入れ登録</a>
        <a href="stock_list">　　在庫一覧</a>
        <a href="sale_list">　　売上一覧</a>
        <a href="contact_list">　　お問い合わせ一覧</a>
    </div>

</body>
</html>

<script>
    function confirm_delete() {
        var select = confirm("本当に削除しますか？");

        if (!select) {
            alert("削除をキャンセルしました");
            return select;
        }
    }
</script>
