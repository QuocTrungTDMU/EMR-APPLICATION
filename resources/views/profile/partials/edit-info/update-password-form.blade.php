@extends('layouts.app')

@section('content')
<div id="password" x-data="passwordGenerator()" class="bg-white rounded-2xl max-w-4xl shadow-xl overflow-hidden mx-auto my-8">
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-5">
        <h2 class="text-2xl font-bold text-white flex items-center">
            <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            Đổi mật khẩu
        </h2>
        <p class="text-purple-100 text-sm mt-1">Cập nhật mật khẩu để bảo vệ tài khoản của bạn</p>
    </div>

    <div class="p-8">
        <!-- Banner thông báo session-based -->
        <template x-if="generalMessage">
            <div class="mb-8 p-4 rounded-lg flex items-center shadow-sm transition-all duration-300" 
                 :class="generalMessageType === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800'">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="generalMessageType === 'success'">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" x-show="generalMessageType === 'error'">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 0a1 1 0 112 0 1 1 0 01-2 0zm-1-5a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1 1z" clip-rule="evenodd"></path>
                </svg>
                <span x-text="generalMessage"></span>
            </div>
        </template>

        <form method="POST" action="{{ route('password.update') }}" @submit.prevent="handleSubmit" class="space-y-6" x-ref="form">
            @csrf
            @method('PUT')

            <div class="bg-gray-50 p-4 rounded-xl">
                <label for="old_password" class="block text-sm font-semibold text-gray-700 mb-2">
                    Mật khẩu hiện tại <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input id="old_password" name="old_password"
                           :type="showPasswordCurrent ? 'text' : 'password'"
                           x-model="currentPassword"
                           class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-sm transition-all bg-white"
                           placeholder="Nhập mật khẩu hiện tại" required>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <button type="button" @click="togglePassword('current')" class="absolute inset-y-0 right-0 pr-3 flex items-center focus:outline-none">
                        <svg x-show="!showPasswordCurrent" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPasswordCurrent" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 013.523-4.775M9.88 9.88a3 3 0 104.24 4.24" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                        </svg>
                    </button>
                </div>
                <template x-if="errors.old_password">
                    <p class="mt-2 text-sm text-red-600 flex items-center animate-fade-in">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span x-text="errors.old_password"></span>
                    </p>
                </template>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-4 rounded-xl">
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Mật khẩu mới <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="password" name="password" :type="showPassword1 ? 'text' : 'password'" x-model="password"
                               class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-sm transition-all bg-white"
                               placeholder="Nhập mật khẩu mới" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <button type="button" @click="togglePassword('new')" class="absolute inset-y-0 right-0 pr-3 flex items-center focus:outline-none">
                            <svg x-show="!showPassword1" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPassword1" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 013.523-4.775M9.88 9.88a3 3 0 104.24 4.24" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    <template x-if="errors.password">
                        <p class="mt-2 text-sm text-red-600 flex items-center animate-fade-in">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span x-text="errors.password"></span>
                        </p>
                    </template>
                </div>

                <div class="bg-gray-50 p-4 rounded-xl">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        Xác nhận mật khẩu <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" :type="showPassword2 ? 'text' : 'password'" x-model="password_confirmation"
                               class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-sm transition-all bg-white"
                               placeholder="Xác nhận mật khẩu mới" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <button type="button" @click="togglePassword('confirm')" class="absolute inset-y-0 right-0 pr-3 flex items-center focus:outline-none">
                            <svg x-show="!showPassword2" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="showPassword2" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 013.523-4.775M9.88 9.88a3 3 0 104.24 4.24" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    <template x-if="errors.password_confirmation">
                        <p class="mt-2 text-sm text-red-600 flex items-center animate-fade-in">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span x-text="errors.password_confirmation"></span>
                        </p>
                    </template>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl space-y-4">
                <label class="block font-semibold text-gray-700">Tùy chọn tạo mật khẩu:</label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" x-model="useLowercase" @change="generate()" checked class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <span>Chữ thường (a-z)</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" x-model="useUppercase" @change="generate()" checked class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <span>Chữ hoa (A-Z)</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" x-model="useNumbers" @change="generate()" checked class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <span>Số (0-9)</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" x-model="useSymbols" @change="generate()" checked class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <span>Ký tự đặc biệt (!@#$...)</span>
                    </label>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Độ dài mật khẩu: <span x-text="length"></span></label>
                    <input type="range" min="8" max="30" x-model="length" @input="generate()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-purple-600">
                </div>

                <template x-if="generatedPassword">
                    <div class="mt-2 p-3 bg-green-50 rounded-lg flex justify-between items-center">
                        <span class="text-green-600 font-mono break-all">Mật khẩu: <span x-text="generatedPassword"></span></span>
                        <button @click="copyToClipboard()" type="button" class="ml-2 bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 focus:outline-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h8a2 2 0 002-2M8 5a2 2 0 012-2h8a2 2 0 012 2m-6 9h4" />
                            </svg>
                        </button>
                    </div>
                </template>
                <template x-if="errors.generator">
                    <p class="mt-2 text-sm text-red-600 flex items-center animate-fade-in">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span x-text="errors.generator"></span>
                    </p>
                </template>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" x-model="confirmSave" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                    <span class="text-sm text-gray-700">Xác nhận lưu mật khẩu</span>
                </label>
                <template x-if="errors.confirmSave">
                    <p class="mt-2 text-sm text-red-600 flex items-center animate-fade-in">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span x-text="errors.confirmSave"></span>
                    </p>
                </template>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200 bg-gray-50 p-4 rounded-xl">
                <div class="text-sm text-gray-500 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.1-.9-2-2-2s-2 .9-2 2 2 4 2 4m2-4c0-1.1.9-2 2-2s2 .9 2 2-2 4-2 4m-6 5a2 2 0 01-2-2 2 2 0 012-2h4a2 2 0 012 2 2 2 0 01-2 2h-4z"></path>
                    </svg>
                    Mật khẩu được mã hóa an toàn
                </div>
                <button type="submit"
                        class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Cập nhật mật khẩu
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function passwordGenerator() {
        return {
            useLowercase: true,
            useUppercase: true,
            useNumbers: true,
            useSymbols: true,
            length: 12,
            generatedPassword: '',
            generalMessage: @json(session('status') ?? session('error') ?? ''),
            generalMessageType: @json(session('status') ? 'success' : (session('error') ? 'error' : '')),
            errors: {
                old_password: '',
                password: '',
                password_confirmation: '',
                generator: '',
                confirmSave: ''
            },
            showPasswordCurrent: false,
            showPassword1: false,
            showPassword2: false,
            password: '',
            password_confirmation: '',
            currentPassword: '',
            confirmSave: false,

            init() {
                this.generate();
                // Xóa session message sau 5 giây
                if (this.generalMessage) {
                    setTimeout(() => {
                        this.generalMessage = '';
                        this.generalMessageType = '';
                    }, 5000);
                }
            },

            togglePassword(type) {
                if (type === 'current') this.showPasswordCurrent = !this.showPasswordCurrent;
                else if (type === 'new') this.showPassword1 = !this.showPassword1;
                else if (type === 'confirm') this.showPassword2 = !this.showPassword2;
            },

            generate() {
                this.errors.generator = '';
                let charset = '';
                if (this.useLowercase) charset += 'abcdefghijklmnopqrstuvwxyz';
                if (this.useUppercase) charset += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                if (this.useNumbers) charset += '0123456789';
                if (this.useSymbols) charset += '!@#$%^&*()_+[]{}|;:,.<>?';

                if (charset.length === 0) {
                    this.generatedPassword = '';
                    this.errors.generator = 'Vui lòng chọn ít nhất một loại ký tự.';
                    return;
                }

                let password = '';
                for (let i = 0; i < this.length; i++) {
                    const randomIndex = Math.floor(Math.random() * charset.length);
                    password += charset[randomIndex];
                }
                this.generatedPassword = password;
                this.password = password;
                this.password_confirmation = password;
            },

            copyToClipboard() {
                if (this.generatedPassword) {
                    navigator.clipboard.writeText(this.generatedPassword).then(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sao chép thành công!',
                            text: 'Mật khẩu đã được sao chép vào clipboard.',
                            showConfirmButton: false,
                            timer: 1500,
                            toast: true,
                            position: 'top-end'
                        });
                    }).catch(err => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi sao chép',
                            text: 'Không thể sao chép mật khẩu: ' + err,
                            confirmButtonText: 'OK'
                        });
                    });
                }
            },

            handleSubmit() {
                // Reset lỗi
                this.errors = {
                    old_password: '',
                    password: '',
                    password_confirmation: '',
                    generator: '',
                    confirmSave: ''
                };
                this.generalMessage = '';

                console.log('Current state:', {
                    old_password: this.currentPassword,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    confirmSave: this.confirmSave
                });

                // Validation client-side
                if (!this.currentPassword) {
                    this.errors.old_password = 'Vui lòng nhập mật khẩu hiện tại.';
                    return;
                }

                if (!this.password || !this.password_confirmation) {
                    this.errors.password = 'Vui lòng nhập mật khẩu mới và xác nhận.';
                    return;
                }

                if (this.password !== this.password_confirmation) {
                    this.errors.password_confirmation = 'Mật khẩu xác nhận không khớp.';
                    return;
                }

                if (!this.confirmSave) {
                    this.errors.confirmSave = 'Vui lòng xác nhận lưu mật khẩu.';
                    return;
                }

                const data = {
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    _method: 'PUT',
                    old_password: this.currentPassword,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                };

                console.log('Data to send:', data);

                fetch(this.$refs.form.action, {
                    method: 'POST',
                    body: new URLSearchParams(data),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        return response.text().then(text => {
                            console.log('Response text:', text.substring(0, 200));
                            throw new Error(`HTTP ${response.status}: ${text.substring(0, 200)}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('API response:', data);
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: 'Mật khẩu đã được cập nhật thành công.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#8B5CF6'
                        }).then(() => {
                            window.location.href = '{{ route('profile.view') }}';
                        });
                    } else {
                        // Xử lý lỗi từ server
                        if (data.errors) {
                            Object.keys(data.errors).forEach(key => {
                                this.errors[key] = Array.isArray(data.errors[key]) ? data.errors[key][0] : data.errors[key];
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi nhập liệu',
                                text: 'Vui lòng kiểm tra các trường thông tin.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#8B5CF6'
                            });
                        } else {
                            this.generalMessage = data.message || 'Có lỗi xảy ra khi cập nhật mật khẩu.';
                            this.generalMessageType = 'error';
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: this.generalMessage,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#8B5CF6'
                            });
                        }
                    }
                }).catch(error => {
                    console.error('Lỗi:', error);
                    this.generalMessage = 'Lỗi kết nối: ' + error.message;
                    this.generalMessageType = 'error';
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi kết nối',
                        text: this.generalMessage,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#8B5CF6'
                    });
                });
            },

            resetForm() {
                this.currentPassword = '';
                this.password = '';
                this.password_confirmation = '';
                this.confirmSave = false;
                this.errors = {
                    old_password: '',
                    password: '',
                    password_confirmation: '',
                    generator: '',
                    confirmSave: ''
                };
                this.generalMessage = '';
                this.generate();
            }
        }
    }
</script>
@endsection