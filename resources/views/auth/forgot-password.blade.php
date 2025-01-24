<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <x-primary-button class="mt-4 w-full justify-center">
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    
        <div class=" flex flex-col text-center mt-10">
            <x-link>
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </x-link>

            <x-link>
                <a href="{{ route('register') }}">
                    {{ __('Create account') }}
                </a>
            </x-link>
        </div>
    </form>
</x-guest-layout>
