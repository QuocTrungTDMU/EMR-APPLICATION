@extends('layouts.app')

@section('content')
<!-- Meta tag để truyền access_token từ server -->
<meta name="nks-access-token" content="{{ $accessToken ?? '' }}">

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

        <!-- Form cập nhật thông tin -->
        <form id="profile-form" method="POST" action="{{ route('profile.update') }}" class="space-y-8">
            @csrf
            @method('patch')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Họ - Sửa tên trường thành firstname -->
                <div>
                    <label for="firstname" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        Họ <span class="text-red-500 ml-1">*</span>
                        <span class="ml-2 text-gray-400 cursor-help" title="Nhập họ của bạn (ví dụ: Nguyễn, Trần)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </label>
                    <div class="relative">
                        <input id="firstname" name="firstname" type="text" placeholder="Nhập họ"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('firstname', $user->firstname ?? (isset($user->name) ? explode(' ', $user->name)[0] : '') ) }}" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('firstname')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Tên - Sửa tên trường thành lastname -->
                <div>
                    <label for="lastname" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        Tên <span class="text-red-500 ml-1">*</span>
                        <span class="ml-2 text-gray-400 cursor-help" title="Nhập tên của bạn (ví dụ: Văn Anh, Minh Tuấn)">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                    </label>
                    <div class="relative">
                        <input id="lastname" name="lastname" type="text" placeholder="Nhập tên"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('lastname', $user->lastname ?? (isset($user->name) ? implode(' ', array_slice(explode(' ', $user->name), 1)) : '') ) }}" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    @error('lastname')
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
                            value="{{ old('email', $user->email ?? '') }}" required>
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

                <!-- Số điện thoại -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại</label>
                    <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('phone', $user->phone ?? '') }}">
                </div>

                <!-- Giới thiệu -->
                <div class="md:col-span-2">
                    <label for="intro" class="block text-sm font-medium text-gray-700 mb-2">Giới thiệu</label>
                    <textarea id="intro" name="intro" rows="2" placeholder="Giới thiệu bản thân"
                        class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">{{ old('intro', $user->intro ?? '') }}</textarea>
                </div>

                <!-- Giới tính -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Giới tính</label>
                    <select id="gender" name="gender" class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                        <option value="">Chọn giới tính</option>
                        <option value="male" {{ old('gender', $user->gender ?? '') == 'male' ? 'selected' : '' }}>Nam</option>
                        <option value="female" {{ old('gender', $user->gender ?? '') == 'female' ? 'selected' : '' }}>Nữ</option>
                        <option value="other" {{ old('gender', $user->gender ?? '') == 'other' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>

                <!-- Website -->
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                    <input id="website" name="website" type="text" placeholder="Nhập website cá nhân"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('website', $user->website ?? '') }}">
                </div>

                <!-- Ngày sinh -->
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700 mb-2">Ngày sinh</label>
                    <input id="dob" name="dob" type="date"
                        class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('dob', $user->dob ?? '') }}">
                </div>

                <!-- Nơi sinh -->
                <div>
                    <label for="pob" class="block text-sm font-medium text-gray-700 mb-2">Nơi sinh</label>
                    <input id="pob" name="pob" type="text" placeholder="Nhập nơi sinh"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('pob', $user->pob ?? '') }}">
                </div>

                <!-- Số CMND/CCCD
                <div>
                    <label for="id_number" class="block text-sm font-medium text-gray-700 mb-2">Số CMND/CCCD</label>
                    <input id="id_number" name="id_number" type="text" placeholder="Nhập số CMND/CCCD"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('id_number', $user->id_number ?? '') }}">
                </div>

                
                <div>
                    <label for="id_date" class="block text-sm font-medium text-gray-700 mb-2">Ngày cấp</label>
                    <input id="id_date" name="id_date" type="date"
                        class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('id_date', $user->id_date ?? '') }}">
                </div>

                
                <div>
                    <label for="id_place" class="block text-sm font-medium text-gray-700 mb-2">Nơi cấp</label>
                    <input id="id_place" name="id_place" type="text" placeholder="Nhập nơi cấp"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('id_place', $user->id_place ?? '') }}">
                </div> -->

                <!-- Địa chỉ chi tiết -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Thông tin địa chỉ
                    </h3>
                </div>

                <!-- Đường/Phố -->
                <div>
                    <label for="add_street" class="block text-sm font-medium text-gray-700 mb-2">Đường/Phố</label>
                    <input id="add_street" name="add_street" type="text" placeholder="Nhập tên đường/phố"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('add_street', $user->add_street ?? '') }}">
                </div>

                <!-- Phường/Xã -->
                <div>
                    <label for="add_ward" class="block text-sm font-medium text-gray-700 mb-2">Phường/Xã</label>
                    <input id="add_ward" name="add_ward" type="text" placeholder="Nhập phường/xã"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('add_ward', $user->add_ward ?? '') }}">
                </div>

                <!-- Quận/Huyện -->
                <div>
                    <label for="add_district" class="block text-sm font-medium text-gray-700 mb-2">Quận/Huyện</label>
                    <input id="add_district" name="add_district" type="text" placeholder="Nhập quận/huyện"
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                        value="{{ old('add_district', $user->add_district ?? '') }}">
                </div>

                <!-- Tỉnh/Thành phố (add_province) -->
                <div>
                    <label for="add_province" class="block text-sm font-medium text-gray-700 mb-2">Tỉnh/Thành phố</label>
                    <div class="relative">
                        <input id="add_province" name="add_province" type="text" placeholder="Nhập hoặc chọn tỉnh/thành phố"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            value="{{ old('add_province', $user->add_province ?? '') }}" autocomplete="off">
                        <ul id="province-suggestions" class="absolute z-50 left-0 right-0 bg-white border border-gray-200 rounded-xl shadow-lg mt-1 max-h-60 overflow-y-auto hidden"></ul>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1-.9-2-2-2s-2 .9-2 2 2 4 2 4m2-4c0-1.1.9-2 2-2s2 .9 2 2-2 4-2 4m-6 5a2 2 0 01-2-2 2 2 0 012-2h4a2 2 0 012 2 2 2 0 01-2 2h-4z"></path>
                    </svg>
                    Thông tin được mã hóa và bảo mật tuyệt đối
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Cập nhật thông tin
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('profile-form').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Danh sách trường đúng với API NKS
    const validFields = [
        'firstname', 'lastname', 'intro', 'phone', 'gender', 'website', 'dob', 'pob',
        'id_number', 'id_date', 'id_place', 'province'
    ];
    const data = {};

    // Lấy access_token từ server (meta tag)
    const accessTokenMeta = document.querySelector('meta[name="nks-access-token"]');
    const accessToken = accessTokenMeta ? accessTokenMeta.getAttribute('content') : '';
    if (!accessToken) {
        alert('Không tìm thấy access token. Vui lòng đăng nhập lại!');
        return;
    }
    data['access_token'] = accessToken;

    // Chỉ lấy các trường hợp lệ và chuyển gender về số
    for (let [key, value] of formData.entries()) {
        if (validFields.includes(key)) {
            if (key === 'gender') {
                if (value === 'male') value = 0;
                else if (value === 'female') value = 1;
                else value = '';
            }
            data[key] = value;
        }
    }

    // Đảm bảo ngày đúng định dạng yyyy-mm-dd
    if (data['dob']) {
        data['dob'] = new Date(data['dob']).toISOString().slice(0, 10);
    }
    if (data['id_date']) {
        data['id_date'] = new Date(data['id_date']).toISOString().slice(0, 10);
    }

    console.log('Dữ liệu gửi lên API NKS:', data);

    try {
        const loadingDiv = document.createElement('div');
        loadingDiv.className = 'mb-6 p-4 bg-blue-50 text-blue-800 rounded-lg flex items-center shadow-sm';
        loadingDiv.innerHTML = `
            <svg class="animate-spin w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            Đang cập nhật thông tin...
        `;
        form.insertBefore(loadingDiv, form.firstChild);

        // Gửi request lên API NKS (dùng URL encoded)
        const response = await fetch('https://account.nks.vn/api/nks/user/updateInfo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Accept': 'application/json',
                'Authorization': `Bearer ${accessToken}`
            },
            body: new URLSearchParams(data)
        });

        loadingDiv.remove();

        const contentType = response.headers.get('content-type');
        let responseData;
        if (contentType && contentType.includes('application/json')) {
            responseData = await response.json();
        } else {
            responseData = await response.text();
        }

        if (response.ok && responseData.success) {
            const successDiv = document.createElement('div');
            successDiv.className = 'mb-6 p-4 bg-green-50 text-green-800 rounded-lg flex items-center shadow-sm';
            successDiv.innerHTML = `
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                ${responseData.message || 'Thông tin đã được cập nhật thành công'}
            `;
            form.insertBefore(successDiv, form.firstChild);
            setTimeout(() => { successDiv.remove(); }, 3000);
        } else {
            throw new Error(responseData.message || responseData.error || 'Lỗi khi gửi yêu cầu');
        }
    } catch (error) {
        console.error('Lỗi:', error);
        const errorDiv = document.createElement('div');
        errorDiv.className = 'mb-6 p-4 bg-red-50 text-red-800 rounded-lg flex items-center shadow-sm';
        errorDiv.innerHTML = `
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            ${error.message || 'Có lỗi xảy ra khi cập nhật thông tin. Vui lòng thử lại sau.'}
        `;
        form.insertBefore(errorDiv, form.firstChild);
        setTimeout(() => { errorDiv.remove(); }, 3000);
    }
});
</script>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinceInput = document.getElementById('add_province');
        const suggestionBox = document.getElementById('province-suggestions');
        
        // Kiểm tra xem các phần tử có tồn tại không
        if (!provinceInput || !suggestionBox) {
            console.warn('Province input hoặc suggestion box không tồn tại');
            return;
        }
        
        let provinces = [];
        let lastQuery = '';
        let debounceTimeout = null;

        provinceInput.addEventListener('focus', fetchProvinces);
        provinceInput.addEventListener('input', onInput);
        document.addEventListener('click', function(e) {
            if (!provinceInput.contains(e.target) && !suggestionBox.contains(e.target)) {
                suggestionBox.classList.add('hidden');
            }
        });

        function fetchProvinces() {
            if (provinces.length > 0) {
                showSuggestions(provinceInput.value);
                return;
            }

            // Thêm loading state
            provinceInput.classList.add('opacity-50');
            provinceInput.disabled = true;

            fetch('/api/provinces-proxy', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(res => {
                if (!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                // Lấy mảng provinces từ response
                if (data.success && Array.isArray(data.data)) {
                    provinces = data.data;
                    showSuggestions(provinceInput.value);
                } else {
                    throw new Error('Invalid data format from API');
                }
            })
            .catch(error => {
                console.error('Error fetching provinces:', error);
                provinces = []; // Reset nếu có lỗi
            })
            .finally(() => {
                // Remove loading state
                provinceInput.classList.remove('opacity-50');
                provinceInput.disabled = false;
            });
        }

        function onInput(e) {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                showSuggestions(e.target.value);
            }, 150);
        }

        function showSuggestions(query) {
            if (!Array.isArray(provinces)) {
                console.error('Provinces is not an array:', provinces);
                return;
            }

            const val = query.trim().toLowerCase();
            // Lọc theo title thay vì name
            const filtered = provinces.filter(p => {
                if (!p || typeof p.title !== 'string') {
                    console.log('Invalid province item:', p);
                    return false;
                }
                return p.title.toLowerCase().includes(val);
            });

            if (filtered.length === 0 || !val) {
                suggestionBox.classList.add('hidden');
                suggestionBox.innerHTML = '';
                return;
            }

            // Dùng title thay vì name
            suggestionBox.innerHTML = filtered.map(p => 
                `<li class='px-4 py-2 hover:bg-blue-100 cursor-pointer' data-id='${p.id}' data-value='${p.title.replace(/'/g, "&#39;")}'>
                    ${p.title}
                </li>`
            ).join('');
            
            suggestionBox.classList.remove('hidden');
            
            Array.from(suggestionBox.children).forEach(li => {
                li.addEventListener('mousedown', function(e) {
                    provinceInput.value = this.getAttribute('data-value');
                    // Thêm hidden input để lưu id nếu cần
                    const hiddenInput = document.getElementById('province_id');
                    if (hiddenInput) {
                        hiddenInput.value = this.getAttribute('data-id');
                    }
                    suggestionBox.classList.add('hidden');
                });
            });
        }
    });
</script>
@endpush