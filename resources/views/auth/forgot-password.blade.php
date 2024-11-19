<x-guest-layout>
   

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="font-[sans-serif]">
        <div class=" max-w-6xl max-md:max-w-lg rounded-md p-6">
            <div class="grid md:grid-cols-2 items-center gap-8">
                <div class="max-md:order-1 lg:min-w-[450px]">
                  <img src="https://readymadeui.com/signin-image.webp" class="lg:w-11/12 w-full object-cover" alt="login-image" />
                </div>
                
                <form method="POST" action="{{ route('password.email') }}">
                    <div class="mb-12">
                        <h3 class="text-4xl font-extrabold text-blue-600">Mot de passe oublié?</h3>
                      </div>
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</x-guest-layout>
