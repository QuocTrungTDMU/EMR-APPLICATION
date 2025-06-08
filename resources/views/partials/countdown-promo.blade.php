<section class="w-full bg-[#eaf6fe] relative overflow-hidden flex items-center min-h-[400px] md:min-h-[450px] lg:min-h-[500px] xl:min-h-[600px]"
  style="background: url('https://medik.wpenginepowered.com/wp-content/uploads/2020/05/number-counter-bg.jpg?id=21491') center center / cover no-repeat;">
  <!-- Họa tiết nền -->
  <div class="absolute inset-0 pointer-events-none select-none">
    <div class="absolute left-4 top-4 w-8 h-8 sm:w-10 sm:h-10 bg-blue-200/30 rounded-full blur-2xl"></div>
    <div class="absolute left-1/3 top-1/2 w-6 h-6 sm:w-8 sm:h-8 bg-blue-200/20 rounded-full blur-md"></div>
    <div class="absolute right-8 top-1/4 w-10 h-10 sm:w-16 sm:h-16 bg-blue-100/30 rounded-full blur-xl"></div>
    <div class="absolute left-1/4 bottom-6 w-10 h-10 sm:w-14 sm:h-14 bg-blue-100/20 rounded-full blur-lg"></div>
    <div class="absolute right-1/3 bottom-4 w-8 h-8 sm:w-10 sm:h-10 bg-blue-200/25 rounded-full blur-md"></div>
  </div>

  <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-8">
    <div class="flex flex-col lg:flex-row items-center justify-between w-full">
      <!-- Nội dung trái -->
      <div class="flex-1 flex flex-col items-center lg:items-start text-center lg:text-left px-2 lg:pl-16 py-8 sm:py-12">
        <h2 class="font-bold text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-[50px] leading-tight text-black mb-4" style="font-family:'Titillium Web',sans-serif;">
          Grade A Safety Masks<br>for Sale. <span class="text-blue-600">Hurry!</span>
        </h2>
        <p class="text-base xs:text-lg sm:text-xl md:text-2xl text-black mb-6" style="font-family:'Roboto',sans-serif;">
          Offer Ends on
        </p>
        <!-- Countdown -->
        <div class="flex flex-wrap justify-center lg:justify-start gap-3 sm:gap-6 mb-8">
          <div class="flex flex-col items-center bg-white rounded-lg shadow p-3 min-w-[60px] sm:min-w-[70px]">
            <span class="font-black text-2xl sm:text-3xl md:text-4xl text-black leading-none" id="days">00</span>
            <span class="text-xs sm:text-sm text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Days</span>
          </div>
          <span class="hidden md:inline font-black text-2xl sm:text-3xl md:text-4xl text-black pb-2">:</span>
          <div class="flex flex-col items-center bg-white rounded-lg shadow p-3 min-w-[60px] sm:min-w-[70px]">
            <span class="font-black text-2xl sm:text-3xl md:text-4xl text-black leading-none" id="hours">00</span>
            <span class="text-xs sm:text-sm text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Hours</span>
          </div>
          <span class="hidden md:inline font-black text-2xl sm:text-3xl md:text-4xl text-black pb-2">:</span>
          <div class="flex flex-col items-center bg-white rounded-lg shadow p-3 min-w-[60px] sm:min-w-[70px]">
            <span class="font-black text-2xl sm:text-3xl md:text-4xl text-black leading-none" id="minutes">00</span>
            <span class="text-xs sm:text-sm text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Minutes</span>
          </div>
          <span class="hidden md:inline font-black text-2xl sm:text-3xl md:text-4xl text-black pb-2">:</span>
          <div class="flex flex-col items-center bg-white rounded-lg shadow p-3 min-w-[60px] sm:min-w-[70px]">
            <span class="font-black text-2xl sm:text-3xl md:text-4xl text-black leading-none" id="seconds">00</span>
            <span class="text-xs sm:text-sm text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Seconds</span>
          </div>
        </div>
        <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold text-base sm:text-lg px-6 sm:px-8 py-3 sm:py-4 rounded-full transition-all duration-200 shadow-md" style="font-family:'Roboto',sans-serif;">
          Buy Now
        </a>
      </div>
      <!-- Ảnh phải -->
      <div class="flex-1 flex items-end justify-center lg:justify-end h-full mt-8 lg:mt-0 pr-0">
        <img src="https://pplx-res.cloudinary.com/image/private/user_uploads/60270545/4a5f43c7-22bb-4d60-92e4-896fd9beb3f1/image.jpg"
          alt=""
          class="w-2/3 xs:w-1/2 sm:w-2/3 md:w-3/4 lg:w-full max-w-[320px] sm:max-w-[400px] lg:max-w-[480px] h-auto object-contain select-none pointer-events-none"
          style="margin-bottom: -20px;">
      </div>
    </div>
  </div>
</section>

<script>
  function startCountdown() {
    const targetDate = new Date();
    targetDate.setDate(targetDate.getDate() + 30);

    function updateCountdown() {
      const now = new Date().getTime();
      const target = targetDate.getTime();
      const timeLeft = target - now;

      if (timeLeft > 0) {
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = days.toString().padStart(2, '0');
        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
      } else {
        document.getElementById('days').textContent = '00';
        document.getElementById('hours').textContent = '00';
        document.getElementById('minutes').textContent = '00';
        document.getElementById('seconds').textContent = '00';
      }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
  }
  document.addEventListener('DOMContentLoaded', startCountdown);
</script>