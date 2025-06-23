@extends('layouts.app')

@section('title', 'Hồ sơ cá nhân - Medik')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50">
    <!-- Header với breadcrumb -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="flex items-center justify-between py-6">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('homepage') }}" class="flex items-center text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Trang chủ
                    </a>
                    <span class="text-gray-400">/</span>
                    <span class="text-blue-600 font-medium">Hồ sơ cá nhân</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-12 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-10">
            <!-- Sidebar -->
            <div class="w-full max-w-xs bg-white p-6 rounded-xl shadow-lg sticky top-6">
                <div class="mb-6">
                    @include('profile.partials.edit-info.upload-image-user')

                    <!-- Navigation Menu -->
                    <nav class="space-y-3">
                        <a href="#profile-info" class="nav-link active flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Thông tin cá nhân
                        </a>
                        <a href="#password" class="nav-link flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Bảo mật
                        </a>
                        <a href="#notifications" class="nav-link flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                            </svg>
                            Thông báo
                        </a>
                        <a href="#danger-zone" class="nav-link flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            Vùng nguy hiểm
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Profile Information Section -->
                <div id="profile-info" class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Thông tin cá nhân
                        </h2>
                        <p class="text-blue-100 text-sm mt-1">Xem thông tin cơ bản của bạn</p>
                    </div>

                    <div class="p-6">
                        @if (session('status'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-xl flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-xl flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Họ và tên
                                    </label>
                                    <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-700">
                                        {{ $user->name }}
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Email
                                    </label>
                                    <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-700">
                                        {{ isset($user->email) ? $user->email : auth()->user()->email }}
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Thông tin sẽ được mã hóa và bảo mật
                                </div>
                                <a href="{{ route('profile.edit') }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-semibold py-2 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828l-5.657-5.657a2 2 0 112.828-2.828l2.829 2.829"></path>
                                        </svg>
                                        Chỉnh sửa
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password Section -->
                @include('profile.partials.view-info.view-password-form')

                <!-- Danger Zone -->
                @include('profile.partials.view-info.delete-user-form')
            </div>
        </div>
    </div>
</div>

<style>
    .nav-link {
        color: rgb(75 85 99); /* text-gray-600 */
        transition: all 0.2s ease;
    }

    .nav-link:hover {
        color: rgb(37 99 235); /* text-blue-600 */
        background-color: rgb(239 246 255); /* bg-blue-50 */
    }

    .nav-link.active {
        color: rgb(37 99 235); /* text-blue-600 */
        background-color: rgb(239 246 255); /* bg-blue-50 */
        border-right: 2px solid rgb(37 99 235); /* border-r-2 border-blue-600 */
    }
</style>
@endsection