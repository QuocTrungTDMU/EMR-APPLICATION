<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avatar Upload với Crop Modal</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
        <div class="text-center mb-6">
            <div class="relative inline-block" x-data="avatarHandler()" x-ref="avatarContainer">
                <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4 overflow-hidden relative">
                    <template x-if="!previewImage">
                        <span class="text-white font-bold text-2xl" x-text="initial"></span>
                    </template>
                    <img x-show="previewImage" x-ref="avatarImage" :src="previewImage" alt="Avatar Preview" class="w-full h-full object-cover" :style="`transform: scale(${scale}); transition: transform 0.2s;`">
                    <div x-show="previewImage" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
                        <button @click="zoomIn" class="text-white text-xl font-bold mx-2">+</button>
                        <button @click="zoomOut" class="text-white text-xl font-bold mx-2">−</button>
                    </div>
                    <label class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-lg border-2 border-gray-100 hover:border-blue-300 transition-colors cursor-pointer">
                        <input type="file" accept="image/*" @change="handleImageUpload" class="hidden" x-ref="fileInput">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </label>
                </div>

                <template x-if="previewImage">
                    <button @click="openCropModal" class="text-sm text-blue-500 underline mb-2">Chỉnh sửa ảnh</button>
                </template>

                <!-- Modal Crop -->
                <div x-show="showCropModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                    style="display: none;">
                    <div class="bg-white p-4 rounded-lg w-11/12 max-w-md">
                        <div class="relative" style="height: 400px;">
                            <img x-ref="cropImage" class="w-full h-full object-contain" alt="Image to crop">
                            <div class="absolute top-2 right-2 flex gap-2">
                                <button @click="cropImageAndClose" class="bg-blue-500 text-white px-3 py-1 rounded">Cắt</button>
                                <button @click="closeCropModal" class="bg-gray-300 text-black px-3 py-1 rounded">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thông tin user -->
                <h3 class="text-lg font-semibold text-gray-900 mt-2">{{ auth()->user()->name }}</h3>
                <p class="text-sm text-gray-500">Thành viên từ {{ auth()->user()->created_at->format('M Y') }}</p>
            </div>
        </div>
    </div>

    <script>
        function avatarHandler() {
            return {
                initial: '{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}',
                previewImage: null,
                scale: 1,
                maxScale: 2,
                minScale: 0.5,
                showCropModal: false,
                cropper: null,

                handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (!file || !file.type.startsWith('image/')) return;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        if (this.previewImage === e.target.result) return; // Tránh reload cùng ảnh
                        this.previewImage = e.target.result;
                        this.scale = 1;
                    };
                    reader.readAsDataURL(file);
                },

                openCropModal() {
                    if (!this.previewImage) return;
                    this.showCropModal = true;
                    this.$nextTick(() => {
                        this.$refs.cropImage.src = this.previewImage;
                        if (this.cropper) this.cropper.destroy();
                        this.cropper = new Cropper(this.$refs.cropImage, {
                            aspectRatio: 1,
                            viewMode: 1,
                            autoCropArea: 1,
                            responsive: true
                        });
                    });
                },

                cropImageAndClose() {
                    if (!this.cropper) return;
                    const canvas = this.cropper.getCroppedCanvas({
                        width: 240,
                        height: 240,
                    });
                    this.previewImage = canvas.toDataURL('image/png'); // chuyển đổi ra base64 theo anh Nhựt kêu, nhưng nên coi lại đúng chuẩn base64 chưa
                    // console.log('Base64 của ảnh đã crop:', base64Image); // (không lên)
                    this.cropper.destroy();
                    this.cropper = null;
                    this.scale = 1;
                    this.showCropModal = false;
                },

                closeCropModal() {
                    if (this.cropper) {
                        this.cropper.destroy();
                        this.cropper = null;
                    }
                    this.showCropModal = false;
                },

                zoomIn() {
                    this.scale = Math.min(this.scale + 0.1, this.maxScale);
                },

                zoomOut() {
                    this.scale = Math.max(this.scale - 0.1, this.minScale);
                }
            }
        }
    </script>
</body>

</html>