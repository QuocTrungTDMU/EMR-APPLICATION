<x-guest-layout>
    <div class="fixed inset-0 bg-blue-50 flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 mx-4">
            <div class="text-center mb-6">
               <img src="{{ asset('storage/logo.png') }}" alt="Medik Logo" class="mx-auto h-12">
                <h2 class="text-2xl font-bold text-blue-600 mt-2">Đăng nhập tài khoản</h2>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mật khẩu</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="text-blue-500 border-gray-300 rounded mr-2">
                        <span class="text-sm text-gray-600">Ghi nhớ tôi</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                        Quên mật khẩu?
                    </a>
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                        Đăng nhập
                    </button>
                </div>
            </form>

            <p class="text-sm text-center text-gray-600">
                Bạn chưa có tài khoản?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Đăng ký ngay</a>
            </p>
        </div>
    </div>
</x-guest-layout>