@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div id="main" class="flex justify-center items-center min-h-screen">
    <div class="w-full">
        <section id="primary" class="content-full-width">
            <div class="post-id" class="post-21394 page type-page status-publish hentry">
                <section class="wpb-content-wrapper">
                    <div data-delay="0" class="vc_row wpb_row vc_row-fluid">
                        <div class="wpb_column vc_column_container vc_col-sm-12 flex flex-col items-center" data-delay="0">
                            <div class="vc_column-inner w-full">
                                <div class="wpb_wrapper text-center">
                                    <div id="1589457460476-59a0fbd9-36e3" class="dt-sc-empty-space"></div>
                                </div>
                            </div>
                            <div class="w-full">
                                @include('partials.promo-cards')
                                @include('partials.products-section')
                                @include('partials.countdown-promo')
                                @include('partials.our-product')
                                @include('partials.clientsays')
                                @include('partials.latest-new', ['latestNews' => $latestNews ?? []])
                                @include('partials.subscribe-newsletter')
                                @include('partials.partners-carousel')
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>

@if(request()->has('verified') && request()->get('verified') == '1')
    <script>
        // Lưu lại để xác minh email để tab khác biết và redirect
        localStorage.setItem('email_verified', '1');
    </script>
@endif
@endsection
