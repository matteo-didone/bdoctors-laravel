<x-guest-layout>
    <div class="py-6">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl lg:h-[38rem] bd_login-container">
                <div class="hidden lg:block lg:w-1/2 bg-cover bg-[url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')]"></div>
                <div class="w-full p-8 lg:w-1/2 flex flex-col justify-center">
                    <h2 class="text-2xl font-semibold text-gray-700 text-center">BDoctors</h2>
                
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                    
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                    
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                
                    <!-- Register -->
                    <div class="mt-8">
                        <button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600" type="submit">Registrati</button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="border-b border-black w-1/5 md:w-1/4"></span>
                        <a href="{{ route('login') }}" class="text-xs text-center text-gray-500 uppercase">Sei gia registrato? Accedi!</a>
                        <span class="border-b border-black w-1/5 md:w-1/4"></span>
                    </div>
                </div>
              </div>
        </form>
    </div>
</x-guest-layout>
