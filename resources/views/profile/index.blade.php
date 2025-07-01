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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            Thông báo
                        </a>
                        <a href="#danger" class="nav-link flex items-center px-4 py-3 text-sm font-medium rounded-xl">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Vùng nguy hiểm
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3 space-y-10">
                <section id="profile-info">
                    @include('profile.partials.view-info.view-profile-information-form')
                </section>
                <section id="password">
                    @include('profile.partials.view-info.view-password-form')
                </section>
                <section id="danger">
                    @include('profile.partials.view-info.delete-user-form')
                </section>
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