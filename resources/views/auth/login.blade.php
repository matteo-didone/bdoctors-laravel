<x-guest-layout>
    <div class="py-6">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl lg:h-[34rem] bd_login-container">
            <div class="hidden lg:block lg:w-1/2 bg-cover bg-center bg-[url('../img/O.png')]"></div>
                <div class="w-full p-8 lg:w-1/2 flex flex-col justify-center">
                    <h2 class="text-2xl font-semibold text-gray-700 text-center">BDoctors</h2>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <x-input-label for="password" :value="__('Password')" />

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs text-gray-500">
                                    {{ __('Hai dimenticato la password?') }}
                                </a>
                            @endif
                        </div>
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ricordati di me') }}</span>
                        </label>
                    </div>

                    <div class="mt-8">
                        <button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600" type="submit">Accedi</button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="border-b border-black w-1/5 md:w-1/4"></span>
                        <a href="{{ route('register') }}" class="text-xs text-center text-gray-500 uppercase">Non hai un account? Registrati!</a>
                        <span class="border-b border-black w-1/5 md:w-1/4"></span>
                    </div>
                </div>
              </div>
        </form>
    </div>
</x-guest-layout>
