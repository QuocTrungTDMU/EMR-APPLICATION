<!-- Toast Container -->
<div id="toastContainer" class="fixed top-4 right-4 z-50 space-y-3"></div>

<!-- Toast Template -->
<template id="toastTemplate">
    <div class="toast-notification transform transition-all duration-300 ease-in-out translate-x-full opacity-0">
        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg border-l-4 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="toast-icon w-6 h-6 rounded-full flex items-center justify-center"></div>
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <p class="toast-title text-sm font-semibold text-gray-900"></p>
                        <p class="toast-message mt-1 text-sm text-gray-600"></p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button class="toast-close inline-flex text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="toast-progress w-full bg-gray-200 h-1">
                <div class="toast-progress-bar h-full transition-all duration-100 ease-linear"></div>
            </div>
        </div>
    </div>
</template>