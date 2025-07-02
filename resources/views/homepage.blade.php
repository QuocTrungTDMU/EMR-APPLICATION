@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div id="main" class="flex justify-center items-center">
    <div id="smooth-wrapper">
        <div id="smooth-content">

            @include('partials.hero-section')

            @include('partials.counter-section')

            @include('partials.feature-section')

            @include('partials.about-section')

            @include('partials.marquee-section')

            @include('partials.service-section')

            @include('partials.appoiment-section')

            @include('partials.best-doctor-section')

            @include('partials.testimonial-section')

            @include('partials.brand-section')

            @include('partials.blog-section')

            @include('partials.subscribe-section')

        </div>
    </div>
</div>

@if(request()->has('verified') && request()->get('verified') == '1')
    <script>
        // Lưu lại để xác minh email để tab khác biết và redirect
        localStorage.setItem('email_verified', '1');
    </script>
@endif
@endsection
