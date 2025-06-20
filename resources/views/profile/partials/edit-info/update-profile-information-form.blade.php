@extends('layouts.app')

@section('content')
<div id="profile-info" class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl mx-auto my-8">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-5">
        <h2 class="text-2xl font-bold text-white flex items-center">
            <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Chỉnh sửa thông tin cá nhân
        </h2>
        <p class="text-cyan-100 text-sm mt-1">Cập nhật thông tin cá nhân và căn cước công dân của bạn</p>
    </div>

    <!-- Body -->
    <div class="p-6 sm:p-8">
        <!-- Thông báo trạng thái -->
        @if (session('status'))
            <div class="mb-6 p-4 bg-green-50 text-green-800 rounded-lg flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-50 text-red-800 rounded-lg flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <!-- Form upload CCCD -->
        <form id="cccd-upload-form" enctype="multipart/form-data" class="mb-8 max-w-md">
            @csrf
            <label for="cccd_image" class="block text-sm font-medium text-gray-700 mb-2">Tải lên căn cước công dân</label>
            <div class="flex items-center gap-4">
                <input type="file" id="cccd_image" name="cccd_image" accept="image/*" 
                    class="flex-1 border border-gray-300 rounded-lg p-2 text-sm text-gray-600 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <button type="submit" class="bg-blue-600 text-white font-medium py-2 px-5 rounded-lg hover:bg-blue-700 transition-all flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    Tải lên
                </button>
            </div>
            @error('cccd_image')
                <p class="mt-2 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </form>

        <!-- Hiển thị hình CCCD -->
        @if($user->cccd_image)
            <div class="mb-8 max-w-sm">
                <p class="text-sm font-medium text-gray-700 mb-3">Hình căn cước công dân:</p>
                <img src="{{ Storage::url($user->cccd_image) }}" alt="CCCD Image" class="w-full rounded-lg shadow-md">
            </div>
        @endif

        <!-- Form cập nhật thông tin -->
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-8">
            @csrf
            @method('patch')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Họ -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        Họ <span class="text-red-500 ml-1">*</span>
                        <span class="ml-2 text-gray-400 cursor-help" title="Nhập họ của bạn (ví dụ: Nguyễn, Trần)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </label>
                    <div class="relative">
                        <input id="first_name" name="first_name" type="text" placeholder="Nhập họ"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('first_name', $user->first_name ?? explode(' ', $user->name)[0] ?? '') }}" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('first_name')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Tên -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        Tên <span class="text-red-500 ml-1">*</span>
                        <span class="ml-2 text-gray-400 cursor-help" title="Nhập tên của bạn (ví dụ: Văn Anh, Minh Tuấn)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </label>
                    <div class="relative">
                        <input id="last_name" name="last_name" type="text" placeholder="Nhập tên"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('last_name', $user->last_name ?? implode(' ', array_slice(explode(' ', $user->name), 1)) ?? '') }}" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('last_name')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="email" name="email" type="email" placeholder="Nhập email"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('email', $user->email) }}" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Số CCCD -->
                {{-- <div>
                    <label for="cccd_number" class="block text-sm font-medium text-gray-700 mb-2">
                        Số căn cước công dân
                    </label>
                    <div class="relative">
                        <input id="cccd_number" name="cccd_number" type="text" placeholder="Nhập số CCCD"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('cccd_number', $user->cccd_number) }}">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('cccd_number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ngày cấp -->
                <div>
                    <label for="cccd_issue_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Ngày cấp
                    </label>
                    <div class="relative">
                        <input id="cccd_issue_date" name="cccd_issue_date" type="date"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('cccd_issue_date', $user->cccd_issue_date) }}">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('cccd_issue_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nơi cấp -->
                <div>
                    <label for="cccd_issue_place" class="block text-sm font-medium text-gray-700 mb-2">
                        Nơi cấp
                    </label>
                    <div class="relative">
                        <input id="cccd_issue_place" name="cccd_issue_place" type="text" placeholder="Nhập nơi cấp"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('cccd_issue_place', $user->cccd_issue_place) }}">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('cccd_issue_place')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div> --}}

            <!-- Footer -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1-.9-2-2-2s-2 .9-2 2 2 4 2 4m2-4c0-1.1.9-2 2-2s2 .9 2 2-2 4-2 4m-6 5a2 2 0 01-2-2 2 2 0 012-2h4a2 2 0 012 2 2 2 0 01-2 2h-4z"></path>
                    </svg>
                    Thông tin được mã hóa và bảo mật tuyệt đối
                </div>
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('cccd-upload-form').addEventListener('submit', async function (e) {
    e.preventDefault();
    console.log('Submitting form to {{ route('profile.uploadCccd') }} with POST');
    const fileInput = document.getElementById('cccd_image');
    if (!fileInput.files.length) {
        alert('Vui lòng chọn một hình ảnh căn cước công dân.');
        return;
    }
    const formData = new FormData(this);
    try {
        const response = await fetch('{{ route('profile.uploadCccd') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });
        console.log('Response received:', response.status, response.statusText);
        const data = await response.json();
        console.log('Response data:', data);
        if (response.ok) {
            alert('Tải lên căn cước công dân thành công!');
            window.location.reload();
        } else {
            alert(data.message || 'Có lỗi xảy ra khi tải lên.');
        }
    } catch (error) {
        console.error('Lỗi AJAX:', error);
        alert('Đã có lỗi xảy ra: ' + error.message);
    }
});
</script>
@endsection