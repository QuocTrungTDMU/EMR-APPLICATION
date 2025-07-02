@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row h-[80vh]" x-data="mapPage()" x-init="init()">
    <!-- Danh sách bên trái -->
    <div class="w-full md:w-1/3 bg-white shadow-lg z-10 overflow-y-auto p-4">
        <input type="text" placeholder="Tìm kiếm..." class="w-full mb-4 px-3 py-2 border rounded" x-model="search">
        <template x-for="(loc, idx) in filteredLocations()" :key="idx">
            <div
                class="p-3 mb-2 rounded-lg cursor-pointer hover:bg-blue-100 transition"
                @mouseenter="focusMarker(idx)"
                @mouseleave="unfocusMarker(idx)"
                @click="panToMarker(idx)"
            >
                <div class="font-bold" x-text="loc.name"></div>
                <div class="text-sm text-gray-600" x-text="loc.address"></div>
                <span class="inline-block mt-1 px-2 py-1 text-xs rounded bg-blue-200 text-blue-800" x-text="loc.type === 'hospital' ? 'Bệnh viện' : 'Nhà thuốc'"></span>
            </div>
        </template>
    </div>
    <!-- Bản đồ bên phải -->
    <div class="flex-1 relative">
        <div id="map" class="absolute inset-0 rounded-lg shadow"></div>
    </div>
</div>

<!-- Leaflet CSS/JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>

<script>
function mapPage() {
    return {
        locations: @json($locations),
        search: '',
        map: null,
        markers: [],
        filteredLocations() {
            if (!this.search) return this.locations;
            return this.locations.filter(loc =>
                loc.name.toLowerCase().includes(this.search.toLowerCase()) ||
                loc.address.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        init() {
            this.map = L.map('map').setView([10.762622, 106.660172], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(this.map);
            this.locations.forEach((loc, idx) => {
                const marker = L.marker([loc.lat, loc.lng]).addTo(this.map)
                    .bindPopup(`<b>${loc.name}</b><br>${loc.address}`);
                this.markers.push(marker);
            });
        },
        focusMarker(idx) {
            this.markers[idx].openPopup();
            this.map.setView(this.markers[idx].getLatLng(), 15, { animate: true });
        },
        unfocusMarker(idx) {
            this.markers[idx].closePopup();
        },
        panToMarker(idx) {
            this.map.setView(this.markers[idx].getLatLng(), 17, { animate: true });
            this.markers[idx].openPopup();
        }
    }
}
</script>
@endsection 