<x-app-layout>
   <x-slot name="header">
    <div class="flex items-center space-x-4 py-6 px-4">
        <a href="{{ route('dashboard') }}" class="flex items-center text-blue-600 hover:text-blue-800 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 19l-7-7 7-7" />
            </svg>
            Quay lại
        </a>

        <div>
            <h2 class="text-2xl font-bold text-blue-600">Hồ sơ cá nhân</h2>
            <p class="text-sm text-gray-500">Cập nhật thông tin, mật khẩu và quản lý tài khoản</p>
        </div>
    </div>
</x-slot>


    <div class="bg-blue-50 min-h-screen py-12">
        <div class="max-w-3xl mx-auto px-4 space-y-8">
            <!-- Cập nhật thông tin người dùng -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-blue-600 mb-4">Cập nhật thông tin cá nhân</h3>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Cập nhật mật khẩu -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-blue-600 mb-4">Đổi mật khẩu</h3>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Xóa tài khoản -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-red-600 mb-4">Xóa tài khoản</h3>
                <p class="text-sm text-gray-600 mb-2">Hành động này không thể hoàn tác. Hãy chắc chắn trước khi tiếp tục.</p>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
