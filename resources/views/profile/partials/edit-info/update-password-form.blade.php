@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content') 

<div id="password" x-data="passwordGenerator()" class="bg-white rounded-2xl max-w-4xl shadow-lg overflow-hidden mx-auto">
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
        <h2 class="text-xl font-semibold text-white flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            Bảo mật tài khoản
        </h2>
        <p class="text-purple-100 text-sm mt-1">Thay đổi mật khẩu để bảo vệ tài khoản</p>
    </div>

    <div class="p-6">
        <form method="post" action="{{ route('password.update') }}" @submit.prevent="handleSubmit" class="space-y-6" x-ref="form">
            @csrf
            @method('put')

            <div class="bg-gray-50 p-4 rounded-xl">
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                    Mật khẩu hiện tại <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input id="current_password" name="current_password"
                           :type="showPasswordCurrent ? 'text' : 'password'"
                           x-model="currentPassword"
                           class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-sm transition-all bg-white">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" @click="togglePassword('current')" class="focus:outline-none">
                            <svg x-show="!showPasswordCurrent" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S3.732 16.057 2.458 12z" />
                            </svg>
                            <svg x-show="showPasswordCurrent" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 013.523-4.775M9.88 9.88a3 3 0 104.24 4.24" />
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>
                <template x-if="currentPasswordError">
                    <p class="mt-2 text-sm text-red-600 flex items-center" x-text="currentPasswordError"></p>
                </template>
                @error('current_password')
                    <p class="mt-2 text-sm text-red-600 flex items-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-4 rounded-xl">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Mật khẩu mới <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="password" name="password" :type="showPassword1 ? 'text' : 'password'" x-model="password"
                               class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-sm transition-all bg-white">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" @click="togglePassword('new')" class="focus:outline-none">
                                <svg x-show="!showPassword1" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S3.732 16.057 2.458 12z" />
                                </svg>
                                <svg x-show="showPassword1" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 013.523-4.775M9.88 9.88a3 3 0 104.24 4.24" />
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <template x-if="passwordError">
                        <p class="mt-2 text-sm text-red-600 flex items-center" x-text="passwordError"></p>
                    </template>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 flex items-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-gray-50 p-4 rounded-xl">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Xác nhận mật khẩu <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" :type="showPassword2 ? 'text' : 'password'" x-model="password_confirmation"
                               class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent shadow-sm transition-all bg-white">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" @click="togglePassword('confirm')" class="focus:outline-none">
                                <svg x-show="!showPassword2" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S3.732 16.057 2.458 12z" />
                                </svg>
                                <svg x-show="showPassword2" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 013.523-4.775M9.88 9.88a3 3 0 104.24 4.24" />
                                    <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl space-y-4">
                <label class="block font-semibold text-gray-700">Tùy chọn thành phần mật khẩu:</label>
                <div class="space-y-2">
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

                {{-- <button @click="generate()" type="button" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-xl font-semibold hover:from-purple-700 hover:to-pink-700 transition-all shadow-md hover:shadow-lg flex items-center justify-center w-full">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Tạo mật khẩu
                </button> --}}

                <template x-if="generatedPassword">
                    <div class="mt-2 p-3 bg-green-50 rounded-lg flex justify-between items-center">
                        <span class="text-green-600 font-mono break-all">Mật khẩu: <span x-text="generatedPassword"></span></span>
                        <button @click="copyToClipboard()" type="button" class="ml-2 bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 focus:outline-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h8a2 2 0 002-2M8 5a2 2 0 012-2h8a2 2 0 012 2m-6 9h4" />
                            </svg>
                        </button>
                    </div>
                </template>
                <template x-if="error">
                    <div class="text-red-600 font-semibold text-sm mt-2" x-text="error"></div>
                </template>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" x-model="confirmSave" class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                    <span class="text-sm text-gray-700">Xác nhận lưu mật khẩu</span>
                </label>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200 bg-gray-50 p-4 rounded-xl">
                <div class="text-sm text-gray-500">Mật khẩu được mã hóa an toàn</div>
                <button type="submit"
                        class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-join="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Cập nhật mật khẩu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


<script>
    function passwordGenerator() {
        return {
            useLowercase: true,
            useUppercase: true,
            useNumbers: true,
            useSymbols: true,
            length: 12,
            generatedPassword: '',
            error: '',
            passwordError: '',
            showPasswordCurrent: false,
            showPassword1: false,
            showPassword2: false,
            password: '',
            password_confirmation: '',
            currentPassword: '',
            currentPasswordError: '',
            confirmSave: false,

            init() {
                this.generate();
            },

            togglePassword(type) {
                if (type === 'current') this.showPasswordCurrent = !this.showPasswordCurrent;
                else if (type === 'new') this.showPassword1 = !this.showPassword1;
                else if (type === 'confirm') this.showPassword2 = !this.showPassword2;
            },

            generate() {
                this.error = '';
                let charset = '';
                if (this.useLowercase) charset += 'abcdefghijklmnopqrstuvwxyz';
                if (this.useUppercase) charset += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                if (this.useNumbers) charset += '0123456789';
                if (this.useSymbols) charset += '!@#$%^&*()_+[]{}|;:,.<>?';

                if (charset.length === 0) {
                    this.generatedPassword = '';
                    this.error = 'Vui lòng chọn ít nhất một thành phần để tạo mật khẩu.';
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
                            title: 'Thành công!',
                            text: 'Mật khẩu đã được sao chép!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }).catch(err => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: 'Không thể sao chép mật khẩu: ' + err,
                            confirmButtonText: 'OK'
                        });
                    });
                }
            },

            handleSubmit() {
                this.currentPasswordError = '';
                this.passwordError = '';

                if (!this.currentPassword) {
                    this.currentPasswordError = 'Vui lòng nhập mật khẩu hiện tại.';
                    return;
                }

                if (!this.password || !this.password_confirmation) {
                    this.passwordError = 'Vui lòng tạo và xác nhận mật khẩu mới.';
                    return;
                }

                if (this.password !== this.password_confirmation) {
                    this.passwordError = 'Mật khẩu mới và xác nhận không khớp.';
                    return;
                }

                if (!this.confirmSave) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Cảnh báo!',
                        text: 'Vui lòng xác nhận lưu mật khẩu.',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                let formData = new FormData(this.$refs.form);
                fetch(this.$refs.form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                }).then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          Swal.fire({
                              icon: 'success',
                              title: 'Thành công!',
                              text: 'Mật khẩu đã được cập nhật.',
                              confirmButtonText: 'OK'
                          }).then(() => this.resetForm());
                      } else {
                          this.currentPasswordError = data.errors?.current_password?.[0] || 'Lỗi không xác định.';
                          this.passwordError = data.errors?.password?.[0] || data.errors?.password_confirmation?.[0];
                          Swal.fire({
                              icon: 'error',
                              title: 'Lỗi!',
                              text: this.currentPasswordError || this.passwordError,
                              confirmButtonText: 'OK'
                          });
                      }
                  }).catch(error => {
                      console.error('Lỗi:', error);
                      this.currentPasswordError = 'Có lỗi khi gửi yêu cầu.';
                      Swal.fire({
                          icon: 'error',
                          title: 'Lỗi!',
                          text: this.currentPasswordError,
                          confirmButtonText: 'OK'
                      });
                  });
            },

            resetForm() {
                this.currentPassword = '';
                this.password = '';
                this.password_confirmation = '';
                this.confirmSave = false;
                this.generate();
            }
        }
    }
</script>