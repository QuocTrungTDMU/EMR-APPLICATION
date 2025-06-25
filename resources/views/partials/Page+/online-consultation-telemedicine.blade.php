@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Chăm sóc chất lượng cao mọi lúc, mọi nơi</h1>
            <nav class="text-sm mb-6">
                <a href="{{ route('homepage') }}" class="hover:underline font-semibold">Trang chủ</a> / Tư vấn Trực tuyến & Telemedicine
            </nav>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
                <div class="bg-white text-blue-600 p-8 rounded-2xl shadow-xl flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-2.21 0-4 1.79-4 4v2h8v-2c0-2.21-1.79-4-4-4z" /></svg>
                    <h3 class="text-xl font-bold mb-2 text-gray-900">Nhận Chăm sóc Ngay Trên Điện thoại</h3>
                    <p class="text-gray-600">Kết nối với bác sĩ và nhận chăm sóc 24/7 trên toàn quốc qua Video Chat hoặc Điều trị Ngay không tốn thêm phí.</p>
                </div>
                <div class="bg-white text-blue-600 p-8 rounded-2xl shadow-xl flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2h2M12 15v2m0 0h-2m2 0h2" /></svg>
                    <h3 class="text-xl font-bold mb-2 text-gray-900">Liên hệ Không Tốn Phí</h3>
                    <p class="text-gray-600">Nếu bạn có thắc mắc về sức khỏe hoặc cảm thấy không khỏe, bạn có thể nhắn tin với bác sĩ cho các nhu cầu không khẩn cấp ngay trên ứng dụng.</p>
                </div>
                <div class="bg-white text-blue-600 p-8 rounded-2xl shadow-xl flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2m-4-6a4 4 0 100-8 4 4 0 000 8zm6 2v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2a6 6 0 0112 0z" /></svg>
                    <h3 class="text-xl font-bold mb-2 text-gray-900">Nhận Thuốc Giao Tận Nhà</h3>
                    <p class="text-gray-600">Sau khi tư vấn qua video call, thuốc sẽ được giao đến nhà bạn, bạn chỉ cần ở nhà.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Virtual Care Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2 flex justify-center mb-8 md:mb-0">
                    <div class="w-full max-w-3xl aspect-video rounded-2xl shadow-2xl overflow-hidden">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/njX2bu-_Vw4" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="w-full h-full"></iframe>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <span class="text-green-500 font-semibold uppercase tracking-wider text-xs mb-2 block">Virtual Care</span>
                    <h2 class="text-3xl font-extrabold mb-4 text-gray-900">Một số Bệnh Có thể Điều trị Qua Chăm sóc Trực tuyến</h2>
                    <p class="text-gray-600 mb-6">Chúng tôi hỗ trợ điều trị hầu hết các bệnh phổ biến qua Chăm sóc Trực tuyến, bạn sẽ nhận được tư vấn và điều trị ngay tại nhà mà không cần đến cơ sở y tế.</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach(['Cảm lạnh và Cúm', 'Dị ứng', 'Vấn đề Dạ dày', 'Đau đầu', 'Nôn mửa', 'Chấn thương', 'Nhiễm trùng Đường tiết niệu', 'Vấn đề Da', 'Vết cắt Nhỏ'] as $condition)
                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium shadow">{{ $condition }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Patient Reviews Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <span class="text-green-500 font-semibold uppercase tracking-wider text-xs mb-2 block text-center">Patient's Reviews</span>
            <h2 class="text-3xl font-extrabold text-center mb-12 text-gray-900">Tại sao Nên Thăm khám Trực tuyến</h2>
            <div class="flex flex-col md:flex-row gap-8 justify-center">
                <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md mx-auto flex-1">
                    <p class="text-gray-600 italic mb-4">“Curabitur non nulla sit amet nisl tempus convallis quis ac lectus curabitur arcu erat accumsan id imperdiet porttitor at sem donec rutrum congue leo eget malesuada vivamus suscipit tortor eget felis porttitor volutpat donec sollicitudin molestie malesuada vivamus magna justo lacinia eget consectetur.”</p>
                    <div class="flex items-center mt-6">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Steven Borders" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Steven Borders</h4>
                            <p class="text-gray-500 text-sm">CEO & Nhà sáng lập</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md mx-auto flex-1">
                    <p class="text-gray-600 italic mb-4">“Volutpat donec sollicitudin molestie malesuada vivamus magna justo lacinia curabitur non nulla sit amet nisl tempus convallis quis ac lectus curabitur arcu erat accumsan id imperdiet porttitor at sem donec rutrum congue leo eget malesuada vivamus suscipit tortor eget felis porttitor.”</p>
                    <div class="flex items-center mt-6">
                        <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="Mark Henry" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Mark Henry</h4>
                            <p class="text-gray-500 text-sm">Doanh nhân</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How To Consult Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <span class="text-green-500 font-semibold uppercase tracking-wider text-xs mb-2 block text-center">Online Consultation</span>
            <h2 class="text-3xl font-extrabold text-center mb-12 text-gray-900">Cách Tư vấn Bác sĩ</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-8 rounded-2xl shadow flex flex-col items-center">
                    <img src="https://img.freepik.com/free-photo/doctor-patient-consultation_23-2148823261.jpg?w=200" alt="Search Best Online Professional" class="w-20 h-20 rounded-full mb-4 shadow">
                    <h3 class="text-xl font-bold mb-2 text-gray-900 text-center">Tìm Chuyên gia Trực tuyến Tốt nhất</h3>
                    <p class="text-gray-600 text-center">Mỗi thành viên trong đội ngũ của chúng tôi tập trung hỗ trợ bệnh nhân với điều trị cá nhân hóa, mục tiêu là tạo ra môi trường thân thiện.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-2xl shadow flex flex-col items-center">
                    <img src="https://img.freepik.com/free-photo/doctor-profile_23-2148823263.jpg?w=200" alt="View Professional Doctor Profile" class="w-20 h-20 rounded-full mb-4 shadow">
                    <h3 class="text-xl font-bold mb-2 text-gray-900 text-center">Xem Hồ sơ Bác sĩ Chuyên nghiệp</h3>
                    <p class="text-gray-600 text-center">Chúng tôi cam kết cung cấp dịch vụ chăm sóc sức khỏe xuất sắc, được thiết kế để đáp ứng nhu cầu của mọi bệnh nhân.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-2xl shadow flex flex-col items-center">
                    <img src="https://img.freepik.com/free-photo/doctor-appointment_23-2148823264.jpg?w=200" alt="Get Your Schedule Appointment" class="w-20 h-20 rounded-full mb-4 shadow">
                    <h3 class="text-xl font-bold mb-2 text-gray-900 text-center">Lên lịch Hẹn của Bạn</h3>
                    <p class="text-gray-600 text-center">Trung tâm y tế của chúng tôi chuyên cung cấp từ chăm sóc phòng ngừa, kiểm tra định kỳ đến các điều trị chuyên biệt.</p>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="bg-green-500 text-white px-8 py-4 rounded-full text-lg font-bold shadow-lg hover:bg-green-600 transition">Đăng ký Chăm sóc Trực tuyến</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">Thông tin Liên hệ</h3>
                    <p class="mb-2"><strong>Đường dây Khẩn cấp:</strong> +1 (234) 567 890 43</p>
                    <p class="mb-2"><strong>Email Hỗ trợ:</strong> <a href="mailto:support@hinton.com" class="hover:underline">support@hinton.com</a></p>
                    <p><strong>Địa chỉ:</strong> 245 14h Street, Toronto, Canada</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Liên kết Nhanh</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Danh bạ Y tế</a></li>
                        <li><a href="#" class="hover:underline">Bác sĩ Hàng đầu</a></li>
                        <li><a href="#" class="hover:underline">Tin tức Mới nhất</a></li>
                        <li><a href="#" class="hover:underline">Tại sao Chọn Chúng tôi</a></li>
                        <li><a href="#" class="hover:underline">Liên hệ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Liên kết Hữu ích</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline">Bệnh viện Nổi bật</a></li>
                        <li><a href="#" class="hover:underline">Cách Hoạt động</a></li>
                        <li><a href="#" class="hover:underline">Tìm Địa điểm</a></li>
                        <li><a href="#" class="hover:underline">Tìm kiếm Bác sĩ</a></li>
                        <li><a href="#" class="hover:underline">Dịch vụ Telemedicine</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Đăng ký Bản tin</h3>
                    <p class="mb-4">Đăng ký để nhận cập nhật và tin tức hàng tuần</p>
                    <form action="#" class="flex">
                        <input type="email" placeholder="Nhập email của bạn" class="p-2 rounded-l-md text-gray-800 w-full">
                        <button type="submit" class="bg-blue-600 p-2 rounded-r-md hover:bg-blue-700"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="mt-12 text-center border-t border-gray-700 pt-8">
                <p>Hinton Được Sở hữu Bởi EnvyTheme</p>
                <p class="mt-2">
                    <a href="#" class="hover:underline">Chính sách Bảo mật</a> |
                    <a href="#" class="hover:underline">Điều khoản & Điều kiện</a>
                </p>
            </div>
        </div>
    </footer>
@endsection
