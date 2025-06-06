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

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
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