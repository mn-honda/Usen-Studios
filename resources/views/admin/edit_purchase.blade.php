<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>仕入れ編集</title>
</head>
<body class="font-medium">
    <div><br><h1 class="text-3xl flex justify-center">仕入れ編集</h1><br></div>
    @foreach ($errors->all() as $error)
        <li class="flex justify-center"> <span class="error">{{ $error }}</span></li>
    @endforeach
    <br><br>
    <div class="font-medium flex justify-center">
        <form action="/admin/update_purchase/{{$edit_purchase->id}}" method="post">
            <input type="hidden" name="id" value="{{$edit_purchase->id}}">
            商品：
            <select name="product">
                    @foreach ($products as $product)
                        <option value={{$product->id}}
                            @if($product->id==$edit_purchase->product_id){
                                selected
                            }@endif>
                        {{$product->name}}</option>
                    @endforeach
                </select><br><br>
            個数：
            <input type="number" name="quantity" value="{{$edit_purchase->quantity}}" min="1"><br><br>
            日付：
            <input type="date" name="date" value="{{$edit_purchase->date}}"><br><br><br><br>
            <div class="text-center">
                <input type="submit" value="送信" class="ml-2 rounded-lg bg-blue-500 p-2 text-white hover:bg-blue-600">
            </div>
            @csrf
        </form>
    </div>
    <br><br>
    <a href="/admin/purchase_list" class="flex justify-center">▶仕入れ一覧画面</a>
</body>
</html>
