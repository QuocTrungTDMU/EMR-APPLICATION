<x-guest-layout>
    <div class="fixed inset-0 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="mx-auto w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Xác thực email</h2>
                <p class="text-gray-600 text-sm">Chúng tôi đã gửi link kích hoạt đến email của bạn</p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                <p class="text-green-700 text-sm">{{ session('success') }}</p>
            </div>
            @endif

            <!-- User Info -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Email được gửi đến:</p>
                <p class="font-semibold text-gray-800">{{ $user->email }}</p>
                @if(isset($user->name))
                <p class="text-sm text-gray-600 mt-2">Tài khoản: {{ $user->name }}</p>
                @endif
            </div>

            <!-- Instructions -->
            <div class="mb-6">
                <h3 class="font-semibold text-gray-800 mb-3">Hướng dẫn kích hoạt:</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">1.</span>
                        Kiểm tra hộp thư email của bạn
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">2.</span>
                        Tìm email từ {{ config('app.name') }}
                    </li>
                    <li class="flex items-start">
                        <span class="text-blue-500 mr-2">3.</span>
                        Click vào nút "Kích hoạt tài khoản"
                    </li>
                </ul>
            </div>

            <!-- Resend Email Button -->
            <div class="mb-6">
                @if(isset($is_guest) && $is_guest)
                <!-- Form cho guest user -->
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $user->email }}">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300">
                        Gửi lại email kích hoạt
                    </button>
                </form>
                @else
                <!-- Form cho authenticated user -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300">
                        Gửi lại email kích hoạt
                    </button>
                </form>
                @endif
            </div>

            <!-- Additional Info -->
            <div class="text-center text-sm text-gray-500">
                <p class="mb-2">Không nhận được email?</p>
                <p>Kiểm tra thư mục spam hoặc click "Gửi lại email"</p>
            </div>

            <!-- Back to Login -->
            <div class="text-center mt-6 pt-6 border-t border-gray-200">
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                    ← Quay lại đăng nhập
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>