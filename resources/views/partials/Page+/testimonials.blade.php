@extends('layouts.app')

@section('content')
    <!-- Phần Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-3">Đánh giá từ Bệnh nhân</h1>
            <nav class="text-sm opacity-80">
                <a href="{{ route('homepage') }}" class="hover:underline">Trang chủ</a> / Đánh giá
            </nav>
        </div>
    </section>

    <!-- Phần Testimonials -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                @foreach($testimonials as $testimonial)
                    <div class="bg-white p-10 rounded-3xl shadow-2xl border border-gray-100 relative flex flex-col justify-between min-h-[370px]">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-extrabold text-gray-900 leading-snug">"{{ $testimonial['quote'] }}"</h3>
                                <div class="flex items-center space-x-1">
                                    @for($i=0;$i<5;$i++)
                                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/></svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="text-gray-600 mb-8 text-base">{{ $testimonial['text'] }}</p>
                        </div>
                        <div class="flex items-center mt-auto">
                            <img src="{{ $testimonial['img'] ?? 'https://randomuser.me/api/portraits/men/1.jpg' }}" alt="{{ $testimonial['name'] }}" class="w-16 h-16 rounded-full border-4 border-blue-200 mr-4 object-cover">
                            <div>
                                <p class="font-extrabold text-lg text-gray-900">{{ $testimonial['name'] }}</p>
                                <p class="text-base text-gray-500">{{ $testimonial['role'] }}</p>
                            </div>
                        </div>
                        <svg class="absolute bottom-6 right-6 w-14 h-14 text-gray-200 opacity-80" fill="currentColor" viewBox="0 0 48 48"><path d="M17.5 24c0-6.075 4.925-11 11-11s11 4.925 11 11-4.925 11-11 11-11-4.925-11-11zm2 0a9 9 0 1018 0 9 9 0 00-18 0zm7-2h2v6h-2v-6zm0 8h2v2h-2v-2z"/></svg>
                    </div>
                @endforeach
            </div>
            <!-- Phân trang -->
            <div class="mt-8 flex justify-center space-x-2">
                @foreach([1, 2, 3] as $page)
                    <a href="#" class="px-3 py-1 rounded-md {{ $page == 1 ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} hover:bg-blue-500 hover:text-white transition">{{ $page }}</a>
                @endforeach
            </div>
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
