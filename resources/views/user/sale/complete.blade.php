<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>購入完了</title>
    <link rel="stylesheet" href="/css/complete.css">
</head>
<body>
    {{-- ヘッダーのインポート --}}
    <x-header-component></x-header-component>
    
    <div>
        <h1 class="U-S">UsenStudios</h1>
        <h2>ご購入ありがとうございました！</h1>
        <br>
        <br>
        <h2>またのご利用お待ちしております！</h1>
    </div>

    {{-- フッターのインポート --}}
    @include("/header_footer.footer")
</body>
</html>
