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
            padding: 12px 24px;
            transition: all 0.3s ease;
        }

        .luxury-button:hover {
            background-color: rgba(154, 52, 18, 0.8);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(154, 52, 18, 0.3);
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

        .luxury-subtitle {
            font-family: 'Montserrat', sans-serif;
            color: #666;
            font-size: 1rem;
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

        .luxury-select {
            border-radius: 8px;
            border: 1px solid rgba(154, 52, 18, 0.3);
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239a3412' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
        }

        .luxury-select:focus {
            border-color: #9a3412;
            box-shadow: 0 0 0 1px #9a3412;
        }

        .terms-text {
            font-size: 0.875rem;
            color: #666;
        }

        .terms-link {
            color: #9a3412;
            text-decoration: underline;
        }

        .input-icon {
            color: rgba(154, 52, 18, 0.5);
        }
    </style>

    <div class="min-h-screen luxury-bg flex items-center justify-center p-6">
        <div class="luxury-card w-full max-w-md p-8">


            <h1 class="luxury-title text-center mb-2">Create Your Account</h1>
            <p class="luxury-subtitle text-center mb-6">Join Pearl & Prestige</p>

            <x-validation-errors class="luxury-errors" />

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <x-label for="name" value="{{ __('Full Name') }}" class="luxury-label" />
                    <div class="relative">
                        <x-input id="name"
                            class="luxury-input block w-full pl-4 pr-10 py-3"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Email Field -->
                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="luxury-label" />
                    <div class="relative">
                        <x-input id="email"
                            class="luxury-input block w-full pl-4 pr-10 py-3"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="Enter your email" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Role Selection Field -->
                <div>
                    <x-label for="role" value="{{ __('Account Type') }}" class="luxury-label" />
                    <select id="role"
                        name="role"
                        class="luxury-select block w-full px-4 py-3"
                        required>
                        <option value="">{{ __('Select account type') }}</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                            {{ __('Customer') }}
                        </option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                            {{ __('Administrator') }}
                        </option>
                    </select>
                </div>

                <!-- Password Field -->
                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="luxury-label" />
                    <div class="relative">
                        <x-input id="password"
                            class="luxury-input block w-full pl-4 pr-10 py-3"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-1 text-xs luxury-text">Must be at least 8 characters</p>
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="luxury-label" />
                    <div class="relative">
                        <x-input id="password_confirmation"
                            class="luxury-input block w-full pl-4 pr-10 py-3"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Terms and Privacy Policy -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <x-checkbox name="terms"
                            id="terms"
                            class="rounded border-gray-300 text-amber-600 shadow-sm focus:ring-amber-500"
                            required />
                    </div>
                    <div class="ml-3">
                        <label for="terms" class="terms-text">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-link">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-link">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </label>
                    </div>
                </div>
                @endif

                <!-- Submit Button -->
                <div class="pt-2">
                    <x-button class="luxury-button w-full">
                        {{ __('Create Account') }}
                    </x-button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-4">
                    <p class="text-sm luxury-text">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="luxury-link font-medium">
                            {{ __('Sign in') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>