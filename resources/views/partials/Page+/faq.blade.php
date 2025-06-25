@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Câu hỏi Thường gặp</h1>
            <nav class="text-sm mb-2">
                <a href="{{ route('homepage') }}" class="hover:underline font-semibold">Trang chủ</a> / Câu hỏi Thường gặp
            </nav>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <span class="text-green-500 font-semibold uppercase tracking-wider text-xs mb-2 block text-center">FAQ</span>
            <h2 class="text-3xl font-extrabold text-center mb-12 text-gray-900">Tìm Câu Trả Lời Cho Mọi Thắc Mắc</h2>
            <div class="max-w-3xl mx-auto">
                <div id="faq-accordion" class="space-y-4">
                    @foreach([
                        ['question' => 'Phòng khám cung cấp những dịch vụ gì?', 'answer' => 'Đây là một thực tế lâu đời rằng người đọc sẽ bị phân tâm bởi nội dung dễ đọc của một trang khi nhìn vào bố cục của nó. Điểm của việc sử dụng Lorem Ipsum là nó có phân phối chữ cái gần như bình thường, trái ngược với việc sử dụng nội dung ở đây, nội dung ở đây, làm cho nó trông giống như tiếng Anh có thể đọc được. Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện nay sử dụng.'],
                        ['question' => 'Thời gian chờ trung bình cho các cuộc hẹn là bao lâu?', 'answer' => 'Đây là một thực tế lâu đời rằng người đọc sẽ bị phân tâm bởi nội dung dễ đọc của một trang khi nhìn vào bố cục của nó. Điểm của việc sử dụng Lorem Ipsum là nó có phân phối chữ cái gần như bình thường, trái ngược với việc sử dụng nội dung ở đây, nội dung ở đây, làm cho nó trông giống như tiếng Anh có thể đọc được. Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện nay sử dụng.'],
                        ['question' => 'Giờ hoạt động của phòng khám là khi nào?', 'answer' => 'Đây là một thực tế lâu đời rằng người đọc sẽ bị phân tâm bởi nội dung dễ đọc của một trang khi nhìn vào bố cục của nó. Điểm của việc sử dụng Lorem Ipsum là nó có phân phối chữ cái gần như bình thường, trái ngược với việc sử dụng nội dung ở đây, nội dung ở đây, làm cho nó trông giống như tiếng Anh có thể đọc được. Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện nay sử dụng.'],
                        ['question' => 'Tôi có thể yêu cầu gia hạn đơn thuốc hoặc kết quả xét nghiệm trực tuyến không?', 'answer' => 'Đây là một thực tế lâu đời rằng người đọc sẽ bị phân tâm bởi nội dung dễ đọc của một trang khi nhìn vào bố cục của nó. Điểm của việc sử dụng Lorem Ipsum là nó có phân phối chữ cái gần như bình thường, trái ngược với việc sử dụng nội dung ở đây, nội dung ở đây, làm cho nó trông giống như tiếng Anh có thể đọc được. Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện nay sử dụng.'],
                        ['question' => 'Tôi nên mang gì đến cuộc hẹn?', 'answer' => 'Đây là một thực tế lâu đời rằng người đọc sẽ bị phân tâm bởi nội dung dễ đọc của một trang khi nhìn vào bố cục của nó. Điểm của việc sử dụng Lorem Ipsum là nó có phân phối chữ cái gần như bình thường, trái ngược với việc sử dụng nội dung ở đây, nội dung ở đây, làm cho nó trông giống như tiếng Anh có thể đọc được. Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện nay sử dụng.'],
                        ['question' => 'Có những biện pháp an toàn nào cho COVID-19?', 'answer' => 'Đây là một thực tế lâu đời rằng người đọc sẽ bị phân tâm bởi nội dung dễ đọc của một trang khi nhìn vào bố cục của nó. Điểm của việc sử dụng Lorem Ipsum là nó có phân phối chữ cái gần như bình thường, trái ngược với việc sử dụng nội dung ở đây, nội dung ở đây, làm cho nó trông giống như tiếng Anh có thể đọc được. Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện nay sử dụng.']
                    ] as $i => $faq)
                        <div class="bg-gray-50 rounded-xl shadow flex flex-col">
                            <button type="button" class="flex items-center justify-between w-full px-6 py-4 text-left focus:outline-none faq-toggle" data-index="{{ $i }}">
                                <div class="flex items-center gap-3">
                                    <span class="bg-green-100 text-green-600 font-bold rounded-full w-8 h-8 flex items-center justify-center">{{ sprintf('%02d', $i+1) }}</span>
                                    <span class="font-semibold text-lg text-gray-900">{{ $faq['question'] }}</span>
                                </div>
                                <svg class="w-6 h-6 text-green-500 transition-transform duration-200 faq-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                            <div class="faq-answer px-6 pb-4 text-gray-700 text-base hidden">{{ $faq['answer'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Ask Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="flex justify-center">
                    <div class="relative w-full max-w-3xl aspect-video rounded-2xl shadow-2xl overflow-hidden">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/njX2bu-_Vw4" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="w-full h-full"></iframe>
                    </div>
                </div>
                <div>
                    <span class="text-green-500 font-semibold uppercase tracking-wider text-xs mb-2 block">FAQ</span>
                    <h2 class="text-2xl md:text-3xl font-extrabold mb-6 text-gray-900">Chưa Tìm Thấy Câu Trả Lời? Hỏi Ngay Tại Đây</h2>
                    <form action="{{ route('faq.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="text" name="name" placeholder="Họ và Tên" class="w-full p-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        <input type="email" name="email" placeholder="Email" class="w-full p-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        <input type="text" name="subject" placeholder="Chủ đề" class="w-full p-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        @error('subject')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        <textarea name="message" placeholder="Tin nhắn" class="w-full p-4 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" rows="4" required></textarea>
                        @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        <label class="flex items-center">
                            <input type="checkbox" name="agree" class="mr-2 rounded focus:ring-green-400" required>
                            <span class="text-gray-600">Tôi đồng ý với <a href="#" class="text-green-600 hover:underline">Chính sách Bảo mật</a> và <a href="#" class="text-green-600 hover:underline">Điều khoản & Điều kiện</a></span>
                        </label>
                        @error('agree')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        <button type="submit" class="bg-green-500 text-white px-3 py-3 rounded-full text-lg font-bold shadow-lg hover:bg-green-600 transition w-xs">Gửi Tin nhắn</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Accordion FAQ toggle
        document.addEventListener('DOMContentLoaded', function () {
            const toggles = document.querySelectorAll('.faq-toggle');
            toggles.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const idx = btn.getAttribute('data-index');
                    const answer = btn.parentElement.querySelector('.faq-answer');
                    const arrow = btn.querySelector('.faq-arrow');
                    if (answer.classList.contains('hidden')) {
                        document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
                        document.querySelectorAll('.faq-arrow').forEach(a => a.classList.remove('rotate-180'));
                        answer.classList.remove('hidden');
                        arrow.classList.add('rotate-180');
                    } else {
                        answer.classList.add('hidden');
                        arrow.classList.remove('rotate-180');
                    }
                });
            });
        });
    </script>
@endsection
