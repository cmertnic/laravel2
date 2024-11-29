<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
         <!-- Name -->
         <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Имя"  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- MiddleName -->
        <div>
            <x-input-label for="middlename" :value="__('Фамилия')" />
            <x-text-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" required autofocus autocomplete="middlename" placeholder="Фамилия" />
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
        </div>
        <!-- SurName -->
        <div>
            <x-input-label for="surname" :value="__('Очество')" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" placeholder="Очество" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Электронная почта')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Почта" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        <!-- Tel -->
        <div>
            <x-input-label for="tel" :value="__('Телефон')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus autocomplete="tel" placeholder="телефон" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Login -->
        <div>
            <x-input-label for="Login" :value="__('Логин')" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="login" placeholder="логин" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" />
            
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Подтвердить пароль')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>




        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Уже зарегистрированы?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Регистрация') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
