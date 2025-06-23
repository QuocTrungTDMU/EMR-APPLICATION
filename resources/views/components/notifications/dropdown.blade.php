{{-- Debug: Kiểm tra component được render --}}
@if(config('app.debug'))
<div style="background: yellow; color: black; padding: 2px; font-size: 10px;">
    Notification Component Rendered - User: {{ auth()->check() ? auth()->user()->id : 'Not logged' }}
</div>
@endif

<div class="relative">
    <!-- Notification Button -->
    <button id="notificationBtn"
        class="relative inline-flex items-center text-gray-600 hover:text-blue-600 transition-colors duration-200 p-2"
        title="Notifications">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
        </svg>

        <!-- Badge -->
        <span id="notificationBadge" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-semibold rounded-full h-5 w-5 flex items-center justify-center hidden">
            0
        </span>
    </button>

    <!-- Dropdown -->
    <div id="notificationDropdown"
        class="hidden absolute right-0 mt-3 w-96 bg-white rounded-xl shadow-2xl border border-gray-100 z-50 max-h-[500px] overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200">
            <div class="flex items-center space-x-3">
                <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>
                <span id="headerBadge" class="bg-red-500 text-white text-xs font-bold rounded-full px-2 py-1 hidden">0</span>
            </div>
            <button id="markAllReadBtn" class="text-blue-600 hover:text-blue-800 text-sm font-medium transition-colors">
                Mark All As Read
            </button>
        </div>

        <!-- Notifications List - QUAN TRỌNG: ID này bị thiếu -->
        <div id="notificationsList" class="overflow-y-auto max-h-96">
            <div class="px-6 py-8 text-center">
                <p class="text-gray-500 text-sm">Đang tải thông báo...</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
            <a href="/notifications" class="block w-full text-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                Xem tất cả thông báo
            </a>
        </div>
    </div>
</div>



<!-- Modal chi tiết thông báo -->
<div id="notificationModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-hidden shadow-2xl">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-blue-100">
            <h3 class="text-lg font-semibold text-gray-900">Chi tiết thông báo</h3>
            <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="px-6 py-6 overflow-y-auto max-h-[70vh]">
            <!-- Loading State -->
            <div id="modalLoading" class="text-center py-8">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
                <p class="text-gray-600">Đang tải chi tiết...</p>
            </div>

            <!-- Content -->
            <div id="modalContent" class="hidden">
                <!-- Notification Status -->
                <div class="flex items-center justify-between mb-6 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div id="modalStatusIcon" class="w-12 h-12 rounded-full flex items-center justify-center">
                            <!-- Icon will be inserted here -->
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Trạng thái</p>
                            <p id="modalStatus" class="font-medium text-gray-900"></p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Thời gian</p>
                        <p id="modalDate" class="font-medium text-gray-900"></p>
                    </div>
                </div>

                <!-- Notification Title -->
                <div class="mb-6">
                    <h4 id="modalTitle" class="text-xl font-bold text-gray-900 mb-2"></h4>
                    <div id="modalType" class="inline-block px-3 py-1 rounded-full text-xs font-medium"></div>
                </div>

                <!-- Notification Body -->
                <div class="mb-6">
                    <h5 class="text-sm font-semibold text-gray-700 mb-2">Nội dung:</h5>
                    <div id="modalBody" class="text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-lg"></div>
                </div>

                <!-- Additional Data -->
                <div id="modalAdditionalData" class="hidden">
                    <h5 class="text-sm font-semibold text-gray-700 mb-2">Thông tin bổ sung:</h5>
                    <div id="modalDataContent" class="bg-gray-50 p-4 rounded-lg">
                        <!-- Additional data will be inserted here -->
                    </div>
                </div>
            </div>

            <!-- Error State -->
            <div id="modalError" class="hidden text-center py-8">
                <svg class="w-16 h-16 text-red-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L5.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <p class="text-gray-600 mb-2">Không thể tải chi tiết thông báo</p>
                <button id="retryBtn" class="text-blue-600 hover:text-blue-800 font-medium">Thử lại</button>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <button id="markAsReadBtn" class="hidden px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                    Đánh dấu đã đọc
                </button>
                <button id="deleteNotificationBtn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">
                    Xóa thông báo
                </button>
            </div>
            <button id="closeModalFooterBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors text-sm font-medium">
                Đóng
            </button>
        </div>
    </div>
</div>



{{-- Debug script để kiểm tra elements --}}
@if(config('app.debug'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('=== NOTIFICATION DEBUG ===');
        console.log('notificationBtn:', document.getElementById('notificationBtn'));
        console.log('notificationDropdown:', document.getElementById('notificationDropdown'));
        console.log('notificationsList:', document.getElementById('notificationsList'));
        console.log('Auth check:', {
            {
                auth() - > check() ? 'true' : 'false'
            }
        });
        console.log('User ID:', {
            {
                auth() - > id() ?? 'null'
            }
        });
    });
</script>
@endif