@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Chỉnh sửa hồ sơ bệnh nhân</h2>

        <form action="{{ route('admin.patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id">Mã hồ sơ</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $patient->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $patient->phone }}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <textarea class="form-control" id="address" name="address">{{ $patient->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Tiến trình</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $patient->status }}">
            </div>
            <div class="form-group">
                <label for="created_at">Hoạt động</label>
                <input type="date" class="form-control" id="created_at" name="created_at" value="{{ $patient->created_at }}">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection