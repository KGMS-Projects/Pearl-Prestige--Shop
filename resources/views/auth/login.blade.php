<x-guest-layout>
    <style>
        /* Custom styles to match your admin dashboard */
        .luxury-bg {
            background: linear-gradient(135deg, #f9f9f9 0%, #f0f0f0 100%);
        }

        .luxury-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .luxury-input {
            border-radius: 8px;
            border: 1px solid rgba(154, 52, 18, 0.3);
            transition: all 0.3s ease;
        }

        .luxury-input:focus {
            border-color: #9a3412;
            box-shadow: 0 0 0 1px #9a3412;
        }

        .luxury-button {
            background-color: #9a3412;
            color: white;
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .luxury-button:hover {
            background-color: rgba(154, 52, 18, 0.8);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(154, 52, 18, 0.3);
        }

        .luxury-button-outline {
            background-color: transparent;
            color: #9a3412;
            border: 1px solid #9a3412;
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .luxury-button-outline:hover {
            background-color: rgba(154, 52, 18, 0.1);
            transform: translateY(-2px);
        }

        .luxury-link {
            color: #666;
            transition: all 0.3s ease;
        }

        .luxury-link:hover {
            color: #9a3412;
        }

        .luxury-text {
            color: #666;
        }

        .luxury-title {
            font-family: 'Cormorant Garamond', serif;
            color: #1a1a1a;
            font-size: 2rem;
            font-weight: 300;
        }

        .luxury-label {
            font-family: 'Montserrat', sans-serif;
            color: #666;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .luxury-errors {
            color: #dc2626;
            background: #fee2e2;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .luxury-status {
            color: #059669;
            background: #d1fae5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .auth-footer {
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid rgba(154, 52, 18, 0.1);
            text-align: center;
        }

        .auth-footer-text {
            color: #666;
            font-size: 0.875rem;
            margin-bottom: 12px;
        }
    </style>

    <div class="min-h-screen luxury-bg flex items-center justify-center p-6">
        <div class="luxury-card w-full max-w-md p-8">


            <h1 class="luxury-title text-center mb-6">Pearl & Prestige</h1>

            <x-validation-errors class="luxury-errors" />

            @session('status')
            <div class="luxury-status">
                {{ $value }}
            </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="luxury-label" />
                    <x-input id="email" class="luxury-input block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="luxury-label" />
                    <x-input id="password" class="luxury-input block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" class="rounded border-gray-300 text-amber-600 shadow-sm focus:ring-amber-500" />
                        <span class="ms-2 text-sm luxury-text">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                    <a class="luxury-link text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-button class="luxury-button">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

            <div class="auth-footer">
                <p class="auth-footer-text">Don't have an account?</p>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="luxury-button-outline inline-flex items-center px-4 py-2">
                    {{ __('Create Account') }}
                </a>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>