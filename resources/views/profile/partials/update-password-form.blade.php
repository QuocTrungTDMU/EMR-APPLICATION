<script>
    function passwordGenerator() {
        return {
            password: '',
            password_confirmation: '',
            showPassword1: false,
            showPassword2: false,
            showPasswordCurrent: false,
            confirmed: false,
            passwordRules: {
                length: false,
                lowercase: false,
                uppercase: false,
                number: false,
                special: false,
            },

            generatePassword() {
                const lowercase = "abcdefghijklmnopqrstuvwxyz";
                const uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                const numbers = "0123456789";
                const specials = "!@#$%^&*()_+";
                const all = lowercase + uppercase + numbers + specials;

                let pwd = '';
                pwd += lowercase.charAt(Math.floor(Math.random() * lowercase.length));
                pwd += uppercase.charAt(Math.floor(Math.random() * uppercase.length));
                pwd += numbers.charAt(Math.floor(Math.random() * numbers.length));
                pwd += specials.charAt(Math.floor(Math.random() * specials.length));

                for (let i = pwd.length; i < 12; i++) {
                    pwd += all.charAt(Math.floor(Math.random() * all.length));
                }

                // Khúc này là đi suffle ngẫu nhiên để tránh vụ nó bị xuất hiện trường hợp lỗi
                // Mỗi loại mình lấy vài cái cho đủ nên không thể xuất hiện lại ngẫu nhiên
                this.password = pwd.split('').sort(() => 0.5 - Math.random()).join('');
                this.password_confirmation = this.password;
                this.validatePassword();
            },

            validatePassword() {
                this.passwordRules.length = this.password.length >= 8;
                this.passwordRules.lowercase = /[a-z]/.test(this.password);
                this.passwordRules.uppercase = /[A-Z]/.test(this.password);
                this.passwordRules.number = /[0-9]/.test(this.password);
                this.passwordRules.special = /[!@#$%^&*()_+]/.test(this.password);
            },

            isPasswordValid() {
                return Object.values(this.passwordRules).every(v => v === true);
            },

            isMatch() {
                return this.password === this.password_confirmation;
            },

            canEnableCheckbox() {
                return this.isPasswordValid() && this.isMatch();
            },

            canSubmit() {
                return this.confirmed && this.canEnableCheckbox();
            },

            init() {
                this.validatePassword();

                this.$watch('password', () => {
                    this.validatePassword();
                    if (!this.canEnableCheckbox()) this.confirmed = false;
                });

                this.$watch('password_confirmation', () => {
                    if (!this.canEnableCheckbox()) this.confirmed = false;
                });
            }
        };
    }
</script>

<section x-data="passwordGenerator()" x-init="validatePassword()" x-init="init()">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
        <header>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Đổi mật khẩu</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Hãy sử dụng mật khẩu mạnh để bảo vệ tài khoản của bạn.
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')

            <!-- Mật khẩu hiện tại -->
            <div>
                <x-input-label for="current_password" value="Mật khẩu hiện tại" />
                <div class="relative">
                    <input
                        :type="showPasswordCurrent ? 'text' : 'password'"
                        name="current_password"
                        id="current_password"
                        class="mt-1 block w-full pr-10 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        autocomplete="current-password" />
                    <button type="button"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        @click="showPasswordCurrent = !showPasswordCurrent">
                        <svg x-show="!showPasswordCurrent" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zM10 15a5 5 0 110-10 5 5 0 010 10z" />
                            <path d="M10 7a3 3 0 100 6 3 3 0 000-6z" />
                        </svg>
                        <svg x-show="showPasswordCurrent" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4.03 3.97a.75.75 0 00-1.06 1.06l1.3 1.3C2.78 7.01 1.6 8.76 1 10c.73 2.89 4 7 9 7a8.96 8.96 0 004.13-1.01l1.83 1.83a.75.75 0 001.06-1.06L4.03 3.97zM14.78 12.6l-2.23-2.23a3 3 0 00-3.92-3.92L7.59 5.39a5 5 0 016.62 6.62l-.43-.4z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <!-- Mật khẩu mới -->
            <div>
                <div class="flex justify-between items-center">
                    <x-input-label for="password" value="Mật khẩu mới" />
                    <button type="button" class="text-sm text-blue-600 hover:underline" @click="generatePassword()">Tạo mật khẩu ngẫu nhiên</button>
                </div>
                <div class="relative">
                    <input
                        :type="showPassword1 ? 'text' : 'password'"
                        x-model="password"
                        @input="validatePassword()"
                        name="password"
                        id="password"
                        class="mt-1 block w-full pr-10 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        autocomplete="new-password" />
                    <button type="button"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        @click="showPassword1 = !showPassword1">
                        <svg x-show="!showPassword1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zM10 15a5 5 0 110-10 5 5 0 010 10z" />
                            <path d="M10 7a3 3 0 100 6 3 3 0 000-6z" />
                        </svg>
                        <svg x-show="showPassword1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4.03 3.97a.75.75 0 00-1.06 1.06l1.3 1.3C2.78 7.01 1.6 8.76 1 10c.73 2.89 4 7 9 7a8.96 8.96 0 004.13-1.01l1.83 1.83a.75.75 0 001.06-1.06L4.03 3.97zM14.78 12.6l-2.23-2.23a3 3 0 00-3.92-3.92L7.59 5.39a5 5 0 016.62 6.62l-.43-.4z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                <ul class="mt-2 text-sm space-y-1">
                    <li :class="{'text-green-600': passwordRules.length, 'text-red-600': !passwordRules.length}">• Tối thiểu 8 ký tự</li>
                    <li :class="{'text-green-600': passwordRules.lowercase, 'text-red-600': !passwordRules.lowercase}">• Có chữ thường (a-z)</li>
                    <li :class="{'text-green-600': passwordRules.uppercase, 'text-red-600': !passwordRules.uppercase}">• Có chữ hoa (A-Z)</li>
                    <li :class="{'text-green-600': passwordRules.number, 'text-red-600': !passwordRules.number}">• Có số (0-9)</li>
                    <li :class="{'text-green-600': passwordRules.special, 'text-red-600': !passwordRules.special}">• Có ký tự đặc biệt (!@#$...)</li>
                </ul>
            </div>

            <!-- Xác nhận mật khẩu mới -->
            <div>
                <x-input-label for="password_confirmation" value="Xác nhận mật khẩu" />
                <div class="relative">
                    <input
                        :type="showPassword2 ? 'text' : 'password'"
                        x-model="password_confirmation"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="mt-1 block w-full pr-10 rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        autocomplete="new-password" />
                    <button type="button"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        @click="showPassword2 = !showPassword2">
                        <svg x-show="!showPassword2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zM10 15a5 5 0 110-10 5 5 0 010 10z" />
                            <path d="M10 7a3 3 0 100 6 3 3 0 000-6z" />
                        </svg>
                        <svg x-show="showPassword2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4.03 3.97a.75.75 0 00-1.06 1.06l1.3 1.3C2.78 7.01 1.6 8.76 1 10c.73 2.89 4 7 9 7a8.96 8.96 0 004.13-1.01l1.83 1.83a.75.75 0 001.06-1.06L4.03 3.97zM14.78 12.6l-2.23-2.23a3 3 0 00-3.92-3.92L7.59 5.39a5 5 0 016.62 6.62l-.43-.4z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Checkbox xác nhận -->
            <div class="flex items-start gap-2 mt-4">
                <input type="checkbox"
                    id="confirm_change"
                    x-model="confirmed"
                    :disabled="!canEnableCheckbox()"
                    class="mt-1">
                <label for="confirm_change" class="text-sm text-gray-700 dark:text-gray-300">
                    Tôi xác nhận muốn đổi mật khẩu
                </label>
            </div>

            <!-- Nút lưu -->
            <div class="flex items-center gap-4">
                <x-primary-button type="submit" x-bind:disabled="!canSubmit()">Lưu thay đổi</x-primary-button>
            </div>
        </form>
    </div>
</section>