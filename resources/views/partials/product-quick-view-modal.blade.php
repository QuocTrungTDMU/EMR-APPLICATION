<!-- Product Quick View Modal -->
<div id="product-quick-view-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-hidden relative mx-4">
        <!-- Modal Header -->
        <div class="flex justify-end p-4 border-b border-gray-200">
            <button id="quick-view-close" class="text-gray-500 hover:text-gray-700 text-2xl font-bold w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                ×
            </button>
        </div>

        <!-- Modal Content -->
        <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-8 overflow-y-auto max-h-[calc(90vh-80px)]">
            <!-- Product Image Section -->
            <div class="flex flex-col">
                <!-- Main Image -->
                <div class="relative mb-4 bg-gray-50 rounded-lg overflow-hidden">
                    <img id="main-product-image"
                        src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-1000x1000.jpg"
                        alt="Vitamin C Tablet"
                        class="w-full h-96 object-contain">

                    <!-- Zoom Icon -->
                    <button class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-lg hover:shadow-xl transition-shadow">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Thumbnail Images -->
                <div class="flex space-x-2 overflow-x-auto">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-250x250.jpg"
                        alt="Thumbnail 1"
                        class="w-16 h-16 object-cover rounded border-2 border-blue-500 cursor-pointer flex-shrink-0">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-250x250.jpg"
                        alt="Thumbnail 2"
                        class="w-16 h-16 object-cover rounded border border-gray-200 cursor-pointer flex-shrink-0 hover:border-blue-500">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-250x250.jpg"
                        alt="Thumbnail 3"
                        class="w-16 h-16 object-cover rounded border border-gray-200 cursor-pointer flex-shrink-0 hover:border-blue-500">
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="flex flex-col">
                <!-- Product Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Vitamin C Tablet</h1>

                <!-- Rating -->
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400 mr-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6"></polygon>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6"></polygon>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6"></polygon>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6"></polygon>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6"></polygon>
                        </svg>
                    </div>
                    <span class="text-sm text-gray-600">Rated 5.00 out of 5 based on 1 customer rating</span>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <span class="text-3xl font-bold text-blue-600">₹60.00</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-700 leading-relaxed">
                        Condimentum id venenatis a condimentum vitae sapien pellentesque habitant. Proin sed libero enim sed faucibus turpis in. Et magnis dis parturient montes. Imperdiet nulla malesuada pellentesque elit eget gravida cum. In hendrerit gravida rutrum quisque.
                    </p>
                </div>

                <!-- Stock Status -->
                <div class="mb-6">
                    <p class="text-green-600 font-semibold">977 in stock</p>
                </div>

                <!-- Quantity and Add to Cart -->
                <form class="mb-6">
                    <div class="flex items-center space-x-4 mb-4">
                        <!-- Quantity Selector -->
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <button type="button" class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-l-lg">
                                -
                            </button>
                            <input type="number" value="1" min="1" class="w-16 text-center py-2 border-0 focus:ring-0 focus:outline-none">
                            <button type="button" class="px-3 py-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-r-lg">
                                +
                            </button>
                        </div>

                        <!-- Add to Cart Button -->
                        <button type="submit" class="flex-1 bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0h8"></path>
                            </svg>
                            Add to cart
                        </button>
                    </div>
                </form>

                <!-- Product Meta Information -->
                <div class="border-t border-gray-200 pt-6 space-y-3">
                    <div class="flex items-start">
                        <span class="font-semibold text-gray-900 w-20">SKU:</span>
                        <span class="text-gray-600">woo-beanie</span>
                    </div>
                    <div class="flex items-start">
                        <span class="font-semibold text-gray-900 w-20">Categories:</span>
                        <div class="flex flex-wrap gap-1">
                            <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Capsules</a>,
                            <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Medicine</a>,
                            <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Pills</a>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <span class="font-semibold text-gray-900 w-20">Tags:</span>
                        <div class="flex flex-wrap gap-1">
                            <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Solid</a>,
                            <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Testing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quickViewButtons = document.querySelectorAll('[title="Quick View"]');
        const modal = document.getElementById('product-quick-view-modal');
        const closeButton = document.getElementById('quick-view-close');
        const thumbnails = document.querySelectorAll('img[alt^="Thumbnail"]');
        const mainImage = document.getElementById('main-product-image');

        // Mở modal khi click vào nút Quick View
        quickViewButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        });

        // Đóng modal
        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Đóng modal khi click vào nút close
        closeButton.addEventListener('click', closeModal);

        // Đóng modal khi click vào overlay
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Đóng modal khi nhấn ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        // Xử lý thumbnail images
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // Remove active border from all thumbnails
                thumbnails.forEach(thumb => {
                    thumb.classList.remove('border-blue-500');
                    thumb.classList.add('border-gray-200');
                });

                // Add active border to clicked thumbnail
                this.classList.remove('border-gray-200');
                this.classList.add('border-blue-500');

                // Update main image
                mainImage.src = this.src.replace('-250x250', '-1000x1000');
            });
        });

        // Quantity selector functionality
        const quantityInput = document.querySelector('input[type="number"]');
        const decreaseBtn = document.querySelector('button:has(+ input[type="number"])');
        const increaseBtn = document.querySelector('input[type="number"] + button');

        if (decreaseBtn && increaseBtn && quantityInput) {
            decreaseBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            increaseBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });
        }
    });
</script>