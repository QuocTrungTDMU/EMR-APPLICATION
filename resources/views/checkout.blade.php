@extends('layouts.app')

@section('title', 'Checkout - Medik')

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
    <div class="relative z-10 container mx-auto px-4 py-16 md:py-10">
        <!-- Main Title -->
        <div class="mb-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Checkout</h1>
            <p class="text-xl text-gray-200">Complete your order securely</p>
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
            <a href="{{ url('/cart') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                Cart
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-300">Checkout</span>
        </nav>
    </div>
</section>

<!-- Main Checkout Content -->
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-12">

        <!-- Checkout Progress Steps -->
        <div class="mb-8">
            <div class="flex items-center justify-center space-x-4 md:space-x-8">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">
                        <i class="fas fa-check"></i>
                        1
                    </div>
                    <span class="ml-2 text-green-600 font-medium">Cart</span>
                </div>

                <div class="flex-1 h-1 bg-green-200 max-w-20"></div>

                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                        2
                    </div>
                    <span class="ml-2 text-blue-600 font-medium">Checkout</span>
                </div>

                <div class="flex-1 h-1 bg-gray-300 max-w-20"></div>

                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        3
                    </div>
                    <span class="ml-2 text-gray-500 font-medium">Complete</span>
                </div>
            </div>
        </div>

        <form class="checkout-form" action="{{ url('/process-order') }}" method="POST" id="checkout-form">
            @csrf

            <div class="grid lg:grid-cols-3 gap-8">

                <!-- Billing & Shipping Information -->
                <div class="lg:col-span-2 space-y-8">

                    <!-- Customer Information -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-user mr-3"></i>
                                Customer Information
                            </h3>
                        </div>

                        <div class="p-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="first_name" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="last_name" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-gray-700 font-medium mb-2">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-gray-700 font-medium mb-2">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" name="phone" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Address -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-map-marker-alt mr-3"></i>
                                Billing Address
                            </h3>
                        </div>

                        <div class="p-6">
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        Country / Region <span class="text-red-500">*</span>
                                    </label>
                                    <select name="country" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                        <option value="">Select a country</option>
                                        <option value="IN" selected>India</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">
                                        Street Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="address_line_1" required
                                        placeholder="House number and street name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors mb-3">
                                    <input type="text" name="address_line_2"
                                        placeholder="Apartment, suite, unit etc. (optional)"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                </div>

                                <div class="grid md:grid-cols-3 gap-6">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            Town / City <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="city" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            State <span class="text-red-500">*</span>
                                        </label>
                                        <select name="state" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                            <option value="">Select a state</option>
                                            <option value="TN">Tamil Nadu</option>
                                            <option value="KA">Karnataka</option>
                                            <option value="AP">Andhra Pradesh</option>
                                            <option value="KE">Kerala</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-gray-700 font-medium mb-2">
                                            Postcode / ZIP <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="postcode" required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Options -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-truck mr-3"></i>
                                Shipping Method
                            </h3>
                        </div>

                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition-colors cursor-pointer">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="shipping_method" value="standard" class="mr-4 text-blue-600 focus:ring-blue-500" checked>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h4 class="font-medium text-gray-900">Standard Delivery</h4>
                                                    <p class="text-sm text-gray-600">5-7 business days</p>
                                                </div>
                                                <span class="text-lg font-semibold text-gray-900">₹20.00</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition-colors cursor-pointer">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="shipping_method" value="express" class="mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h4 class="font-medium text-gray-900">Express Delivery</h4>
                                                    <p class="text-sm text-gray-600">2-3 business days</p>
                                                </div>
                                                <span class="text-lg font-semibold text-gray-900">₹50.00</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition-colors cursor-pointer">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="shipping_method" value="overnight" class="mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h4 class="font-medium text-gray-900">Overnight Delivery</h4>
                                                    <p class="text-sm text-gray-600">Next business day</p>
                                                </div>
                                                <span class="text-lg font-semibold text-gray-900">₹100.00</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-credit-card mr-3"></i>
                                Payment Method
                            </h3>
                        </div>

                        <div class="p-6">
                            <div class="space-y-4">

                                <!-- Credit Card -->
                                <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition-colors">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="payment_method" value="credit_card" class="mr-4 text-blue-600 focus:ring-blue-500" checked>
                                        <div class="flex items-center">
                                            <i class="fas fa-credit-card text-blue-600 mr-3"></i>
                                            <span class="font-medium text-gray-900">Credit / Debit Card</span>
                                        </div>
                                    </label>

                                    <div class="mt-4 pl-8 credit-card-fields">
                                        <div class="grid md:grid-cols-2 gap-4">
                                            <div class="md:col-span-2">
                                                <label class="block text-gray-700 font-medium mb-2">Card Number</label>
                                                <input type="text" name="card_number" placeholder="1234 5678 9012 3456"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-medium mb-2">Expiry Date</label>
                                                <input type="text" name="expiry_date" placeholder="MM/YY"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                            </div>

                                            <div>
                                                <label class="block text-gray-700 font-medium mb-2">CVV</label>
                                                <input type="text" name="cvv" placeholder="123"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- PayPal -->
                                <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition-colors">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="payment_method" value="paypal" class="mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex items-center">
                                            <i class="fab fa-paypal text-blue-500 mr-3 text-xl"></i>
                                            <span class="font-medium text-gray-900">PayPal</span>
                                        </div>
                                    </label>
                                </div>

                                <!-- Cash on Delivery -->
                                <div class="border border-gray-200 rounded-lg p-4 hover:border-blue-500 transition-colors">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="payment_method" value="cod" class="mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex items-center">
                                            <i class="fas fa-money-bill-wave text-green-600 mr-3"></i>
                                            <span class="font-medium text-gray-900">Cash on Delivery</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Notes -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-500 to-gray-600 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-sticky-note mr-3"></i>
                                Order Notes (Optional)
                            </h3>
                        </div>

                        <div class="p-6">
                            <textarea name="order_notes" rows="4"
                                placeholder="Notes about your order, e.g. special notes for delivery."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-6">

                        <!-- Order Summary Header -->
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                            <h3 class="text-xl font-semibold text-white flex items-center">
                                <i class="fas fa-receipt mr-3"></i>
                                Order Summary
                            </h3>
                        </div>

                        <div class="p-6">

                            <!-- Order Items -->
                            <div class="space-y-4 mb-6">
                                <div class="flex items-center space-x-3 pb-3 border-b border-gray-200">
                                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/5-16-1000x1000.jpg"
                                        alt="Facial Tissue"
                                        class="w-16 h-16 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-900 text-sm">Facial Tissue</h4>
                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                    </div>
                                    <span class="font-semibold text-gray-900">₹200.00</span>
                                </div>

                                <div class="flex items-center space-x-3 pb-3 border-b border-gray-200">
                                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/shop-4-10-1000x1000.jpg"
                                        alt="Vitamin D3"
                                        class="w-16 h-16 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-900 text-sm">Vitamin D3</h4>
                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                    </div>
                                    <span class="font-semibold text-gray-900">₹40.00</span>
                                </div>

                                <div class="flex items-center space-x-3 pb-3 border-b border-gray-200">
                                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/shop-5-1-1000x1000.jpg"
                                        alt="N95 Face Mask"
                                        class="w-16 h-16 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-900 text-sm">N95 Face Mask</h4>
                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                    </div>
                                    <span class="font-semibold text-gray-900">₹55.00</span>
                                </div>
                            </div>

                            <!-- Order Totals -->
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700">Subtotal:</span>
                                    <span class="font-semibold text-gray-900">₹295.00</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700">Shipping:</span>
                                    <span class="font-semibold text-gray-900 shipping-cost">₹20.00</span>
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="text-gray-700">Tax:</span>
                                    <span class="font-semibold text-gray-900">₹31.50</span>
                                </div>

                                <hr class="border-gray-300">

                                <div class="flex items-center justify-between text-lg">
                                    <span class="font-bold text-gray-900">Total:</span>
                                    <span class="font-bold text-green-600 order-total">₹346.50</span>
                                </div>
                            </div>

                            <!-- Coupon Code -->
                            <div class="mb-6">
                                <div class="flex space-x-2">
                                    <input type="text" placeholder="Coupon code"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                    <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                        Apply
                                    </button>
                                </div>
                            </div>

                            <!-- Place Order Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-lg text-center transition-all duration-200 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-lock mr-2"></i>
                                Place Order
                            </button>

                            <!-- Security Info -->
                            <div class="mt-4 text-center text-xs text-gray-500">
                                <div class="flex items-center justify-center space-x-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-shield-alt mr-1 text-green-500"></i>
                                        <span>SSL Secured</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-lock mr-1 text-blue-500"></i>
                                        <span>Safe Payment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Update shipping cost based on selected method
        const shippingRadios = document.querySelectorAll('input[name="shipping_method"]');
        const shippingCostElement = document.querySelector('.shipping-cost');
        const orderTotalElement = document.querySelector('.order-total');

        shippingRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                let shippingCost = 0;
                switch (this.value) {
                    case 'standard':
                        shippingCost = 20;
                        break;
                    case 'express':
                        shippingCost = 50;
                        break;
                    case 'overnight':
                        shippingCost = 100;
                        break;
                }

                shippingCostElement.textContent = `₹${shippingCost.toFixed(2)}`;

                // Recalculate total
                const subtotal = 295;
                const tax = 31.50;
                const total = subtotal + shippingCost + tax;
                orderTotalElement.textContent = `₹${total.toFixed(2)}`;
            });
        });

        // Payment method toggle
        const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
        const creditCardFields = document.querySelector('.credit-card-fields');

        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'credit_card') {
                    creditCardFields.style.display = 'block';
                    // Make card fields required
                    creditCardFields.querySelectorAll('input').forEach(input => {
                        input.setAttribute('required', 'required');
                    });
                } else {
                    creditCardFields.style.display = 'none';
                    // Remove required from card fields
                    creditCardFields.querySelectorAll('input').forEach(input => {
                        input.removeAttribute('required');
                    });
                }
            });
        });

        // Form validation
        const checkoutForm = document.getElementById('checkout-form');
        checkoutForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Basic form validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                    field.classList.remove('border-gray-300');
                } else {
                    field.classList.remove('border-red-500');
                    field.classList.add('border-gray-300');
                }
            });

            if (isValid) {
                // Show loading state
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
                submitButton.disabled = true;

                // Simulate API call
                setTimeout(() => {
                    // Redirect to success page
                    window.location.href = '{{ url("/order-success") }}';
                }, 2000);
            } else {
                // Show error message
                showNotification('Please fill in all required fields', 'error');
            }
        });

        // Input formatting
        const cardNumberInput = document.querySelector('input[name="card_number"]');
        if (cardNumberInput) {
            cardNumberInput.addEventListener('input', function() {
                // Format card number with spaces
                let value = this.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
                let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
                if (formattedValue.length > 19) formattedValue = formattedValue.substring(0, 19);
                this.value = formattedValue;
            });
        }

        const expiryInput = document.querySelector('input[name="expiry_date"]');
        if (expiryInput) {
            expiryInput.addEventListener('input', function() {
                // Format expiry date MM/YY
                let value = this.value.replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                this.value = value;
            });
        }
    });

    // Show notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transform translate-x-full transition-transform duration-300 ${
        type === 'success' ? 'bg-green-500' : 
        type === 'error' ? 'bg-red-500' : 'bg-blue-500'
    }`;
        notification.innerHTML = `
        <div class="flex items-center space-x-2">
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
</script>
@endpush

@push('styles')
<style>
    .credit-card-fields {
        display: block;
    }

    input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .checkout-form input[type="radio"]:checked+div {
        color: #2563eb;
    }

    .checkout-form .border-red-500 {
        animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        75% {
            transform: translateX(5px);
        }
    }

    /* Custom radio button styling */
    input[type="radio"] {
        width: 1.25rem;
        height: 1.25rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .checkout-form .grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush