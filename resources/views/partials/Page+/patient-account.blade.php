@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Tài khoản Bệnh nhân</h1>
            <nav class="text-sm mb-2 opacity-90">
                <a href="{{ route('homepage') }}" class="hover:underline font-semibold">Trang chủ</a> / Tài khoản Bệnh nhân
            </nav>
        </div>
    </section>

    @if(session('success'))
        <div class="max-w-2xl mx-auto mt-8">
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-xl text-center text-lg font-semibold shadow">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Patient Account Form -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-extrabold text-center mb-10 text-gray-800">Đăng ký Tài khoản Bệnh nhân</h2>
            <form action="{{ route('patient-account.submit') }}" method="POST" class="mx-auto space-y-8 max-w-5xl w-full">
                @csrf
                <!-- Thông tin Cá nhân -->
                <div class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        <h3 class="text-xl font-bold text-blue-600">Thông tin Cá nhân</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Họ</label>
                            <input type="text" name="first_name" placeholder="Họ" class="w-full p-4 border border-gray-200 rounded-2xl text-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
                            @error('first_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Tên</label>
                            <input type="text" name="last_name" placeholder="Tên" class="w-full p-4 border border-gray-200 rounded-2xl text-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
                            @error('last_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" placeholder="Email" class="w-full p-4 border border-gray-200 rounded-2xl text-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Số điện thoại</label>
                            <input type="text" name="phone_number" placeholder="Số điện thoại" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('phone_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Ngày sinh</label>
                            <input type="date" name="date_of_birth" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('date_of_birth') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Địa chỉ</label>
                            <input type="text" name="address" placeholder="Địa chỉ" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Tình trạng hôn nhân</label>
                            <select name="marital_status" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                                <option value="">Chọn</option>
                                <option value="Married">Đã kết hôn</option>
                                <option value="Unmarried">Chưa kết hôn</option>
                            </select>
                            @error('marital_status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Mã số y tế</label>
                            <input type="text" name="health_care_number" placeholder="Mã số y tế" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('health_care_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Giới tính</label>
                            <select name="sex" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                                <option value="">Chọn</option>
                                <option value="Male">Nam</option>
                                <option value="Female">Nữ</option>
                            </select>
                            @error('sex') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Ngày đăng ký</label>
                            <input type="date" name="registration_date" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('registration_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <label class="block text-base font-semibold text-gray-700 mb-2">Bệnh nhân dưới 18 tuổi?</label>
                        <div class="flex items-center space-x-8 mt-1">
                            <label class="inline-flex items-center text-lg"><input type="radio" name="under_18" value="Yes" class="mr-2 accent-blue-500" required> Có</label>
                            <label class="inline-flex items-center text-lg"><input type="radio" name="under_18" value="No" class="mr-2 accent-blue-500"> Không</label>
                        </div>
                        @error('under_18') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Liên hệ Khẩn cấp -->
                <div class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-1.414 1.414A9 9 0 105.636 18.364l1.414-1.414" /></svg>
                        <h3 class="text-xl font-bold text-red-500">Liên hệ Khẩn cấp</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Họ</label>
                            <input type="text" name="emergency_first_name" placeholder="Họ" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('emergency_first_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Tên</label>
                            <input type="text" name="emergency_last_name" placeholder="Tên" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('emergency_last_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Mối quan hệ</label>
                            <select name="emergency_relationship" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                                <option value="">Chọn</option>
                                <option value="Parent">Phụ huynh</option>
                                <option value="Brother">Anh trai</option>
                                <option value="Sister">Chị/em gái</option>
                                <option value="Uncle">Chú/bác</option>
                            </select>
                            @error('emergency_relationship') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Số liên lạc</label>
                            <input type="text" name="emergency_contact_number" placeholder="Số liên lạc" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('emergency_contact_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Lịch sử Sức khỏe -->
                <div class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2m-4-6a4 4 0 100-8 4 4 0 000 8zm6 2v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2a6 6 0 0112 0z" /></svg>
                        <h3 class="text-xl font-bold text-green-500">Lịch sử Sức khỏe</h3>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Lý do đăng ký</label>
                            <textarea name="reason_for_registration" placeholder="Lý do đăng ký" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" rows="4" required></textarea>
                            @error('reason_for_registration') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Ghi chú bổ sung</label>
                            <textarea name="additional_notes" placeholder="Ghi chú bổ sung" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" rows="4"></textarea>
                            @error('additional_notes') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Hiện đang dùng thuốc?</label>
                            <div class="flex items-center space-x-8 mt-1">
                                <label class="inline-flex items-center text-lg"><input type="radio" name="taking_medications" value="Yes" class="mr-2 accent-green-500" required> Có</label>
                                <label class="inline-flex items-center text-lg"><input type="radio" name="taking_medications" value="No" class="mr-2 accent-green-500"> Không</label>
                            </div>
                            @error('taking_medications') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Thông tin Bảo hiểm -->
                <div class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100">
                    <div class="flex items-center gap-2 mb-6">
                        <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-2.21 0-4 1.79-4 4v2h8v-2c0-2.21-1.79-4-4-4z" /></svg>
                        <h3 class="text-xl font-bold text-yellow-500">Thông tin Bảo hiểm</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Công ty bảo hiểm</label>
                            <input type="text" name="insurance_company" placeholder="Công ty bảo hiểm" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('insurance_company') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Mã bảo hiểm</label>
                            <input type="text" name="insurance_id" placeholder="Mã bảo hiểm" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('insurance_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Tên chủ hợp đồng</label>
                            <input type="text" name="policy_holder_name" placeholder="Tên chủ hợp đồng" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('policy_holder_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-base font-semibold text-gray-700 mb-2">Ngày sinh chủ hợp đồng</label>
                            <input type="date" name="policy_holder_dob" class="w-full p-4 border border-gray-200 rounded-2xl text-lg" required>
                            @error('policy_holder_dob') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Điều khoản -->
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="agree" class="mr-2 accent-blue-500 rounded" required>
                    <span class="text-gray-600 text-sm">Tôi đồng ý với <a href="#" class="text-blue-600 hover:underline">Chính sách Bảo mật</a> và <a href="#" class="text-blue-600 hover:underline">Điều khoản & Điều kiện</a></span>
                    @error('agree') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Nút Gửi -->
                <div class="text-center">
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-full text-lg font-bold shadow-lg hover:bg-blue-700 transition">Đăng ký</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Phần Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Thông tin Liên hệ</h3>
                    <p class="mb-2 text-gray-300"><strong>Đường dây Khẩn cấp:</strong> +1 (234) 567 890 43</p>
                    <p class="mb-2 text-gray-300"><strong>Email Hỗ trợ:</strong> <a href="mailto:support@hinton.com" class="hover:underline">support@hinton.com</a></p>
                    <p class="text-gray-300"><strong>Địa chỉ:</strong> 245 14h Street, Toronto, Canada</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liên kết Nhanh</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:underline">Danh bạ Y tế</a></li>
                        <li><a href="#" class="hover:underline">Bác sĩ Hàng đầu</a></li>
                        <li><a href="#" class="hover:underline">Tin tức Mới nhất</a></li>
                        <li><a href="#" class="hover:underline">Tại sao Chọn Chúng tôi</a></li>
                        <li><a href="#" class="hover:underline">Liên hệ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Liên kết Hữu ích</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:underline">Bệnh viện Nổi bật</a></li>
                        <li><a href="#" class="hover:underline">Cách Hoạt động</a></li>
                        <li><a href="#" class="hover:underline">Tìm Địa điểm</a></li>
                        <li><a href="#" class="hover:underline">Tìm kiếm Bác sĩ</a></li>
                        <li><a href="#" class="hover:underline">Dịch vụ Telemedicine</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Đăng ký Bản tin</h3>
                    <p class="mb-4 text-gray-300">Đăng ký để nhận cập nhật và tin tức hàng tuần</p>
                    <form action="#" class="flex">
                        <input type="email" placeholder="Nhập email của bạn" class="p-2 rounded-l-md text-gray-800 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit" class="bg-blue-600 p-2 rounded-r-md hover:bg-blue-700"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="mt-8 text-center border-t border-gray-700 pt-6 text-gray-300">
                <p>Hinton Được Sở hữu Bởi EnvyTheme</p>
                <p class="mt-2">
                    <a href="#" class="hover:underline">Chính sách Bảo mật</a> |
                    <a href="#" class="hover:underline">Điều khoản & Điều kiện</a>
                </p>
            </div>
        </div>
    </footer>
@endsection
