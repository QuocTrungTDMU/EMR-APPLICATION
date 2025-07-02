@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-10 px-2">
    <div class="w-full max-w-2xl mx-auto">
        @include('profile.partials.view-info.view-password-form')
    </div>
</div>
@endsection 