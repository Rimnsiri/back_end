<x-guest-layout class="w-full max-w-[1200px] mx-auto" >
    <div class="font-[sans-serif] ">
      <div class="grid md:grid-cols-2 items-center gap-8 h-full">
        <div class="max-md:order-1 p-4  h-full">
            <img src="https://readymadeui.com/signin-image.webp" class="lg:max-w-[90%] w-full h-full object-contain block mx-auto" alt="login-image" />
          </div>
          <div class="flex items-center justify-center p-6 h-full w-full">
            <form method="POST" action="{{ route('register') }}" class="max-w-lg w-full mx-auto">
                <div class="mb-6">
                    <h3 class="text-blue-500 md:text-3xl text-2xl font-extrabold max-md:text-center">Créer un compte</h3>
                  </div>
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <div class="relative flex items-center">
                        <x-text-input id="name" class="w-full bg-transparent text-sm border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                   
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    
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
        
                <div class="mt-12">
                   
        
                    <x-primary-button >
                        {{ __('Register') }}
                    </x-primary-button>
                    <a class="text-blue-500 font-semibold hover:underline ml-1" href="{{ route('login') }}">
                        <p class="text-sm mt-6 text-gray-800">{{ __('Already registered?') }}</p>
                    </a>
                </div>
            </form>
          </div>
      </div>
    </div>
    
</x-guest-layout>
