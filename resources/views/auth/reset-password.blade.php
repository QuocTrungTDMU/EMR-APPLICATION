<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Reset Password') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
<x-guest-layout>
    <div class="fixed inset-0 bg-blue-50 flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 mx-4">
            <div class="text-center mb-6">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Medik Logo" class="mx-auto h-12">
                <h2 class="text-2xl font-bold text-blue-600 mt-2">{{ __('Đặt lại mật khẩu') }}</h2>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }}</label>
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                    @if ($errors->has('email'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Mật khẩu mới') }}</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                    @if ($errors->has('password'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Xác nhận mật khẩu') }}</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                    @if ($errors->has('password_confirmation'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                        {{ __('Đặt lại mật khẩu') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
</body>
</html>