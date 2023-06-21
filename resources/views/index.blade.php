<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top page</title>
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
</head>
<body>
    <header class="hedader">
        <div class="header_container">
            <img class="menu_container">
            <img class="menu_open" src ="/home/mn-honda/Usen-Studios/public/icon/hum-menu-open.png">
            <img class="menu_close" src="/home/mn-honda/Usen-Studios/public/icon/ham-menu-close.png">
        </div>
    </header>

    <nav class="wear_menu">
        <ul>
            <li class="mens_list">メンズ</li>
            <li>
                @foreach ($all_categories as $category)
                <a href="">
                    {{$category -> name}}
                </a>
                @endforeach
            </li>
            <li class="womens_list">ウィメンズ</li>
            <li>
                @foreach ($category as $category)
                <a href="">
                    {{$all_categories -> name}}
                </a>
                @endforeach
            </li>
        </ul>
    </nav>

</body>
</html>