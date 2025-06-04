<x-guest-layout>
    <div class="fixed inset-0 bg-blue-50 flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 mx-4">
            <div class="text-center mb-6">
                <img src="{{ asset('storage/logo.png') }}" alt="Medik Logo" class="mx-auto h-12">
                <h2 class="text-2xl font-bold text-blue-600 mt-2">Quên mật khẩu</h2>
            </div>

            <!-- Thông báo -->
            <div class="mb-6 text-sm text-gray-600 text-center bg-blue-50 p-4 rounded-lg">
                Quên mật khẩu? Không sao cả. Chỉ cần nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn liên kết đặt lại mật khẩu.
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 bg-green-50 p-4 rounded-lg text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                        Gửi liên kết đặt lại mật khẩu
                    </button>
                </div>
            </form>

            <p class="text-sm text-center text-gray-600">
                Nhớ lại mật khẩu?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Quay lại đăng nhập</a>
            </p>
        </div>
    </div>
</x-guest-layout>