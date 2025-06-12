<x-guest-layout>
    <div class="fixed inset-0 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-8 text-center">
            @if($success)
            <!-- Success State -->
            <div class="mb-8">
                <!-- Success Icon with Animation -->
                <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mb-6 animate-pulse">
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <!-- Success Title -->
                <h2 class="text-3xl font-bold text-green-600 mb-4">{{ $title }}</h2>

                <!-- Success Message -->
                <p class="text-gray-600 text-lg leading-relaxed">{{ $message }}</p>

                <!-- User Info -->
                @if($user)
                <div class="mt-6 p-4 bg-green-50 rounded-lg border border-green-200">
                    <h3 class="font-semibold text-green-800 mb-2">Thông tin tài khoản:</h3>
                    <div class="text-sm text-green-700 space-y-1">
                        <p><span class="font-medium">Tên:</span> {{ $user->name }}</p>
                        <p><span class="font-medium">Email:</span> {{ $user->email }}</p>
                        @if($user->phone)
                        <p><span class="font-medium">Điện thoại:</span> {{ $user->phone }}</p>
                        @endif
                        <p><span class="font-medium">Trạng thái:</span>
                            <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                ✓ Đã kích hoạt
                            </span>
                        </p>
                    </div>
                </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                @if(isset($show_login_button) && $show_login_button)
                <a href="{{ route('login') }}"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-4 rounded-xl font-semibold text-lg inline-block hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    🚀 Đăng nhập ngay
                </a>
                @endif

                <a href="{{ route('homepage') ?? '/' }}"
                    class="w-full bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold inline-block hover:bg-gray-200 transition-all duration-300">
                    ← Về trang chủ
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h4 class="font-semibold text-blue-800 mb-2">🎉 Chúc mừng!</h4>
                <p class="text-blue-700 text-sm">
                    Tài khoản của bạn đã sẵn sàng sử dụng. Hãy đăng nhập để khám phá các tính năng tuyệt vời của chúng tôi!
                </p>
            </div>

            @else
            <!-- Error State -->
            <div class="mb-8">
                <!-- Error Icon -->
                <div class="mx-auto w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <!-- Error Title -->
                <h2 class="text-2xl font-bold text-red-600 mb-4">{{ $title }}</h2>

                <!-- Error Message -->
                <p class="text-gray-600 leading-relaxed">{{ $message }}</p>

                <!-- User Info (if available) -->
                @if($user)
                <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                    <p class="text-yellow-800 text-sm">
                        <span class="font-medium">Email liên quan:</span> {{ $user->email }}
                    </p>
                </div>
                @endif
            </div>

            <!-- Action Buttons for Error -->
            <div class="space-y-4">
                <a href="{{ route('register') }}"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-xl font-semibold inline-block hover:shadow-lg transition-all duration-300">
                    Đăng ký tài khoản mới
                </a>

                <a href="{{ route('login') }}"
                    class="w-full bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold inline-block hover:bg-gray-200 transition-all duration-300">
                    Thử đăng nhập
                </a>

                <a href="{{ route('homepage') ?? '/' }}"
                    class="w-full border border-gray-300 text-gray-600 py-3 rounded-xl font-semibold inline-block hover:bg-gray-50 transition-all duration-300">
                    ← Về trang chủ
                </a>
            </div>

            <!-- Help Section -->
            <div class="mt-8 p-4 bg-gray-50 rounded-lg">
                <h4 class="font-semibold text-gray-800 mb-2">Cần hỗ trợ?</h4>
                <p class="text-gray-600 text-sm">
                    Nếu bạn tiếp tục gặp vấn đề, vui lòng liên hệ với chúng tôi qua email hỗ trợ.
                </p>
            </div>
            @endif
        </div>
    </div>

    <!-- Success Animation (Optional) -->
    @if($success)
    <style>
        @keyframes confetti {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #f39c12;
            animation: confetti 3s linear infinite;
        }
    </style>

    <script>
        // Simple confetti effect
        document.addEventListener('DOMContentLoaded', function() {
            for (let i = 0; i < 30; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.backgroundColor = ['#f39c12', '#e74c3c', '#9b59b6', '#3498db', '#2ecc71'][Math.floor(Math.random() * 5)];
                    confetti.style.animationDelay = Math.random() * 3 + 's';
                    document.body.appendChild(confetti);

                    setTimeout(() => confetti.remove(), 3000);
                }, i * 100);
            }
        });
    </script>
    @endif
</x-guest-layout>