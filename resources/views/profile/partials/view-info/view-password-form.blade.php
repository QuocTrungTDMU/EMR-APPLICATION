<div id="password" class="bg-white rounded-2xl shadow-lg overflow-hidden max-w-full mx-auto">
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
        <h2 class="text-xl font-semibold text-white flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            Bảo mật tài khoản
        </h2>
        <p class="text-purple-100 text-sm mt-1">Xem và quản lý thông tin bảo mật tài khoản</p>
    </div>

    <div class="p-6">
        <div class="space-y-6">
            <div class="bg-gray-50 p-4 rounded-xl">
                <label class="block text-sm font-medium text-gray-700 mb-2">Mật khẩu hiện tại</label>
                <div class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-700">
                    ******* (Ẩn)
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200 bg-gray-50 p-4 rounded-xl">
                <div class="text-sm text-gray-500">Mật khẩu được mã hóa an toàn</div>
                <a href="{{ route('profile.edit-password') }}" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Đổi mật khẩu
                </a>
            </div>
        </div>
    </div>
</div>