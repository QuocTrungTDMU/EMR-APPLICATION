<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = [
            [
                'quote' => 'Caring For You Every Step Of The Way',
                'text' => 'Beautifully captures our commitment to compassionate patient centered healthcare every interaction from your first appointment to follow up care is designed with and dedication ensuring you feel supported and informed throughout your journey to wellness at our center we believe in not only treating.',
                'name' => 'Steven Borders',
                'role' => 'Patient',
                'img' => 'https://randomuser.me/api/portraits/men/32.jpg'
            ],
            [
                'quote' => 'Healing With Heart And Expertise',
                'text' => 'Beautifully captures our commitment to compassionate patient centered healthcare every interaction from your first appointment to follow up care is designed with and dedication ensuring you feel supported and informed throughout your journey to wellness at our center we believe in not only treating.',
                'name' => 'Richard Greene',
                'role' => 'Patient',
                'img' => 'https://randomuser.me/api/portraits/men/44.jpg'
            ],
            [
                'quote' => 'Xuất sắc trong mọi chẩn đoán',
                'text' => 'Nhấn mạnh cam kết của chúng tôi về sự chính xác và chất lượng trong chăm sóc bệnh nhân. Chúng tôi tiếp cận mỗi chẩn đoán với sự chú ý tỉ mỉ đến từng chi tiết, sử dụng công nghệ tiên tiến và chuyên môn toàn diện để đảm bảo kết quả chính xác và đáng tin cậy. Mục tiêu của chúng tôi là mang lại sự rõ ràng và tự tin trong mỗi bước của hành trình chăm sóc sức khỏe của bạn.',
                'name' => 'Pat Hathaway',
                'role' => 'Bệnh nhân',
                'img' => 'https://randomuser.me/api/portraits/men/45.jpg'
            ],
            [
                'quote' => 'Cam kết chăm sóc tận tâm',
                'text' => 'Chúng tôi tin rằng chữa lành thực sự vượt ra ngoài điều trị y tế, đòi hỏi sự tôn trọng và thấu hiểu. Đội ngũ của chúng tôi cam kết cung cấp dịch vụ chăm sóc không chỉ đáp ứng tiêu chuẩn lâm sàng mà còn ưu tiên sự thoải mái, phẩm giá và sự an tâm của bạn từ khoảnh khắc bạn bước vào.',
                'name' => 'Karolyn Bassett',
                'role' => 'Bệnh nhân',
                'img' => 'https://randomuser.me/api/portraits/women/65.jpg'
            ],
            [
                'quote' => 'Nơi chữa lành và hy vọng gặp nhau',
                'text' => 'Nói lên sứ mệnh của chúng tôi trong việc cung cấp sự xuất sắc về y tế và hỗ trợ tinh thần. Chúng tôi hiểu rằng sự phục hồi thực sự không chỉ là điều trị thể chất mà còn cần một cảm giác hy vọng và niềm tin vào hành trình phía trước. Trung tâm của chúng tôi kết hợp chăm sóc y tế tiên tiến với đội ngũ tận tâm.',
                'name' => 'Harold Thomas',
                'role' => 'Bệnh nhân',
                'img' => 'https://randomuser.me/api/portraits/men/46.jpg'
            ],
            [
                'quote' => 'Chăm sóc chất lượng cho một bạn khỏe mạnh hơn',
                'text' => 'Thể hiện sự tận tụy của chúng tôi trong việc cung cấp dịch vụ chăm sóc sức khỏe đặc biệt, được tùy chỉnh theo nhu cầu riêng của bạn. Chúng tôi tin rằng chăm sóc chất lượng là nền tảng của sức khỏe lâu dài, và đội ngũ của chúng tôi cam kết cung cấp các tiêu chuẩn cao nhất trong điều trị y tế, chăm sóc phòng ngừa và hỗ trợ bệnh nhân ở mọi bước đi.',
                'name' => 'Susannah Brooks',
                'role' => 'Bệnh nhân',
                'img' => 'https://randomuser.me/api/portraits/women/66.jpg'
            ]
        ];
        return view('partials.Page+.testimonials', compact('testimonials'));
    }
}
