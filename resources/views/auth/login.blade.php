<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<div class="font-[sans-serif]">
<div class=" max-w-6xl max-md:max-w-lg rounded-md p-6">
    <div class="grid md:grid-cols-2 items-center gap-8">
        <div class="max-md:order-1 lg:min-w-[450px]">
          <img src="https://readymadeui.com/signin-image.webp" class="lg:w-11/12 w-full object-cover" alt="login-image" />
        </div>
        <form method="POST" action="{{ route('login') }}" class="md:max-w-md w-full mx-auto">
            <div class="mb-12">
                <h3 class="text-4xl font-extrabold text-blue-600">Se connecter</h3>
              </div>
            @csrf
    
            <!-- Email Address -->
            <div>
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
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
          
              <!-- Remember Me -->
            
            <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" name="remember">
                    <span class="text-gray-800 ml-3 block text-sm">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                <a class="text-blue-600 font-semibold text-sm hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
               @endif
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button >
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
</div>
</div>
    
</x-guest-layout>
