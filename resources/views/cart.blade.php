@extends('layouts.app')

@section('title', 'Cart - Medik')

@section('content')

<!-- Hero Section -->
<section class="relative text-center">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed"
        style="background-image: url('http://medik.wpenginepowered.com/wp-content/uploads/2020/02/breadcrumb-bg.jpg');">
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50" style="opacity: 0.5;"></div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4 py-16 md:py-24">
        <!-- Main Title -->
        <div class="mb-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Shopping Cart</h1>
            <p class="text-xl text-gray-200">Review your items before checkout</p>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center justify-center space-x-2 text-white" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                <i class="fas fa-home mr-1"></i>
                Home
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-300">Cart</span>
        </nav>
    </div>
</section>

<!-- Main Cart Content -->
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-12">

        <!-- Cart Content -->
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Cart Items Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                    <!-- Cart Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            Your Cart (3 items)
                        </h2>
                    </div>

                    <!-- Cart Form -->
                    <form class="woocommerce-cart-form" action="{{ url('/cart') }}" method="post">
                        @csrf

                        <!-- Desktop Cart Table -->
                        <div class="hidden md:block">
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b">
                                    <tr>
                                        <th class="text-left py-4 px-6 font-medium text-gray-700">Product</th>
                                        <th class="text-center py-4 px-4 font-medium text-gray-700">Price</th>
                                        <th class="text-center py-4 px-4 font-medium text-gray-700">Quantity</th>
                                        <th class="text-center py-4 px-4 font-medium text-gray-700">Total</th>
                                        <th class="text-center py-4 px-4 font-medium text-gray-700">Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">

                                    <!-- Cart Item 1 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-6 px-6">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/5-16-1000x1000.jpg"
                                                        alt="Facial Tissue"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <h3 class="font-medium text-gray-900">
                                                        <a href="{{ url('/product/facial-tissue') }}" class="hover:text-blue-600 transition-colors">
                                                            Facial Tissue
                                                        </a>
                                                    </h3>
                                                    <p class="text-sm text-gray-500 mt-1">Soft & Strong</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <span class="text-lg font-semibold text-gray-900">₹200.00</span>
                                        </td>
                                        <td class="py-6 px-4">
                                            <div class="flex items-center justify-center">
                                                <div class="flex items-center border border-gray-300 rounded-lg">
                                                    <button type="button" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-l-lg transition-colors">
                                                        <i class="fas fa-minus text-sm"></i>
                                                    </button>
                                                    <input type="number" value="1" min="0" max="99"
                                                        class="w-16 h-10 text-center border-0 focus:ring-0 focus:outline-none">
                                                    <button type="button" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-r-lg transition-colors">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <span class="text-lg font-bold text-blue-600">₹200.00</span>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <button type="button" class="text-red-500 hover:text-red-700 p-2 rounded-full hover:bg-red-50 transition-colors">
                                                <i class="fas fa-trash text-lg"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Cart Item 2 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-6 px-6">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/shop-4-10-1000x1000.jpg"
                                                        alt="Vitamin D3"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <h3 class="font-medium text-gray-900">
                                                        <a href="{{ url('/product/vitamin-d3') }}" class="hover:text-blue-600 transition-colors">
                                                            Vitamin D3
                                                        </a>
                                                    </h3>
                                                    <p class="text-sm text-gray-500 mt-1">1000 IU</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <span class="text-lg font-semibold text-gray-900">₹40.00</span>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <span class="text-gray-600 font-medium">1</span>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <span class="text-lg font-bold text-blue-600">₹40.00</span>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <button type="button"
                                                onclick="removeCartItem(this)"
                                                data-product-id="facial-tissue"
                                                class="text-red-500 hover:text-red-700 hover:bg-red-50 p-3 rounded-full transition-all duration-200 group">
                                                <i class="fas fa-trash text-lg group-hover:scale-110 transition-transform"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Cart Item 3 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-6 px-6">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/shop-5-1-1000x1000.jpg"
                                                        alt="N95 Face Mask"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <h3 class="font-medium text-gray-900">
                                                        <a href="{{ url('/product/n95-face-mask') }}" class="hover:text-blue-600 transition-colors">
                                                            N95 Face Mask
                                                        </a>
                                                    </h3>
                                                    <p class="text-sm text-gray-500 mt-1">Pack of 10</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <span class="text-lg font-semibold text-gray-900">₹55.00</span>
                                        </td>
                                        <td class="py-6 px-4">
                                            <div class="flex items-center justify-center">
                                                <div class="flex items-center border border-gray-300 rounded-lg">
                                                    <button type="button" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-l-lg transition-colors">
                                                        <i class="fas fa-minus text-sm"></i>
                                                    </button>
                                                    <input type="number" value="1" min="0" max="99"
                                                        class="w-16 h-10 text-center border-0 focus:ring-0 focus:outline-none">
                                                    <button type="button" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-r-lg transition-colors">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <span class="text-lg font-bold text-blue-600">₹55.00</span>
                                        </td>
                                        <td class="py-6 px-4 text-center">
                                            <button type="button" class="text-red-500 hover:text-red-700 p-2 rounded-full hover:bg-red-50 transition-colors">
                                                <i class="fas fa-trash text-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Mobile Cart Items -->
                        <div class="md:hidden divide-y divide-gray-200">
                            <!-- Mobile Item 1 -->
                            <div class="p-6">
                                <div class="flex space-x-4">
                                    <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/5-16-1000x1000.jpg"
                                            alt="Facial Tissue"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-900 mb-1">Facial Tissue</h3>
                                        <p class="text-sm text-gray-500 mb-2">Soft & Strong</p>
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-lg font-bold text-blue-600">₹200.00</span>
                                            <button type="button" class="text-red-500 hover:text-red-700 p-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="flex items-center border border-gray-300 rounded-lg w-32">
                                            <button type="button" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-l-lg transition-colors">
                                                <i class="fas fa-minus text-sm"></i>
                                            </button>
                                            <input type="number" value="1" min="0" max="99"
                                                class="w-12 h-10 text-center border-0 focus:ring-0 focus:outline-none">
                                            <button type="button" class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-r-lg transition-colors">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add more mobile items similarly -->
                        </div>

                        <!-- Cart Actions -->
                        <div class="p-6 bg-gray-50 border-t">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                                <!-- Coupon -->
                                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
                                    <input type="text" placeholder="Coupon code"
                                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                                        Apply Coupon
                                    </button>
                                </div>

                                <!-- Update Cart -->
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg font-medium transition-colors">
                                    Update Cart
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Cart Totals Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-6">

                    <!-- Totals Header -->
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-4">
                        <h3 class="text-xl font-semibold text-white flex items-center">
                            <i class="fas fa-calculator mr-3"></i>
                            Cart Totals
                        </h3>
                    </div>

                    <div class="p-6">
                        <!-- Subtotal -->
                        <div class="flex items-center justify-between py-3 border-b border-gray-200">
                            <span class="text-gray-700 font-medium">Subtotal:</span>
                            <span class="text-lg font-semibold text-gray-900">₹295.00</span>
                        </div>

                        <!-- Shipping -->
                        <div class="py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-gray-700 font-medium">Shipping:</span>
                                <span class="text-gray-900 font-semibold">₹20.00</span>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Shipping to <strong>Tamil Nadu</strong>
                            </div>

                            <!-- Shipping Calculator -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <button type="button" class="text-blue-600 hover:text-blue-800 text-sm font-medium mb-3 flex items-center">
                                    <i class="fas fa-edit mr-2"></i>
                                    Change address
                                </button>
                                <div class="hidden" id="shipping-calculator">
                                    <div class="space-y-3">
                                        <select class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                            <option>Select country</option>
                                            <option selected>India</option>
                                        </select>
                                        <select class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                            <option>Select state</option>
                                            <option selected>Tamil Nadu</option>
                                        </select>
                                        <input type="text" placeholder="City"
                                            class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                        <input type="text" placeholder="Postcode"
                                            class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                        <button type="button" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-medium text-sm transition-colors">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="flex items-center justify-between py-4 border-b border-gray-200">
                            <span class="text-lg font-bold text-gray-900">Total:</span>
                            <span class="text-2xl font-bold text-green-600">₹315.00</span>
                        </div>

                        <!-- Checkout Button -->
                        <div class="pt-6">
                            <a href="{{ url('/checkout') }}"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-6 rounded-lg text-center block transition-all duration-200 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-lock mr-2"></i>
                                Proceed to Checkout
                            </a>
                        </div>

                        <!-- Security Badges -->
                        <div class="pt-4 border-t border-gray-200 mt-6">
                            <div class="flex items-center justify-center space-x-4 text-xs text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-shield-alt mr-1 text-green-500"></i>
                                    <span>Secure</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-truck mr-1 text-blue-500"></i>
                                    <span>Fast Delivery</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-undo mr-1 text-purple-500"></i>
                                    <span>Easy Returns</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cross-sells Section -->
        <div class="mt-16">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                    <h3 class="text-xl font-semibold text-white flex items-center">
                        <i class="fas fa-heart mr-3"></i>
                        You may be interested in…
                    </h3>
                </div>

                <div class="p-6">
                    <div class="grid md:grid-cols-3 gap-6">

                        <!-- Product 1 -->
                        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="aspect-square bg-white rounded-lg overflow-hidden mb-4">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/product-8-1000x1000.jpg"
                                    alt="Ear Thermometer"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform">
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Ear Thermometer</h4>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-blue-600">₹777.00</span>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded text-sm font-medium transition-colors">
                                    Add to Cart
                                </button>
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded text-sm transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="aspect-square bg-white rounded-lg overflow-hidden mb-4 relative">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/product-10-1000x1000.jpg"
                                    alt="Operation Scissors"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform">
                                <span class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded">
                                    Out of Stock
                                </span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Operation Scissors</h4>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-blue-600">₹55.00</span>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button disabled class="flex-1 bg-gray-400 text-white py-2 px-3 rounded text-sm font-medium cursor-not-allowed">
                                    Out of Stock
                                </button>
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded text-sm transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="aspect-square bg-white rounded-lg overflow-hidden mb-4">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-1000x1000.jpg"
                                    alt="Vitamin C Tablet"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform">
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Vitamin C Tablet</h4>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-lg font-bold text-blue-600">₹60.00</span>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded text-sm font-medium transition-colors">
                                    Add to Cart
                                </button>
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded text-sm transition-colors">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Quantity controls
    document.addEventListener('DOMContentLoaded', function() {
        // Plus/Minus buttons
        const minusButtons = document.querySelectorAll('.fas.fa-minus').map(icon => icon.parentElement);
        const plusButtons = document.querySelectorAll('.fas.fa-plus').map(icon => icon.parentElement);

        minusButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.nextElementSibling;
                const currentValue = parseInt(input.value);
                if (currentValue > 0) {
                    input.value = currentValue - 1;
                    updateRowTotal(input.closest('tr'));
                }
            });
        });

        plusButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const currentValue = parseInt(input.value);
                input.value = currentValue + 1;
                updateRowTotal(input.closest('tr'));
            });
        });

        // Shipping calculator toggle
        const changeAddressBtn = document.querySelector('.shipping-calculator-button');
        const shippingCalculator = document.getElementById('shipping-calculator');

        if (changeAddressBtn && shippingCalculator) {
            changeAddressBtn.addEventListener('click', function(e) {
                e.preventDefault();
                shippingCalculator.classList.toggle('hidden');
            });
        }
    });

    function updateRowTotal(row) {
        const price = parseFloat(row.querySelector('[data-price]').dataset.price);
        const quantity = parseInt(row.querySelector('input[type="number"]').value);
        const total = price * quantity;

        row.querySelector('.row-total').textContent = '₹' + total.toFixed(2);
        updateCartTotals();
    }

    function updateCartTotals() {
        // Calculate and update cart totals
        let subtotal = 0;
        document.querySelectorAll('.row-total').forEach(element => {
            subtotal += parseFloat(element.textContent.replace('₹', ''));
        });

        const shipping = 20;
        const total = subtotal + shipping;

        document.querySelector('.cart-subtotal').textContent = '₹' + subtotal.toFixed(2);
        document.querySelector('.cart-total').textContent = '₹' + total.toFixed(2);
    }
</script>
@endpush

@push('styles')
<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Custom scrollbar for mobile */
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }

    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>
@endpush