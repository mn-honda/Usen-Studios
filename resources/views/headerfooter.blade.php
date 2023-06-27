<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Top page</title>
</head>
<body>
    <header>
        <div class="header_container">
        <!-- メニューアイコン -->
        <div class="menu_container">
            <div>
                <img class="menu_open" src ="/icon/ham-menu-open.png">
            </div>
            <!-- <img class="menu_close" src="/icon/ham-menu-close.png"> -->
        
            <!-- 検索バナー -->
            <div class="search_container">
                <form class="searchForm">
                    <input type="search" class="text" placeholder="検索">
                    <button type="submit" value="検索"><img class="search_icon" src="/icon/search-icon.png" alt="" wdth="10" height="10"></button>
                </form>
            </div>
        
                        <!-- アカウントアイコン -->
            <div class="acount_container">
                <a href="">
                    <img class="acountIcon" src="/icon/account_icon.png">
                </a>

                <a href="/cart">
                    <img class="cartIcon" src="/icon/cart_icon.png">
                </a>
            </div>
        </div>

            <!-- メニューバナーのナビゲーション -->
            <nav class="category_menu">
                <ul>
                    <li class="mens_list">メンズ</li>
                    <li class="mens_category_list">
                        @foreach ($all_categories as $category)
                        <a href="/product/{{$category -> id}}?gender=メンズ">
                            {{$category -> name}}<br>
                        </a>
                        @endforeach
                    </li>
                    <li class="womens_list">ウィメンズ</li>
                    <li class="womens_category_list">
                        @foreach ($all_categories as $category)
                        <a href="/product/{{$category -> id}}?gender=ウィメンズ">
                            {{$category -> name}}<br>
                        </a>
                        @endforeach
                    </li>
                </ul>
            </nav>

            <!-- アカウントバナー -->
            <nav class="acount">
                <ul>
                    <li class="acountList">
                        <a href="">メンバー登録</a><br>
                        <a href="">サインイン</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <footer class="footer">
        <div class="lang">
            <select name="select_language">
                <optgroup label="language">
                    <option value="ja">日本語</option>
                    <option value="en">英語</option>
                    <option value="kore">韓国語</option>
                </optgroup>
            </select>
        </div>

        <div>
            <a class="contact_container" href="">コンタクトフォーム</a>
        </div>
    </footer>

    <script>
        const MenuContainer = document.querySelector('.menu_container');
        const MenuOpen = document.querySelector('.menu_open');
        const MenuClose = document.querySelector('.menu_close');
        const WearMenu = document.querySelector('.wear_menu');
        MenuContainer.addEventListener('click', () => {
            MenuOpen.classList.toggle('active');
            MenuClose.classList.toggle('active');
            WearMenu.classList.toggle('active');
	});
    </script>
</body>
</html>