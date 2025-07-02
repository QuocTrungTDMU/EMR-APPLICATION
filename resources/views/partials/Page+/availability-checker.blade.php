@extends('layouts.app')

@section('title', 'Lịch làm việc bác sĩ - Medik')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-cyan-400 text-white py-16 mb-8">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 drop-shadow-lg">Lịch Làm Việc Bác Sĩ</h1>
            <p class="text-lg md:text-xl opacity-90 mb-4">Xem và đặt lịch khám với bác sĩ theo chuyên khoa, thời gian linh hoạt, cập nhật mới nhất.</p>
            <nav class="text-sm opacity-90">
                <a href="{{ route('homepage') }}" class="hover:underline font-semibold">Trang chủ</a> / Lịch làm việc bác sĩ
            </nav>
        </div>
    </section>

    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">Timetable Information</h1>
        <div class="mb-6 flex justify-center items-center">
            <div class="relative w-full max-w-xs md:max-w-md">
                <select id="departmentFilter" class="w-full appearance-none border-2 border-gray-300 rounded-lg p-2 pr-10 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    @foreach ($departments as $department)
                        <option value="{{ $department }}">{{ $department }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="grid grid-cols-8 gap-0.5 bg-gray-200 rounded-lg overflow-hidden shadow-xl min-w-[900px]">
                <!-- Headers -->
                <div class="bg-blue-700 text-white p-4 font-semibold text-center flex items-center justify-center min-h-[60px]">Time</div>
                <div class="bg-blue-700 text-white p-4 font-semibold text-center">Sunday</div>
                <div class="bg-blue-700 text-white p-4 font-semibold text-center">Monday</div>
                <div class="bg-blue-700 text-white p-4 font-semibold text-center">Tuesday</div>
                <div class="bg-blue-700 text-white p-4 font-semibold text-center">Wednesday</div>
                <div class="bg-blue-700 text-white p-4 font-semibold text-center">Thursday</div>
                <div class="bg-blue-700 text-white p-4 font-semibold text-center">Friday</div>
                <div class="bg-blue-700 text-white p-4 font-semibold text-center">Saturday</div>

                <!-- Time slots -->
                @foreach ($timetable as $time => $days)
                    <div class="bg-gray-100 p-4 font-medium text-gray-700 flex items-center justify-center min-h-[120px] text-center">{{ $time }}</div>
                    @foreach ($days as $day => $data)
                        <div class="bg-white p-4 min-h-[120px] relative group hover:scale-[1.02] hover:shadow-lg hover:z-10 transition-all duration-300 time-row-{{ Str::slug($time) }} {{ empty($data['name']) ? 'bg-gray-50' : '' }} {{ (!empty($data['name']) && $data['name'] !== 'Book Appointment') ? 'doctor-cell' : '' }}"
                             data-day="{{ $day }}" data-time="{{ $time }}" @if(!empty($data['name']) && $data['name'] !== 'Book Appointment') data-specialty="{{ $data['specialty'] }}" @endif>
                            @if (!empty($data['name']) && $data['name'] !== 'Book Appointment')
                                <div class="doctor-content h-full flex flex-col justify-center items-center text-center">
                                    <span class="font-semibold text-gray-800">{{ $data['name'] }}</span>
                                    <span class="text-sm text-gray-600 mt-1">{{ $data['specialty'] }}</span>
                                    <a href="{{ route('book.doctor-detail', ['doctorId' => str_replace(' ', '-', $day . '-' . $time)]) }}"
                                       class="opacity-0 group-hover:opacity-100 absolute bottom-2 left-2 right-2 bg-green-500 hover:bg-green-600 text-white py-8 px-4 rounded-lg text-sm font-medium transition-all duration-300 transform translate-y-1 group-hover:translate-y-0">
                                        Book Appointment
                                    </a>
                                </div>
                            @elseif ($data['name'] === 'Book Appointment')
                                <div class="available-content h-full flex items-center justify-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        Available for Booking
                                    </span>
                                </div>
                            @else
                                <div class="not-available-content h-full flex items-center justify-center">
                                    <span class="text-gray-400">Not Available</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const filter = document.getElementById('departmentFilter');
        filter.addEventListener('change', function() {
            const specialty = this.value;
            const allTimes = Array.from(new Set(Array.from(document.querySelectorAll('[data-time]')).map(cell => cell.getAttribute('data-time'))));
            allTimes.forEach(time => {
                const rowCells = document.querySelectorAll('.time-row-' + slugify(time));
                const doctorCells = Array.from(rowCells).filter(cell => cell.classList.contains('doctor-cell'));
                if (specialty === 'All Department') {
                    // Hiện lại tất cả nội dung gốc
                    rowCells.forEach(cell => {
                        showOriginalContent(cell);
                    });
                } else {
                    const hasDoctor = doctorCells.some(cell => cell.getAttribute('data-specialty') === specialty);
                    if (hasDoctor) {
                        rowCells.forEach(cell => {
                            if (cell.classList.contains('doctor-cell')) {
                                if (cell.getAttribute('data-specialty') === specialty) {
                                    showOriginalContent(cell);
                                } else {
                                    showNotAvailable(cell);
                                }
                            } else {
                                showNotAvailable(cell);
                            }
                        });
                    } else {
                        rowCells.forEach(cell => {
                            showNotAvailable(cell);
                        });
                    }
                }
            });
        });

        function slugify(text) {
            return text.toString().toLowerCase().replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }
        function showOriginalContent(cell) {
            // Hiện lại nội dung gốc
            const doctorContent = cell.querySelector('.doctor-content');
            const availableContent = cell.querySelector('.available-content');
            const notAvailableContent = cell.querySelector('.not-available-content');
            if (doctorContent) doctorContent.style.display = '';
            if (availableContent) availableContent.style.display = '';
            if (notAvailableContent) notAvailableContent.style.display = '';
        }
        function showNotAvailable(cell) {
            // Ẩn các nội dung khác, chỉ hiện Not Available
            const doctorContent = cell.querySelector('.doctor-content');
            const availableContent = cell.querySelector('.available-content');
            let notAvailableContent = cell.querySelector('.not-available-content');
            if (doctorContent) doctorContent.style.display = 'none';
            if (availableContent) availableContent.style.display = 'none';
            if (!notAvailableContent) {
                notAvailableContent = document.createElement('div');
                notAvailableContent.className = 'not-available-content h-full flex items-center justify-center';
                notAvailableContent.innerHTML = '<span class="text-gray-400">Not Available</span>';
                cell.appendChild(notAvailableContent);
            }
            notAvailableContent.style.display = '';
        }
    });
    </script>
@endsection