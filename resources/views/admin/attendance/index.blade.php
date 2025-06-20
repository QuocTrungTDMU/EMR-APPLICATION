@extends('admin.layouts.app')

@section('title', 'Hệ thống điểm danh')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- ===== HEADER SECTION ===== -->
        <header class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 animate-fade-in">
            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">
                <!-- Title Area - Kích thước đã giảm -->
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl xl:text-3xl font-bold">
                                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                                    Hệ thống điểm danh
                                </span>
                            </h1>
                            <p class="text-sm text-gray-600 mt-1">Công nghệ nhận diện thông minh & xác thực vị trí</p>
                        </div>
                    </div>
                </div>

                <!-- Time & Schedule Info -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Current Time -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 min-w-[240px]">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full animate-ping"></div>
                            </div>
                            <div>
                                <div class="text-xs font-semibold text-green-700 uppercase tracking-wide">Thời gian hiện tại</div>
                                <div id="current-time" class="text-lg font-bold text-gray-900"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4">
                        <h3 class="text-xs font-bold text-blue-700 mb-2 uppercase tracking-wide">Giờ làm việc hôm nay</h3>
                        <div class="space-y-1">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                                    <span class="text-xs font-medium text-emerald-700">Check-in</span>
                                </div>
                                <span class="text-xs font-bold text-gray-900">8:30 - 9:00</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                    <span class="text-xs font-medium text-red-700">Check-out</span>
                                </div>
                                <span class="text-xs font-bold text-gray-900">16:00 - 16:30</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ===== STATUS CARDS SECTION ===== -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-4 animate-slide-up">
            <!-- Check In Status Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 {{ $attendanceStatus['has_checkin'] ? 'ring-2 ring-emerald-200' : '' }}">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 {{ $attendanceStatus['has_checkin'] ? 'bg-emerald-500' : 'bg-gray-400' }} rounded-xl flex items-center justify-center transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Check In</h3>
                            <p class="text-sm text-gray-500">Điểm danh vào làm</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $attendanceStatus['has_checkin'] ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $attendanceStatus['has_checkin'] ? '✓ Đã thực hiện' : 'Chưa thực hiện' }}
                        </div>
                    </div>
                </div>
                <div class="text-center py-4">
                    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $attendanceStatus['checkin_time'] ?? '--:--' }}</div>
                    <div class="text-sm text-gray-500">{{ $attendanceStatus['checkin_time'] ? 'Thời gian vào làm' : 'Chưa điểm danh' }}</div>
                </div>
            </div>

            <!-- Check Out Status Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 {{ $attendanceStatus['has_checkout'] ? 'ring-2 ring-red-200' : '' }}">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 {{ $attendanceStatus['has_checkout'] ? 'bg-red-500' : 'bg-gray-400' }} rounded-xl flex items-center justify-center transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Check Out</h3>
                            <p class="text-sm text-gray-500">Điểm danh tan ca</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $attendanceStatus['has_checkout'] ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $attendanceStatus['has_checkout'] ? '✓ Đã thực hiện' : 'Chưa thực hiện' }}
                        </div>
                    </div>
                </div>
                <div class="text-center py-4">
                    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $attendanceStatus['checkout_time'] ?? '--:--' }}</div>
                    <div class="text-sm text-gray-500">{{ $attendanceStatus['checkout_time'] ? 'Thời gian tan ca' : 'Chưa điểm danh' }}</div>
                </div>
            </div>
        </section>

        <!-- ===== COUNTDOWN TIMER SECTION ===== -->
        <section class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 animate-bounce-in">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-900">Bộ đếm thời gian điểm danh</h2>
                </div>

                <!-- Countdown Display -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 max-w-xl mx-auto">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200">
                        <div id="hours" class="text-2xl font-bold text-blue-600">00</div>
                        <div class="text-xs font-medium text-blue-700 uppercase tracking-wide">Giờ</div>
                    </div>
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200">
                        <div id="minutes" class="text-2xl font-bold text-green-600">00</div>
                        <div class="text-xs font-medium text-green-700 uppercase tracking-wide">Phút</div>
                    </div>
                    <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl p-4 border border-orange-200">
                        <div id="seconds" class="text-2xl font-bold text-orange-600">00</div>
                        <div class="text-xs font-medium text-orange-700 uppercase tracking-wide">Giây</div>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-xl p-4 border border-purple-200">
                        <div id="timer-status" class="text-base font-bold text-purple-600">Chờ</div>
                        <div class="text-xs font-medium text-purple-700 uppercase tracking-wide">Trạng thái</div>
                    </div>
                </div>

                <!-- Timer Message -->
                <div class="mt-4 p-3 bg-gradient-to-r from-gray-50 to-slate-50 rounded-lg border border-gray-200">
                    <p id="timer-message" class="text-base font-semibold text-gray-700">Đang chờ thời gian điểm danh...</p>
                </div>
            </div>
        </section>

        <!-- ===== MAIN INTERFACE SECTION ===== -->
        <section class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- ===== CAMERA SECTION ===== -->
            <div class="xl:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="p-6">
                        <!-- Camera Header -->
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                </svg>
                                Camera nhận diện khuôn mặt
                            </h2>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-xs font-semibold text-gray-600 uppercase tracking-wide">Camera sẵn sàng</span>
                            </div>
                        </div>

                        <!-- Camera Preview -->
                        <div class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black rounded-2xl overflow-hidden shadow-xl mb-6">
                            <video
                                id="camera-preview"
                                class="w-full aspect-video object-cover"
                                autoplay
                                muted
                                playsinline
                                style="transform: scaleX(-1);">
                            </video>
                            <canvas id="camera-canvas" class="hidden"></canvas>

                            <!-- Camera Overlay -->
                            <div class="absolute inset-0 pointer-events-none">
                                <!-- Face Detection Frame -->
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <div class="w-60 h-80 border-4 border-blue-400/60 rounded-2xl relative">
                                        <!-- Corner Indicators -->
                                        <div class="absolute -top-1 -left-1 w-6 h-6 border-t-4 border-l-4 border-blue-400 rounded-tl-2xl"></div>
                                        <div class="absolute -top-1 -right-1 w-6 h-6 border-t-4 border-r-4 border-blue-400 rounded-tr-2xl"></div>
                                        <div class="absolute -bottom-1 -left-1 w-6 h-6 border-b-4 border-l-4 border-blue-400 rounded-bl-2xl"></div>
                                        <div class="absolute -bottom-1 -right-1 w-6 h-6 border-b-4 border-r-4 border-blue-400 rounded-br-2xl"></div>
                                    </div>
                                </div>

                                <!-- Instructions -->
                                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-black/80 backdrop-blur-md text-white px-6 py-3 rounded-xl">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-blue-400 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-sm">Đặt khuôn mặt vào khung hình để nhận diện</span>
                                    </div>
                                </div>

                                <!-- Status Indicator -->
                                <div class="absolute top-3 right-3 bg-emerald-500/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    <div class="flex items-center space-x-1">
                                        <div class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                                        <span>LIVE</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Camera Controls -->
                        <div class="flex flex-wrap justify-center gap-3">
                            <button id="start-camera" class="btn btn-primary btn-lg">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Bật Camera
                            </button>
                            <button id="stop-camera" class="btn btn-secondary btn-lg" disabled>
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tắt Camera
                            </button>
                            <button id="capture-photo" class="btn btn-success btn-lg" disabled>
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                </svg>
                                Chụp ảnh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Captured Image Preview -->
                <div id="captured-image-container" class="mt-4 bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hidden">
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Ảnh nhận diện thành công
                        </h3>
                        <div class="relative inline-block">
                            <img id="captured-image" class="rounded-2xl shadow-xl border-4 border-white max-w-sm w-full mx-auto">
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mt-3 text-sm">Khuôn mặt đã được xác thực thành công</p>
                    </div>
                </div>
            </div>

            <!-- ===== ACTIONS SIDEBAR ===== -->
            <div class="space-y-4">
                <!-- Attendance Actions -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Thực hiện điểm danh
                    </h2>

                    <div class="space-y-4">
                        <!-- Check In Button -->
                        <div class="relative">
                            <button id="checkin-btn"
                                class="w-full btn btn-xl relative overflow-hidden transition-all duration-300 {{ $attendanceStatus['has_checkin'] ? 'btn-disabled' : 'btn-success' }}"
                                {{ $attendanceStatus['has_checkin'] ? 'disabled' : '' }}>
                                <div class="flex items-center justify-center space-x-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span class="text-lg font-bold">
                                        {{ $attendanceStatus['has_checkin'] ? '✓ ĐÃ CHECK IN' : 'CHECK IN NGAY' }}
                                    </span>
                                </div>
                            </button>
                            <div class="mt-2 text-center">
                                <div class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Thời gian: 8:30 - 9:00
                                </div>
                            </div>
                        </div>

                        <!-- Check Out Button -->
                        <div class="relative">
                            <button id="checkout-btn"
                                class="w-full btn btn-xl relative overflow-hidden transition-all duration-300 {{ $attendanceStatus['has_checkout'] ? 'btn-disabled' : 'btn-danger' }}"
                                {{ $attendanceStatus['has_checkout'] ? 'disabled' : '' }}>
                                <div class="flex items-center justify-center space-x-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span class="text-lg font-bold">
                                        {{ $attendanceStatus['has_checkout'] ? '✓ ĐÃ CHECK OUT' : 'CHECK OUT' }}
                                    </span>
                                </div>
                            </button>
                            <div class="mt-2 text-center">
                                <div class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Thời gian: 16:00 - 16:30
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 via-indigo-50 to-purple-50 border border-blue-200/50 rounded-xl">
                        <h4 class="font-bold text-gray-900 mb-3 flex items-center text-base">
                            <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Hướng dẫn sử dụng
                        </h4>
                        <ul class="space-y-2 text-xs text-gray-700">
                            <li class="flex items-start space-x-2">
                                <div class="w-5 h-5 bg-emerald-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-white text-xs font-bold">1</span>
                                </div>
                                <span>Bật camera và đặt khuôn mặt vào khung hình</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <div class="w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-white text-xs font-bold">2</span>
                                </div>
                                <span>Chụp ảnh khi hệ thống nhận diện thành công</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <div class="w-5 h-5 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-white text-xs font-bold">3</span>
                                </div>
                                <span>Nhấn nút điểm danh để hoàn tất</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Recent History -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Lịch sử điểm danh
                    </h3>
                    <div id="recent-attendances" class="space-y-3 max-h-80 overflow-y-auto">
                        <!-- Loading State -->
                        <div class="animate-pulse space-y-3">
                            @for($i = 0; $i < 3; $i++)
                                <div class="bg-gray-200 rounded-xl h-16">
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>
</div>

<!-- Enhanced Loading Modal -->
<div id="loadingModal" class="fixed inset-0 bg-black/60 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 transform transition-all">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 mb-6 animate-pulse">
                <svg class="animate-spin h-8 w-8 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Đang xử lý điểm danh</h3>
            <p class="text-gray-600">Vui lòng đợi trong giây lát...</p>
        </div>
    </div>
</div>

<!-- Enhanced Time Warning Modal -->
<div id="timeWarningModal" class="fixed inset-0 bg-black/60 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4 transform transition-all">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-amber-500 to-orange-600 mb-6 animate-bounce">
                <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.872-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Ngoài thời gian điểm danh</h3>
            <p class="text-gray-600 mb-6" id="timeWarningMessage">Hiện tại không trong thời gian cho phép điểm danh</p>
            <button onclick="closeTimeWarning()" class="btn btn-primary btn-lg">
                Đã hiểu
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    class EnhancedAttendanceManager {
        constructor() {
            this.video = document.getElementById('camera-preview');
            this.canvas = document.getElementById('camera-canvas');
            this.capturedImage = document.getElementById('captured-image');
            this.stream = null;
            this.currentPosition = null;
            this.capturedImageData = null;

            // Debug logs
            console.log('Initializing attendance manager...');
            console.log('Video element:', this.video);
            console.log('Canvas element:', this.canvas);

            this.initializeEventListeners();
            this.updateCurrentTime();
            this.getCurrentLocation();
            this.loadRecentAttendances();
            this.checkTimeRestrictions();
            this.initializeCountdownTimer();
            this.checkCameraPermissions();

            // Update time every second
            setInterval(() => {
                this.updateCurrentTime();
                this.checkTimeRestrictions();
                this.updateCountdownTimer();
            }, 1000);
        }

        initializeEventListeners() {
            // Camera controls với debug
            document.getElementById('start-camera').addEventListener('click', () => {
                console.log('Start camera clicked');
                this.startCamera();
            });

            document.getElementById('stop-camera').addEventListener('click', () => {
                console.log('Stop camera clicked');
                this.stopCamera();
            });

            document.getElementById('capture-photo').addEventListener('click', () => {
                console.log('Capture photo clicked');
                this.capturePhoto();
            });

            // Attendance buttons
            document.getElementById('checkin-btn').addEventListener('click', () => this.performCheckin());
            document.getElementById('checkout-btn').addEventListener('click', () => this.performCheckout());
        }

        async checkCameraPermissions() {
            try {
                if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                    this.showNotification('error', '❌ Trình duyệt không hỗ trợ camera');
                    return;
                }

                const permissions = await navigator.permissions.query({
                    name: 'camera'
                });
                console.log('Camera permission status:', permissions.state);

                if (permissions.state === 'denied') {
                    this.showNotification('warning', '⚠️ Quyền truy cập camera bị từ chối. Vui lòng cho phép trong cài đặt trình duyệt.');
                }
            } catch (error) {
                console.log('Permission check not supported:', error);
            }
        }

        async startCamera() {
            console.log('Starting camera...');

            try {
                this.showNotification('info', '🔄 Đang khởi động camera...');

                const constraints = {
                    video: {
                        width: {
                            ideal: 1280,
                            min: 640
                        },
                        height: {
                            ideal: 720,
                            min: 480
                        },
                        facingMode: 'user',
                        frameRate: {
                            ideal: 30,
                            min: 15
                        }
                    },
                    audio: false
                };

                console.log('Requesting camera with constraints:', constraints);

                this.stream = await navigator.mediaDevices.getUserMedia(constraints);

                console.log('Camera stream obtained:', this.stream);
                console.log('Video tracks:', this.stream.getVideoTracks());

                this.video.srcObject = this.stream;

                this.video.play().then(() => {
                    console.log('Video started playing');
                    this.updateCameraButtons(true);
                    this.showNotification('success', '📹 Camera đã được bật thành công');
                }).catch(error => {
                    console.error('Error playing video:', error);
                    this.showNotification('error', '❌ Lỗi phát video: ' + error.message);
                });

                // Add video event listeners
                this.video.addEventListener('loadedmetadata', () => {
                    console.log('Video metadata loaded');
                    console.log('Video dimensions:', this.video.videoWidth, 'x', this.video.videoHeight);
                });

                this.video.addEventListener('canplay', () => {
                    console.log('Video can start playing');
                });

                this.video.addEventListener('error', (e) => {
                    console.error('Video error:', e);
                    this.showNotification('error', '❌ Lỗi video: ' + e.message);
                });

            } catch (error) {
                console.error('Error accessing camera:', error);
                this.handleCameraError(error);
            }
        }

        handleCameraError(error) {
            let message = 'Không thể truy cập camera: ';

            switch (error.name) {
                case 'NotAllowedError':
                    message += 'Quyền truy cập camera bị từ chối. Vui lòng cho phép truy cập camera trong trình duyệt.';
                    break;
                case 'NotFoundError':
                    message += 'Không tìm thấy camera trên thiết bị.';
                    break;
                case 'NotReadableError':
                    message += 'Camera đang được sử dụng bởi ứng dụng khác.';
                    break;
                case 'OverconstrainedError':
                    message += 'Cài đặt camera không được hỗ trợ.';
                    break;
                case 'SecurityError':
                    message += 'Lỗi bảo mật. Vui lòng sử dụng HTTPS.';
                    break;
                default:
                    message += error.message;
            }

            this.showNotification('error', '❌ ' + message);
            this.showCameraHelp();
        }

        showCameraHelp() {
            const helpModal = document.createElement('div');
            helpModal.className = 'fixed inset-0 bg-black/60 backdrop-blur-md z-50 flex items-center justify-center p-4';
            helpModal.innerHTML = `
            <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4">
                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-orange-100 mb-6">
                        <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Hướng dẫn khắc phục</h3>
                    <div class="text-left space-y-3 text-sm text-gray-600">
                        <div class="flex items-start space-x-3">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">1</span>
                            <span>Cho phép truy cập camera khi trình duyệt hỏi</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">2</span>
                            <span>Kiểm tra biểu tượng camera trên thanh địa chỉ và bấm "Allow"</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">3</span>
                            <span>Đóng các ứng dụng khác đang sử dụng camera</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">4</span>
                            <span>Tải lại trang và thử lại</span>
                        </div>
                    </div>
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" class="mt-6 btn btn-primary">
                        Đã hiểu
                    </button>
                </div>
            </div>
        `;
            document.body.appendChild(helpModal);
        }

        stopCamera() {
            console.log('Stopping camera...');

            if (this.stream) {
                this.stream.getTracks().forEach(track => {
                    console.log('Stopping track:', track);
                    track.stop();
                });
                this.video.srcObject = null;
                this.stream = null;
                this.updateCameraButtons(false);
                this.showNotification('info', '⏹️ Camera đã được tắt');
            }
        }

        updateCameraButtons(cameraActive) {
            const startBtn = document.getElementById('start-camera');
            const stopBtn = document.getElementById('stop-camera');
            const captureBtn = document.getElementById('capture-photo');

            console.log('Updating camera buttons, active:', cameraActive);

            if (cameraActive) {
                startBtn.disabled = true;
                startBtn.className = 'btn btn-secondary btn-lg opacity-50 cursor-not-allowed';
                startBtn.innerHTML = `
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Camera đang chạy
            `;

                stopBtn.disabled = false;
                stopBtn.className = 'btn btn-danger btn-lg';

                captureBtn.disabled = false;
                captureBtn.className = 'btn btn-success btn-lg';
            } else {
                startBtn.disabled = false;
                startBtn.className = 'btn btn-primary btn-lg';
                startBtn.innerHTML = `
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Bật Camera
            `;

                stopBtn.disabled = true;
                stopBtn.className = 'btn btn-secondary btn-lg opacity-50 cursor-not-allowed';

                captureBtn.disabled = true;
                captureBtn.className = 'btn btn-secondary btn-lg opacity-50 cursor-not-allowed';
            }
        }

        capturePhoto() {
            console.log('Capturing photo...');

            if (!this.stream) {
                this.showNotification('warning', '⚠️ Vui lòng bật camera trước khi chụp ảnh');
                return;
            }

            if (this.video.readyState !== 4) {
                this.showNotification('warning', '⚠️ Camera chưa sẵn sàng, vui lòng thử lại');
                return;
            }

            try {
                this.canvas.width = this.video.videoWidth;
                this.canvas.height = this.video.videoHeight;

                console.log('Canvas size set to:', this.canvas.width, 'x', this.canvas.height);

                const ctx = this.canvas.getContext('2d');
                ctx.drawImage(this.video, 0, 0);

                this.capturedImageData = this.canvas.toDataURL('image/jpeg', 0.95);

                console.log('Image captured, size:', this.capturedImageData.length);

                this.capturedImage.src = this.capturedImageData;
                const container = document.getElementById('captured-image-container');
                container.classList.remove('hidden');
                container.classList.add('animate-bounce-in');

                this.showNotification('success', '📸 Ảnh khuôn mặt đã được chụp thành công!');
            } catch (error) {
                console.error('Error capturing photo:', error);
                this.showNotification('error', '❌ Lỗi khi chụp ảnh: ' + error.message);
            }
        }

        initializeCountdownTimer() {
            document.getElementById('hours').textContent = '00';
            document.getElementById('minutes').textContent = '00';
            document.getElementById('seconds').textContent = '00';
            document.getElementById('timer-status').textContent = 'Chờ';
            document.getElementById('timer-message').textContent = 'Đang chờ thời gian điểm danh...';
        }

        updateCountdownTimer() {
            const now = new Date();
            const currentHour = now.getHours();
            const currentMinute = now.getMinutes();

            let targetTime = null;
            let message = '';
            let status = 'Chờ';

            if (currentHour < 8 || (currentHour === 8 && currentMinute < 30)) {
                targetTime = new Date();
                targetTime.setHours(8, 30, 0, 0);
                message = 'Thời gian còn lại đến giờ check-in';
                status = 'Check-in';
            } else if ((currentHour === 8 && currentMinute >= 30) || (currentHour === 9 && currentMinute === 0)) {
                targetTime = new Date();
                targetTime.setHours(9, 0, 0, 0);
                message = 'Đang trong thời gian check-in!';
                status = 'Hoạt động';
            } else if (currentHour >= 9 && currentHour < 16) {
                targetTime = new Date();
                targetTime.setHours(16, 0, 0, 0);
                message = 'Thời gian còn lại đến giờ check-out';
                status = 'Làm việc';
            } else if (currentHour === 16 && currentMinute <= 30) {
                targetTime = new Date();
                targetTime.setHours(16, 30, 0, 0);
                message = 'Đang trong thời gian check-out!';
                status = 'Hoạt động';
            } else {
                targetTime = new Date();
                targetTime.setDate(targetTime.getDate() + 1);
                targetTime.setHours(8, 30, 0, 0);
                message = 'Thời gian còn lại đến ngày làm việc tiếp theo';
                status = 'Nghỉ';
            }

            if (targetTime) {
                const timeDiff = targetTime.getTime() - now.getTime();

                if (timeDiff > 0) {
                    const hours = Math.floor(timeDiff / (1000 * 60 * 60));
                    const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

                    document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
                } else {
                    document.getElementById('hours').textContent = '00';
                    document.getElementById('minutes').textContent = '00';
                    document.getElementById('seconds').textContent = '00';
                }
            }

            document.getElementById('timer-status').textContent = status;
            document.getElementById('timer-message').textContent = message;
        }

        checkTimeRestrictions() {
            const now = new Date();
            const currentHour = now.getHours();
            const currentMinute = now.getMinutes();

            const checkinBtn = document.getElementById('checkin-btn');
            const checkoutBtn = document.getElementById('checkout-btn');

            const canCheckin = (currentHour === 8 && currentMinute >= 30) || (currentHour === 9 && currentMinute === 0);
            const canCheckout = (currentHour === 16 && currentMinute <= 30);

            this.updateButtonState(checkinBtn, canCheckin, {
                {
                    $attendanceStatus['has_checkin'] ? 'true' : 'false'
                }
            }, 'CHECK IN NGAY', 'NGOÀI GIỜ CHECK IN');
            this.updateButtonState(checkoutBtn, canCheckout, {
                {
                    $attendanceStatus['has_checkout'] ? 'true' : 'false'
                }
            }, 'CHECK OUT', 'NGOÀI GIỜ CHECK OUT');
        }

        updateButtonState(button, canPerform, hasCompleted, actionText, restrictedText) {
            if (hasCompleted) {
                button.disabled = true;
                button.className = 'w-full btn btn-xl btn-disabled relative overflow-hidden transition-all duration-300';
                button.innerHTML = this.createButtonContent('✓ ĐÃ ' + actionText, 'check');
            } else if (!canPerform) {
                button.disabled = true;
                button.className = 'w-full btn btn-xl btn-disabled relative overflow-hidden transition-all duration-300';
                button.innerHTML = this.createButtonContent(restrictedText, 'clock');
            } else {
                button.disabled = false;
                const btnClass = actionText.includes('CHECK IN') ? 'btn-success' : 'btn-danger';
                button.className = `w-full btn btn-xl ${btnClass} relative overflow-hidden transition-all duration-300`;
                const iconType = actionText.includes('CHECK IN') ? 'login' : 'logout';
                button.innerHTML = this.createButtonContent(actionText, iconType);
            }
        }

        createButtonContent(text, iconType) {
            const icons = {
                login: 'M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1',
                logout: 'M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1',
                check: 'M5 13l4 4L19 7',
                clock: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
            };

            return `
            <div class="flex items-center justify-center space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${icons[iconType]}"></path>
                </svg>
                <span class="text-lg font-bold">${text}</span>
            </div>
        `;
        }

        getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        this.currentPosition = {
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude
                        };
                        this.showNotification('info', '📍 Vị trí đã được xác định');
                    },
                    (error) => {
                        console.error('Error getting location:', error);
                        this.showNotification('warning', '📍 Không thể xác định vị trí chính xác');
                    }
                );
            }
        }

        async performCheckin() {
            if (!this.checkTimeAndValidation('checkin')) return;

            this.showLoading(true);

            try {
                const response = await fetch('{{ route("admin.attendance.checkin") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        checkin_img: this.capturedImageData.split(',')[1],
                        latitude: this.currentPosition.latitude,
                        longitude: this.currentPosition.longitude
                    })
                });

                const result = await response.json();
                this.handleAttendanceResponse(result);

            } catch (error) {
                console.error('Checkin error:', error);
                this.showNotification('error', '❌ Có lỗi xảy ra khi thực hiện check-in');
            } finally {
                this.showLoading(false);
            }
        }

        async performCheckout() {
            if (!this.checkTimeAndValidation('checkout')) return;

            this.showLoading(true);

            try {
                const response = await fetch('{{ route("admin.attendance.checkout") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        checkout_img: this.capturedImageData.split(',')[1],
                        latitude: this.currentPosition.latitude,
                        longitude: this.currentPosition.longitude
                    })
                });

                const result = await response.json();
                this.handleAttendanceResponse(result);

            } catch (error) {
                console.error('Checkout error:', error);
                this.showNotification('error', '❌ Có lỗi xảy ra khi thực hiện check-out');
            } finally {
                this.showLoading(false);
            }
        }

        checkTimeAndValidation(type) {
            const now = new Date();
            const currentHour = now.getHours();
            const currentMinute = now.getMinutes();

            if (type === 'checkin') {
                const canCheckin = (currentHour === 8 && currentMinute >= 30) || (currentHour === 9 && currentMinute === 0);
                if (!canCheckin) {
                    this.showTimeWarning('⏰ Check-in chỉ được phép từ 8:30 đến 9:00. Hiện tại là ' + now.toLocaleTimeString('vi-VN'));
                    return false;
                }
            } else {
                const canCheckout = (currentHour === 16 && currentMinute <= 30);
                if (!canCheckout) {
                    this.showTimeWarning('⏰ Check-out chỉ được phép từ 16:00 đến 16:30. Hiện tại là ' + now.toLocaleTimeString('vi-VN'));
                    return false;
                }
            }

            return this.validateAttendanceData();
        }

        validateAttendanceData() {
            if (!this.capturedImageData) {
                this.showNotification('warning', '📸 Vui lòng chụp ảnh khuôn mặt trước khi điểm danh');
                return false;
            }

            if (!this.currentPosition) {
                this.showNotification('warning', '📍 Đang xác định vị trí, vui lòng thử lại sau');
                this.getCurrentLocation();
                return false;
            }

            return true;
        }

        handleAttendanceResponse(result) {
            if (result.success) {
                this.showNotification('success', '🎉 ' + result.message);
                setTimeout(() => location.reload(), 3000);
            } else {
                this.showNotification('error', '❌ ' + result.message);
            }
        }

        async loadRecentAttendances() {
            try {
                const response = await fetch('{{ route("admin.attendance.attendances") }}');
                const result = await response.json();

                if (result.success) {
                    this.displayRecentAttendances(result.data);
                }
            } catch (error) {
                console.error('Error loading attendances:', error);
                document.getElementById('recent-attendances').innerHTML = `
                <div class="text-center py-6">
                    <div class="text-gray-400 mb-3">
                        <svg class="mx-auto h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-sm">Không thể tải dữ liệu</p>
                </div>
            `;
            }
        }

        displayRecentAttendances(attendances) {
            const container = document.getElementById('recent-attendances');

            if (!attendances || attendances.length === 0) {
                container.innerHTML = `
                <div class="text-center py-8">
                    <div class="mx-auto h-12 w-12 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-base font-semibold text-gray-900 mb-1">Chưa có dữ liệu</h4>
                    <p class="text-gray-500 text-sm">Lịch sử điểm danh sẽ hiển thị tại đây</p>
                </div>
            `;
                return;
            }

            const recentItems = attendances.slice(0, 5);
            const html = recentItems.map((item, index) => `
            <div class="bg-gradient-to-r from-gray-50 to-white border border-gray-200/50 rounded-xl p-3 transition-all duration-300 hover:shadow-md hover:scale-[1.02] animate-fade-in" style="animation-delay: ${index * 0.1}s">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">${item.date}</p>
                            <p class="text-xs text-gray-500">Điểm danh</p>
                        </div>
                    </div>
                    <div class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${item.status === 'complete' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800'}">
                        ${item.status === 'complete' ? '✓ Hoàn thành' : '⏳ Chưa xong'}
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="flex items-center space-x-2 p-2 bg-emerald-50 rounded-lg">
                        <svg class="w-3 h-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        <div>
                            <p class="text-xs text-emerald-600 font-medium">In</p>
                            <p class="text-xs font-bold text-emerald-800">${item.checkin_time || '--:--'}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 p-2 bg-red-50 rounded-lg">
                        <svg class="w-3 h-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <div>
                            <p class="text-xs text-red-600 font-medium">Out</p>
                            <p class="text-xs font-bold text-red-800">${item.checkout_time || '--:--'}</p>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');

            container.innerHTML = html;
        }

        updateCurrentTime() {
            const now = new Date();
            const timeOptions = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };

            const timeString = now.toLocaleTimeString('vi-VN', timeOptions);
            const dateString = now.toLocaleDateString('vi-VN', dateOptions);

            document.getElementById('current-time').innerHTML = `
            <div class="text-xs font-semibold text-green-600 uppercase tracking-wide">${dateString}</div>
            <div class="text-lg font-bold text-gray-900">${timeString}</div>
        `;
        }

        showTimeWarning(message) {
            document.getElementById('timeWarningMessage').textContent = message;
            document.getElementById('timeWarningModal').classList.remove('hidden');
        }

        showNotification(type, message) {
            console.log('Notification:', type, message);

            const notification = document.createElement('div');
            const bgColors = {
                success: 'bg-gradient-to-r from-emerald-50 to-green-50 border-emerald-200 text-emerald-800',
                error: 'bg-gradient-to-r from-red-50 to-rose-50 border-red-200 text-red-800',
                warning: 'bg-gradient-to-r from-amber-50 to-yellow-50 border-amber-200 text-amber-800',
                info: 'bg-gradient-to-r from-blue-50 to-sky-50 border-blue-200 text-blue-800'
            };

            notification.className = `fixed top-4 right-4 z-50 max-w-sm p-4 border-2 rounded-xl shadow-xl ${bgColors[type]} animate-slide-up`;
            notification.innerHTML = `
            <div class="flex items-start justify-between">
                <div class="flex items-center space-x-2">
                    <p class="font-bold text-sm">${message}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-3 text-current hover:opacity-70 transition-opacity">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;

            document.body.appendChild(notification);
            setTimeout(() => notification.remove(), 5000);
        }

        showLoading(show) {
            const modal = document.getElementById('loadingModal');
            if (show) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }
    }

    function closeTimeWarning() {
        document.getElementById('timeWarningModal').classList.add('hidden');
    }

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing attendance manager...');
        new EnhancedAttendanceManager();
    });
</script>
@endsection