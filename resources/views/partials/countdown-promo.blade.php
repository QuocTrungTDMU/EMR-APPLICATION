<section class="w-screen bg-[#eaf6fe] relative overflow-hidden flex justify-center items-center py-0 px-0" style="min-height: 450px; background: url('https://medik.wpenginepowered.com/wp-content/uploads/2020/05/number-counter-bg.jpg?id=21491') center center / cover no-repeat;">
  <!-- Họa tiết virus nền (SVG hoặc background-image nếu muốn giống hơn nữa) -->
  <div class="absolute inset-0 pointer-events-none select-none">
    <!-- Bạn có thể dùng SVG hoặc background-image để vẽ các chấm tròn/virus mờ như ảnh gốc -->
    <div class="absolute left-10 top-10 w-10 h-10 bg-blue-200/30 rounded-full blur-2xl"></div>
    <div class="absolute left-1/3 top-1/2 w-8 h-8 bg-blue-200/20 rounded-full blur-md"></div>
    <div class="absolute right-20 top-1/4 w-16 h-16 bg-blue-100/30 rounded-full blur-xl"></div>
    <div class="absolute left-1/4 bottom-10 w-14 h-14 bg-blue-100/20 rounded-full blur-lg"></div>
    <div class="absolute right-1/3 bottom-8 w-10 h-10 bg-blue-200/25 rounded-full blur-md"></div>
  </div>
  <div class="relative z-10 w-full flex flex-col lg:flex-row items-center justify-between max-w-none px-0" data-aos="fade-in">
    <!-- Cột trái: Nội dung -->
    <div class="flex-1 flex flex-col items-center lg:items-start text-center lg:text-left px-2 lg:pl-24 py-16">
      <h2 class="font-bold text-[40px] md:text-[50px] leading-tight text-black mb-4" style="font-family:'Titillium Web',sans-serif;">
        Grade A Safety Masks<br>for Sale. Hurry!
      </h2>
      <p class="text-[24px] text-black mb-6" style="font-family:'Roboto',sans-serif;">
        Offer Ends on
      </p>
      <!-- Countdown -->
      <div class="flex items-end justify-center lg:justify-start gap-6 mb-8">
        <div class="flex flex-col items-center">
          <span class="font-black text-[40px] text-black leading-none" id="days">00</span>
          <span class="text-[16px] text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Days</span>
        </div>
        <span class="font-black text-[40px] text-black pb-3">:</span>
        <div class="flex flex-col items-center">
          <span class="font-black text-[40px] text-black leading-none" id="hours">00</span>
          <span class="text-[16px] text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Hours</span>
        </div>
        <span class="font-black text-[40px] text-black pb-3">:</span>
        <div class="flex flex-col items-center">
          <span class="font-black text-[40px] text-black leading-none" id="minutes">00</span>
          <span class="text-[16px] text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Minutes</span>
        </div>
        <span class="font-black text-[40px] text-black pb-3">:</span>
        <div class="flex flex-col items-center">
          <span class="font-black text-[40px] text-black leading-none" id="seconds">00</span>
          <span class="text-[16px] text-gray-700 mt-1" style="font-family:'Roboto',sans-serif;">Seconds</span>
        </div>
      </div>
      <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold text-lg px-8 py-3 rounded-full transition-all duration-200 shadow-md" style="font-family:'Roboto',sans-serif;">
        Buy Now
      </a>
    </div>
    <div class="flex-1 flex items-end justify-end h-full mt-8 lg:mt-0 pr-0">
      <img src="https://pplx-res.cloudinary.com/image/private/user_uploads/60270545/4a5f43c7-22bb-4d60-92e4-896fd9beb3f1/image.jpg"
        alt=""
        class="w-full max-w-[480px] h-auto object-contain select-none pointer-events-none lg:translate-x-12"
        style="margin-bottom: -20px;">
    </div>
  </div>
</section>

<style>
  .section-container {
    overflow: hidden;
  }
</style>

<script>
  function startCountdown() {
    // Đặt ngày kết thúc tại đây (ví dụ: 30 ngày từ bây giờ)
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