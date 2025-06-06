<section class="space-y-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
        <header>
            <h2 class="text-xl font-semibold text-red-600">
                {{ __('Xóa tài khoản') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Khi bạn xóa tài khoản, toàn bộ dữ liệu sẽ bị xóa vĩnh viễn. Hãy đảm bảo bạn đã sao lưu thông tin cần thiết trước khi tiếp tục.') }}
            </p>
        </header>

        <div class="mt-6">
            <x-danger-button
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="bg-red-600 hover:bg-red-700">
                {{ __('Xóa tài khoản') }}
            </x-danger-button>
        </div>
    </div>

    <!-- Modal xác nhận -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                {{ __('Bạn có chắc chắn muốn xóa tài khoản?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Sau khi xóa, tất cả dữ liệu của bạn sẽ bị xóa vĩnh viễn. Vui lòng nhập mật khẩu để xác nhận.') }}
            </p>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ __('Mật khẩu') }}
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Nhập mật khẩu"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Hủy') }}
                </x-secondary-button>

                <x-danger-button class="bg-red-600 hover:bg-red-700">
                    {{ __('Xác nhận xóa') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>