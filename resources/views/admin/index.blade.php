<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理者トップページ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium mt-16">
    <div class="text-center text-9xl font-medium mt-16">UsenStudios</div>
    <div class="text-center text-3xl font-medium">Admin</div><br><br>
    <div class="text-3xl flex justify-center">
        <table class="bg-gray-100 border-b border border-gray-600 text-center">
                <tr class="border border-gray-600">
                    <td class="px-10 py-5"><a href="/admin/product_register">商品登録</a></td>
                </tr>
                <tr class="border border-gray-600">
                    <td class="px-10 py-5"><a href="/admin/purchase_register">仕入れ登録</a></td>
                </tr>
                <tr class="border border-gray-600">
                    <td class="px-10 py-5"><a href="/admin/purchase_list">仕入れ一覧</a></td>
                </tr>
                <tr class="border border-gray-600">
                    <td class="px-10 py-5"><a href="/admin/stock_list">　在庫一覧</a></td>
                </tr>
                <tr class="border border-gray-600">
                    <td class="px-10 py-5"><a href="/admin/sale_list">　売上一覧</a></td>
                </tr>
                <tr class="border border-gray-600">
                    <td class="px-10 py-5"><a href="/admin/contact_list">　お問い合わせ一覧　</a></td>
                </tr>
        </table>
    </div><br><br>
    <div class="text-center border divide-x">
        <a href="/index">トップページ</a>
    </div><br>
</body>
</html>
