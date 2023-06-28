<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="/js/post_api.js"></script>
<title>会員登録</title>
<x-guest-layout>
    <div class="text-center text-xl">新規登録</div><br>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('お名前')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Eメールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード（再確認）')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <br>
        <!--
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        -->

        <!-- Post　Cord -->
        <div>
            <x-input-label for="post_code" :value="__('郵便番号（半角数字ハイフンなし）')" />
            
            <x-text-input id="post_code" class="mt-1 w-20" type="text" name="post_code1" :value="old('post_code1')" required autofocus autocomplete="post_code1" placeholder="1234567"/>
            <input type="button" value="住所検索" id="search_address_btn" class="ml-4 border-gray-400 border-2" >
            <x-input-error :messages="$errors->get('post_code')" class="mt-2" />
        </div>
        <br>
        <!-- 住所 -->
        <div>
            <x-input-label for="address" :value="__('住所')" />
            <x-text-input id="address" class="block mt-1 w-full"  type="text" name="address" :value="old('address')" required autofocus autocomplete="address" placeholder="例：東京都目黒区上大崎1-1-1"/>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <br>

        <div>
            <x-input-label for="building_name" :value="__('建物名')" />
            <x-text-input id="building_name" class="block mt-1 w-full" type="text" name="building_name" :value="old('building_name')" required autofocus autocomplete="building_name" placeholder="例：目黒セントラルスクエア"/>
            <x-input-error :messages="$errors->get('building_name')" class="mt-2" />
        </div>
        <br>

        <div class="flex justify-center">
            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
