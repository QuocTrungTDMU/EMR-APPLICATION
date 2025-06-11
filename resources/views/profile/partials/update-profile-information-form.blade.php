<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="space-y-5">
    @csrf
    @method('patch')

    <!-- Họ tên -->
    <div>
        <x-input-label for="name" :value="__('Họ và tên')" />
        <x-text-input id="name" name="name" type="text"
            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
            :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <!-- Email -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email"
            pattern="^[a-zA-Z0-9](\.?[a-zA-Z0-9_\-])*@gmail\.com$"
            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
            :value="old('email', $user->email)" required autocomplete="username" />
        <small class="text-gray-500">Email phải thuộc domain <strong>gmail.com</strong>, không khoảng trắng hoặc ký tự không hợp lệ.</small>

        <small class="text-gray-500">Email phải hợp lệ: không khoảng trắng, không dấu chấm liên tiếp, đúng cấu trúc domain.</small>


        <x-input-error class="mt-2" :messages="$errors->get('email')" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="text-sm mt-2 text-gray-700">
            <p>
                {{ __('Email của bạn chưa được xác minh.') }}
                <button form="send-verification" class="underline text-blue-600 hover:text-blue-800">
                    {{ __('Gửi lại email xác minh') }}
                </button>
            </p>

            @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-600">
                {{ __('Email xác minh mới đã được gửi.') }}
            </p>
            @endif
        </div>
        @endif
    </div>

    <!-- Nút lưu -->
    <div class="flex items-center justify-between">
        <x-primary-button class="bg-blue-600 hover:bg-blue-700">
            {{ __('Lưu thay đổi') }}
        </x-primary-button>

        @if (session('status') === 'profile-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-green-600">
            {{ __('Đã lưu.') }}
        </p>
        @endif
    </div>
</form>

<script>
    document.getElementById('profile-form').addEventListener('submit', function(e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            alert('Email không hợp lệ, vui lòng kiểm tra lại!');
        }
    });
</script>