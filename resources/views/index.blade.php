
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
            <!-- カートアイコン -->
            <!-- <div class="cart_container">
                <a href="/cart">
                    <img class="cartIcon" src="/icon/cart_icon.png">
                </a>
            </div> -->
        </div>

            <!-- <nav class="acount">
                <ul>
                    <li class="acountList">
                        <a href="">メンバー登録</a><br>
                        <a href="">サインイン</a>
                    </li>

                </ul>
            </nav> -->


            
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

            <!-- 検索バナー -->
            <!-- <div class="search_container">
                <form class="searchForm">
                    <input type="search" class="text" placeholder="検索">
                    <button type="submit" value="検索"><img class="search_icon" src="/icon/search-icon.png" alt="" wdth="10" height="10"></button>
                </form>
            </div> -->

            <!-- アカウントアイコン -->
            <!-- <div class="acount_container">
                <a href="">
                    <img class="acountIcon" src="/icon/account_icon.png">アカウント
                </a>
            </div> -->

            <nav class="acount">
                <ul>
                    <li class="acountList">
                        <a href="">メンバー登録</a><br>
                        <a href="">サインイン</a>
                    </li>
                </ul>
            </nav>

            <!-- カートアイコン -->
            <!-- <div class="cart_container">
                <a href="/cart">
                    <img class="cartIcon" src="/icon/cart_icon.png">カート
                </a>
            </div> -->
        </div>
    </header>

    <!-- 画面全体 div -->
    <div class="main_container">
        <div class="logo_container">
            <img class="U-logo" src="/icon/UsenStudios_logo.png">
        </div>
        <div class="headLine">
            <h1 class="U-S">UsenStudios</h1>
        </div>
        <div class="USexp">
            <p class="USexp_message">
                Usen Studios は USEN-NEXT GROUP 23卒入社の
                <br>
                ITエンジニア配属のH.H, K.S, M.O, M.H の4人で立ち上げた                UNG史上初のアパレルブランドです。
                <br>
                <br>
                当コレクションは、デザインとディテール両方に対する
                <br>
                4人のこだわりを色濃く反映し、丁寧な縫製を重視しつつ様々な素材や独自開発のファブリックを使用しています。
                <br>
                <br>
                当コレクションでは、men’sおよびwomen’sの
                <br>
                レディ・トゥ・ウェア、フットウェア、アクセサリー、デニムアイテムを展開しています。
                <br>
                <br>
                <br>
                *ブランドのすべてはフィクションでございます。*
            </p>
        </div>
        <div class="messageArea">
            <p class="messageLine">
                -DELIVERY
                <br>
                ご購入いただいた商品は、ご入金確認後、3~5営業日以内に発送いたします。（土日祝除く）
                <br>
                <br>
                配送業者の繁忙期・年末年始・悪天候時は、配送状況・交通事情によりお届けが遅れる場合がございます。
                <br>
                あらかじめご了承ください。
                <br>
                <br>
                配送料は一律880円いただいております。
                <br>
                <br>
                <br>
                -RETURNS AND EXCHANGES
                <br>
                お客様都合による返品・交換・キャンセルはお断り申し上げます。
                <br>
                <br>
                商品の不良、ご配送がございましたらお問い合わせフォームよりご連絡をいただくようお願いいたします。
                <br>
                <br>
                商品到着から7日以降の返品・交換はお受けできかねますので、商品ご到着後は速やかな商品状態確認の
                <br>
                ご対応よろしくお願いいたします。
                <br>
                <br>
                <br>
                -PAYMENT METHODS
                <br>
                以下のお支払方法をご利用いただけます。
                <br>
                ・クレジットカード決済
                <br>
                ・キャリア決済
                <br>
                ・銀行振込
                <br>
                ・コンビニ決済
                <br>
                ・PayPAL
            </p>
        </div>
    </dev>

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