<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NKS Login</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Đăng nhập NKS
            </h2>
        </div>

        @if ($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <ul class="text-red-600 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- ✅ FORM ĐƠN GIẢN - KHÔNG DÙNG ALPINEJS -->
        <form method="POST" action="{{ route('nksLogin') }}" id="simpleLoginForm">
            @csrf

            <!-- Hidden fields -->
            <input type="hidden" name="system" value="Medik">
            <input type="hidden" name="device" value="Web">

            <!-- Email field -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                    placeholder="info@gmail.com">
                @error('email')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password field -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Mật khẩu <span class="text-red-500">*</span>
                </label>
                <input type="password"
                    name="password"
                    id="password"
                    required
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                    placeholder="Nhập mật khẩu của bạn">
                @error('password')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit"
                id="submitBtn"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50">
                <span id="submitText">Đăng nhập với NKS</span>
                <span id="loadingText" style="display: none;">
                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Đang xác thực...
                </span>
            </button>
        </form>
    </div>

    <!-- ✅ VANILLA JAVASCRIPT - KHÔNG CONFLICT VỚI USERSCRIPT -->
    <script>
        // Chặn tất cả userscript errors
        window.addEventListener('error', function(e) {
            if (e.filename && (e.filename.includes('userscript') || e.filename.includes('tampermonkey'))) {
                e.preventDefault();
                e.stopPropagation();
                console.warn('Userscript error blocked:', e.message);
                return false;
            }
        }, true);

        // Form submission handling
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('simpleLoginForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingText = document.getElementById('loadingText');

            if (form) {
                form.addEventListener('submit', function(e) {
                    // Get form data
                    const formData = new FormData(this);
                    const email = formData.get('email');
                    const password = formData.get('password');

                    // Debug logging
                    console.log('Form submitting with data:', {
                        email: email || 'null',
                        password: password ? '***filled***' : 'empty',
                        system: formData.get('system'),
                        device: formData.get('device')
                    });

                    // Validate before submit
                    if (!email || !password) {
                        e.preventDefault();
                        alert('Vui lòng nhập đầy đủ email và mật khẩu');
                        return false;
                    }

                    // Show loading state
                    submitBtn.disabled = true;
                    submitText.style.display = 'none';
                    loadingText.style.display = 'inline-flex';
                });
            }
        });

        // Additional protection against userscript interference
        if (typeof MutationObserver !== 'undefined') {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'childList') {
                        // Prevent userscript from modifying form
                        const form = document.getElementById('simpleLoginForm');
                        if (form && !form.querySelector('input[name="email"]')) {
                            location.reload(); // Reload if form is corrupted
                        }
                    }
                });
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        }
    </script>
</body>

</html>