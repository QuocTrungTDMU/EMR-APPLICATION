<section class="w-screen bg-[#d9f3fa] py-16 flex items-center justify-center">
    <div class="w-full max-w-3xl mx-auto flex flex-col items-center">
        <!-- Tiêu đề với icon dấu cộng mờ phía sau -->
        <div class="relative flex flex-col items-center mb-3">
            <!-- Icon dấu cộng mờ -->
            <span class="absolute -top-2 left-1/2 -translate-x-1/2 opacity-20 select-none pointer-events-none" style="z-index:0;">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                    <rect x="20" y="0" width="8" height="48" rx="4" fill="#1c7ca7" />
                    <rect x="0" y="20" width="48" height="8" rx="4" fill="#1c7ca7" />
                </svg>
            </span>
            <h2 class="relative z-10 text-2xl md:text-3xl font-bold text-[#153B4B] text-center mb-2" style="font-family:'Titillium Web',sans-serif;">
                Subscribe to Our Newsletter
            </h2>
        </div>
        <p class="text-base text-black mb-8 text-center" style="font-family:'Roboto',sans-serif;">
            Sign-up to get the latest offers and news and stay updated.
        </p>
        <!-- Form -->
        <form class="w-full max-w-xl flex items-center justify-center mx-auto">
            <input
                type="email"
                required
                placeholder="Your Email Address"
                class="flex-1 min-w-0 bg-white/80 border border-transparent focus:border-blue-400 focus:ring-2 focus:ring-blue-200 text-gray-700 text-base px-5 py-3 rounded-l-full outline-none transition placeholder-gray-400"
                style="font-family:'Roboto',sans-serif;">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-r-full transition-all duration-200"
                style="font-family:'Roboto',sans-serif;">
                Submit
            </button>
        </form>
    </div>
</section>