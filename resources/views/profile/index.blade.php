@extends('layouts.app')

@section('title', 'Hồ sơ cá nhân - Medik')

@section('head')
    <meta name="access-token" content="{{ $accessToken ?? '' }}">
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-cyan-50">
    <!-- Header với breadcrumb -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- Sidebar -->
            <div class="w-64 bg-white p-6 rounded-xl shadow-lg">
                <div class="mb-6">
                    @include('profile.partials.edit-info.upload-image-user')

                    <!-- Navigation Menu -->
                    <nav class="space-y-2">
                        <a href="#profile-info" class="nav-link active flex items-center px-4 py-3 text-sm font-medium rounded-xl">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Thông tin cá nhân
                        </a>
                        <a href="#password" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-xl">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Bảo mật
                        </a>
                        <a href="#notifications" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-xl">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
                            </svg>
                            Thông báo
                        </a>
                        <a href="#danger-zone" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-xl">
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
                @include('profile.partials.view-info.view-profile-information-form')
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
        color: rgb(75 85 99);
        /* text-gray-600 */
        transition: all 0.2s ease;
    }

    .nav-link:hover {
        color: rgb(37 99 235);
        /* text-blue-600 */
        background-color: rgb(239 246 255);
        /* bg-blue-50 */
    }

    .nav-link.active {
        color: rgb(37 99 235);
        /* text-blue-600 */
        background-color: rgb(239 246 255);
        /* bg-blue-50 */
        border-right: 2px solid rgb(37 99 235);
        /* border-r-2 border-blue-600 */
    }
</style>
@endsection