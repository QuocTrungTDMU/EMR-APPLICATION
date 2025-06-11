<!-- Cart Icon Trigger (thêm vào menu) -->
<button id="cart-trigger" class="relative p-2 text-gray-600 hover:text-blue-600 transition-colors">
    <i class="fas fa-shopping-cart text-xl"></i>
    <span id="cart-badge" class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
        5
    </span>
</button>

<!-- Cart Modal Overlay -->
<div id="cart-modal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="cart-backdrop"></div>

    <!-- Modal Content -->
    <div class="fixed right-0 top-0 h-full w-full max-w-md transform transition-transform translate-x-full" id="cart-content">
        <div class="flex h-full flex-col bg-white shadow-xl">

            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-shopping-cart mr-2 text-blue-600"></i>
                    MY SHOPPING CART
                </h2>
                <button id="cart-close" class="p-2 text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Free Shipping Notice -->
            <div class="px-4 py-3 bg-blue-50 border-b border-blue-100">
                <p class="text-sm text-blue-800">
                    You can have <strong class="font-semibold">free shipping</strong> if you add products worth
                    <strong class="font-semibold">$600</strong>.
                </p>
                <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center mt-1">
                    How can I get this?
                    <i class="fas fa-arrow-right ml-1 text-xs"></i>
                </a>
            </div>

            <!-- Cart Items -->
            <div class="flex-1 overflow-y-auto px-4 py-4">
                <div class="space-y-4">

                    <!-- Item 1: Apple iPhone 15 -->
                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 bg-white rounded-lg overflow-hidden flex-shrink-0 p-1">
                            <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-finish-select-202309-6-1inch-pink_AV1?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1692923777972"
                                alt="Apple iPhone 15"
                                class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-medium text-gray-900 truncate">Apple iPhone 15, 256GB, Gold</h3>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <span class="w-8 text-center text-sm font-medium">2</span>
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                                <span class="text-lg font-bold text-gray-900">$1,797</span>
                            </div>
                            <div class="flex items-center space-x-3 mt-2 text-xs">
                                <button class="text-gray-500 hover:text-blue-600 flex items-center">
                                    <i class="far fa-heart mr-1"></i>
                                    Move to Favorites
                                </button>
                                <button class="text-red-500 hover:text-red-700 flex items-center">
                                    <i class="fas fa-trash mr-1"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2: Xbox Series X -->
                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 bg-white rounded-lg overflow-hidden flex-shrink-0 p-1">
                            <img src="https://assets.xboxservices.com/assets/fb/d2/fbd2cb56-5c25-414d-9f46-e6a164cdf5be.png?n=642227_Hero-Gallery-0_A1_857x676.png"
                                alt="Xbox Series X"
                                class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-medium text-gray-900 truncate">Xbox Series X, 1TB, Limited</h3>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <span class="w-8 text-center text-sm font-medium">1</span>
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                                <span class="text-lg font-bold text-gray-900">$599</span>
                            </div>
                            <div class="flex items-center space-x-3 mt-2 text-xs">
                                <button class="text-gray-500 hover:text-blue-600 flex items-center">
                                    <i class="far fa-heart mr-1"></i>
                                    Move to Favorites
                                </button>
                                <button class="text-red-500 hover:text-red-700 flex items-center">
                                    <i class="fas fa-trash mr-1"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3: Sony PlayStation 5 -->
                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 bg-white rounded-lg overflow-hidden flex-shrink-0 p-1">
                            <img src="https://images-na.ssl-images-amazon.com/images/I/51EZjVpLd6L._SL1024_.jpg"
                                alt="Sony PlayStation 5"
                                class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-medium text-gray-900 truncate">Sony PlayStation 5, 2 controllers</h3>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <span class="w-8 text-center text-sm font-medium">1</span>
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                                <span class="text-lg font-bold text-gray-900">$799</span>
                            </div>
                            <div class="flex items-center space-x-3 mt-2 text-xs">
                                <button class="text-gray-500 hover:text-blue-600 flex items-center">
                                    <i class="far fa-heart mr-1"></i>
                                    Move to Favorites
                                </button>
                                <button class="text-red-500 hover:text-red-700 flex items-center">
                                    <i class="fas fa-trash mr-1"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4: Apple Watch SE -->
                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 bg-white rounded-lg overflow-hidden flex-shrink-0 p-1">
                            <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MKHJ3ref_VW_34FR+watch-case-44-aluminum-silver-nc-se_VW_34FR+watch-face-44-aluminum-silver-se_VW_34FR?wid=1000&hei=1000&fmt=p-jpg&qlt=95&.v=1632171067000%2C1631661319000%2C1631661321000"
                                alt="Apple Watch SE"
                                class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-medium text-gray-900 truncate">Apple Watch SE, 38 mm</h3>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <span class="w-8 text-center text-sm font-medium">1</span>
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                                <span class="text-lg font-bold text-gray-900">$299</span>
                            </div>
                            <div class="flex items-center space-x-3 mt-2 text-xs">
                                <button class="text-gray-500 hover:text-blue-600 flex items-center">
                                    <i class="far fa-heart mr-1"></i>
                                    Move to Favorites
                                </button>
                                <button class="text-red-500 hover:text-red-700 flex items-center">
                                    <i class="fas fa-trash mr-1"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Item 5: Apple iMac -->
                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-16 h-16 bg-white rounded-lg overflow-hidden flex-shrink-0 p-1">
                            <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/imac-24-blue-selection-hero-202104?wid=904&hei=840&fmt=jpeg&qlt=80&.v=1617492405000"
                                alt="Apple iMac"
                                class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-medium text-gray-900 truncate">Apple iMac, 5k, 256GB, Blue</h3>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-minus text-xs"></i>
                                    </button>
                                    <span class="w-8 text-center text-sm font-medium">1</span>
                                    <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100">
                                        <i class="fas fa-plus text-xs"></i>
                                    </button>
                                </div>
                                <span class="text-lg font-bold text-gray-900">$1,799</span>
                            </div>
                            <div class="flex items-center space-x-3 mt-2 text-xs">
                                <button class="text-gray-500 hover:text-blue-600 flex items-center">
                                    <i class="far fa-heart mr-1"></i>
                                    Move to Favorites
                                </button>
                                <button class="text-red-500 hover:text-red-700 flex items-center">
                                    <i class="fas fa-trash mr-1"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Coupon Code -->
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <button class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Add coupon code
                    </button>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="border-t border-gray-200 bg-gray-50 px-4 py-4">
                <div class="space-y-3">
                    <!-- Subtotal -->
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700">Subtotal</span>
                        <span class="text-lg font-bold text-gray-900">$5,992</span>
                    </div>

                    <!-- Savings -->
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-green-600">Savings</span>
                        <span class="text-lg font-bold text-green-600">$0</span>
                    </div>

                    <!-- Store Pickup -->
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700">Store Pickup</span>
                        <span class="text-lg font-bold text-gray-900">$99</span>
                    </div>

                    <!-- Tax -->
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700">Tax</span>
                        <span class="text-lg font-bold text-gray-900">$199</span>
                    </div>

                    <!-- Total -->
                    <div class="border-t border-gray-300 pt-3">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-gray-900">Total</span>
                            <span class="text-2xl font-bold text-gray-900">$6,290</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="border-t border-gray-200 px-4 py-4 bg-white">
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg mb-3 transition-colors flex items-center justify-center">
                    <i class="fas fa-credit-card mr-2"></i>
                    Show shopping cart
                </button>
                <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-lg transition-colors">
                    Continue Shopping
                </button>
            </div>
        </div>
    </div>
</div>