<div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <title>Top page</title>
</head>
<header>
    <div class="header_container">
        <!-- メニューアイコン -->
        <div class="menu_container">
            <div class="openbtn1">
                <img class="menu_open" src ="/icon/ham-menu-open.png">
            </div>
            <!-- <img class="menu_close" src="/icon/ham-menu-close.png"> -->
        
            <!-- 検索バナー -->
            <div class="search_container">
                <form action="/product" method="get" class="searchForm">
                    <input type="text" name="search_word" class="text" placeholder="検索">
                    <button type="submit" value="検索"><img class="search_icon" src="/icon/search-icon.png" alt="" wdth="10" height="10"></button>
                    @csrf
                </form>
            </div>

            @auth
            <div class="auth">
                {{Auth::user()->name}}様
            </div>
            @endauth
            
            <div class="acount_container">
                <!-- アカウントアイコン -->
                <a href="/user/list">
                    <img class="acountIcon" src="/icon/account_icon.png">
                </a>

                <!-- カートアイコン -->
                <a href="/cart">
                    <img class="cartIcon" src="/icon/cart_icon.png">
                </a>
            </div>
        </div>

        <!-- メニューバナーのナビゲーション -->
        <nav id="g-nav">
            <div class="A">
            <ul>
                メンズ
                    @foreach ($all_categories as $category)
                    <li class="mens_category_list"><a href="/product/{{$category -> id}}?gender=メンズ">
                        {{$category -> name}}<br>
                    </a></li>
                    @endforeach
            </ul>
            <ul>
                ウィメンズ
                    @foreach ($all_categories as $category)
                    <li class="womens_category_list"><a href="/product/{{$category -> id}}?gender=ウィメンズ">
                        {{$category -> name}}<br>
                    </a></li>
                    @endforeach
            </ul>
            <a href="/index" class="home">ホーム</a>
                
            <ul>
                @auth
                    <form action="{{route('logout')}}" method="post" name="form1">
                        <li class="acountList"><a href="javascript:form1.submit()">サインアウト</a></li>
                        @csrf
                    </form>
                @endauth
                @guest
                    <form action="/index" method="post" name="form2">
                        <li class="acountList"><a href="javascript:form2.submit()">サインイン</a></li>
                        @csrf
                    </form>
                @endguest
            </ul>
            </div>    
        </nav>
        </div>
    </header>
</div>