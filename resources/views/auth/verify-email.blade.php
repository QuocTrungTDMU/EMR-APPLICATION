<x-guest-layout>
    <div class="fixed inset-0 bg-blue-50 flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 mx-4">
            <div class="text-center mb-6">
                <img src="{{ asset('storage/logo.png') }}" alt="Medik Logo" class="mx-auto h-12">
                <h2 class="text-2xl font-bold text-blue-600 mt-2">Xác minh địa chỉ email</h2>
            </div>

            <div class="text-sm text-gray-600 mb-4">
                Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào liên kết chúng tôi vừa gửi qua email. Nếu bạn không nhận được email, chúng tôi sẽ gửi lại cho bạn một email khác.
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm text-green-600 font-medium">
                    Một liên kết xác minh mới đã được gửi đến địa chỉ email bạn đã cung cấp.
                </div>
            @endif

            <div class="mt-6 space-y-4">
                <!-- Resend Verification Email -->
                <form method="POST" action="{{ route('verification.send') }}" id="resend-form">
                    @csrf
                    <button id="resend-button" type="submit"
                        class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                        Gửi lại email xác minh
                    </button>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-sm text-gray-600 hover:underline hover:text-blue-600 transition duration-200">
                        Đăng xuất
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <script>
        const resendButton = document.getElementById('resend-button');
        const form = document.getElementById('resend-form');
        let cooldownSeconds = 30; 

        form.addEventListener('submit', function (e) {
            resendButton.disabled = true;
            resendButton.classList.add('opacity-50', 'cursor-not-allowed');
            let remaining = cooldownSeconds;

            const originalText = resendButton.textContent;
            resendButton.textContent = `Vui lòng đợi ${remaining}s...`;

            const interval = setInterval(() => {
                remaining--;
                resendButton.textContent = `Vui lòng đợi ${remaining}s...`;
                if (remaining <= 0) {
                    clearInterval(interval);
                    resendButton.disabled = false;
                    resendButton.classList.remove('opacity-50', 'cursor-not-allowed');
                    resendButton.textContent = originalText;
                }
            }, 1000);
        });
    </script>
    <script>
    window.addEventListener('storage', function(event) {
        if (event.key === 'email_verified' && event.newValue === '1') {
            window.location.href = "{{ route('homepage') }}?verified=1";
        }
    });
</script>

</x-guest-layout>
