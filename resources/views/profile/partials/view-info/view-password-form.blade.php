<div id="password" x-data="passwordConfirmation()" class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-purple-500 via-pink-400 to-pink-500 px-6 py-4 rounded-t-2xl shadow-md">
        <h2 class="text-xl font-semibold text-white flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            Đổi mật khẩu
        </h2>
        <p class="text-pink-100 text-sm mt-1">Vui lòng xác nhận lại mật khẩu mới của bạn để hoàn tất quá trình đổi mật khẩu.</p>
    </div>

   

    <div class="px-4 py-5 sm:p-6">
        @if(session('new_password'))
            <div class="mb-6">
                <div class="bg-white border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center mb-3">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h4 class="text-base font-medium text-gray-900">Mật khẩu mới của bạn</h4>
                    </div>
                    <div class="relative flex items-center">
                        <input :type="showPassword ? 'text' : 'password'" readonly x-model="newPassword"
                            class="w-full font-mono text-sm px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 select-all cursor-pointer" />
                        <button type="button" @click="showPassword = !showPassword" class="absolute right-10 text-blue-600 hover:text-blue-800 focus:outline-none">
                            <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 013.523-4.775M9.88 9.88a3 3 0 104.24 4.24" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                        <button type="button" @click="copyToClipboard()" 
                            class="absolute right-2 text-blue-600 hover:text-blue-800 focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h8a2 2 0 002-2M8 5a2 2 0 012-2h8a2 2 0 012 2m-6 9h4"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Nhấn vào mật khẩu để chọn, nhấn nút để sao chép hoặc ẩn/hiện mật khẩu.</p>
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mt-4 rounded-lg">
                    <div class="flex items-center mb-1">
                        <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span class="font-medium text-yellow-800">Lưu ý quan trọng</span>
                    </div>
                    <ul class="ml-6 mt-2 text-sm text-yellow-700 list-disc">
                        <li>Kiểm tra kỹ mật khẩu mới của bạn</li>
                        <li>Sau khi xác nhận, mật khẩu sẽ được cập nhật ngay</li>
                        <li>Bạn sẽ cần đăng nhập lại bằng mật khẩu mới</li>
                    </ul>
                </div>

                <div class="flex items-center justify-end space-x-3 mt-6">
                    <a href="{{ route('profile.edit-password') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path>
                        </svg>
                        Quay lại
                    </a>
                    <button type="button" @click="confirmPassword()"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Xác nhận & Cập nhật
                    </button>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <a href="{{ route('profile.edit-password') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg shadow-sm transition-all border border-gray-300">
                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Quay lại đổi mật khẩu
                </a>
            </div>
        @else
            <div class="text-center py-4">
                Không có thay đổi mật khẩu nào đang chờ xác nhận.
                <div class="mt-4 flex justify-center">
                    <a href="{{ route('profile.edit-password') }}"
                       class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg shadow-sm transition-all border border-gray-300">
                        Đổi mật khẩu
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function passwordConfirmation() {
    return {
        newPassword: @json(session('new_password', '')),
        showPassword: true,
        
        async copyToClipboard() {
            try {
                await navigator.clipboard.writeText(this.newPassword);
                Swal.fire({
                    icon: 'success',
                    title: 'Đã sao chép!',
                    text: 'Mật khẩu đã được sao chép vào clipboard',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            } catch (err) {
                console.error('Failed to copy: ', err);
            }
        },

        async confirmPassword() {
            try {
                const response = await fetch('{{ route("password.update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: data.message || 'Mật khẩu đã được cập nhật thành công.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#2563eb'
                    }).then(() => {
                        window.location.href = '{{ route("profile.view") }}';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: data.message || 'Có lỗi xảy ra khi cập nhật mật khẩu.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#2563eb'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Có lỗi xảy ra khi cập nhật mật khẩu.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#2563eb'
                });
            }
        }
    }
}
</script>
@endpush