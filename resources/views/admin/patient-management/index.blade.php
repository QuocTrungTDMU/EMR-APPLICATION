@extends('admin.layouts.app')

@section('title', 'Quản lý hồ sơ bệnh nhân')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-800 rounded-t-lg">
                <h2 class="text-xl font-semibold text-white">Quản lý hồ sơ bệnh nhân</h2>
            </div>
            <div class="p-6">
                <!-- Thanh tìm kiếm và bộ lọc -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                    <div class="w-full md:w-1/3">
                        <div class="flex">
                            <input type="text" id="searchInput" placeholder="Tìm theo mã hồ sơ, tên bệnh nhân, số điện thoại"
                                class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button id="filterButton"
                                class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 focus:outline-none">
                                <i class="fas fa-filter"></i> Bộ lọc
                            </button>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3 text-right relative">
                        <button id="displayOptionsButton"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none mr-2">
                            Hiển thị <span id="displayCount" class="font-medium">15</span>/15
                        </button>
                        <button id="sortButton"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none mr-2">
                            <i class="fas fa-sort"></i> Sắp xếp
                        </button>
                        <a href="{{ route('admin.patients.export') }}"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none">
                            <i class="fas fa-download"></i> Xuất Excel
                        </a>

                        <!-- Dropdown cho hiển thị cột -->
                        <div id="displayOptionsDropdown"
                            class="hidden absolute right-0 top-12 bg-white border border-gray-200 rounded-lg shadow-lg p-4 mt-2 z-10 w-80 transition-all duration-300 ease-in-out transform origin-top-right scale-95">
                            <div class="grid grid-cols-2 gap-3">
                                @for ($i = 0; $i < 15; $i++)
                                    <label class="flex items-center text-sm">
                                        <input type="checkbox" class="mr-2 column-toggle" data-column="{{ $i }}" checked>
                                        @switch($i)
                                            @case(0) Mã hồ sơ @break
                                            @case(1) Họ tên @break
                                            @case(2) Năm sinh @break
                                            @case(3) Giới tính @break
                                            @case(4) Nhóm khách hàng @break
                                            @case(5) Nguồn khách hàng @break
                                            @case(6) Số điện thoại @break
                                            @case(7) Email @break
                                            @case(8) Nghề nghiệp @break
                                            @case(9) Địa chỉ @break
                                            @case(10) Tiền sử bệnh @break
                                            @case(11) Lý do khám @break
                                            @case(12) Ghi chú @break
                                            @case(13) Ngày tạo @break
                                            @case(14) Thao tác @break
                                        @endswitch
                                    </label>
                                @endfor
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-200">
                                <button id="applyDisplayOptions"
                                    class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none">
                                    Áp dụng
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Bảng danh sách -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-gray-800">
                            <tr>
                                @foreach(range(0,14) as $i)
                                    <th class="px-4 py-3 text-center column-header" data-column="{{ $i }}">
                                        @switch($i)
                                            @case(0) Mã hồ sơ @break
                                            @case(1) Họ tên @break
                                            @case(2) Năm sinh @break
                                            @case(3) Giới tính @break
                                            @case(4) Nhóm khách hàng @break
                                            @case(5) Nguồn khách hàng @break
                                            @case(6) Điện thoại @break
                                            @case(7) Email @break
                                            @case(8) Nghề nghiệp @break
                                            @case(9) Địa chỉ @break
                                            @case(10) Tiền sử bệnh @break
                                            @case(11) Lý do đến khám @break
                                            @case(12) Ghi chú @break
                                            @case(13) Ngày tạo @break
                                            @case(14) Thao tác @break
                                        @endswitch
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="patientTableBody">
                        @if (isset($filteredPatients) && count($filteredPatients) > 0)
                            @foreach ($filteredPatients as $patient)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-4 py-3 text-center column-data" data-column="0">{{ $patient['id'] }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="1">{{ $patient['name'] }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="2">{{ $patient['birth_year'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="3">{{ $patient['gender'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="4">{{ $patient['customer_group'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="5">{{ $patient['customer_name'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="6">{{ $patient['phone'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="7">{{ $patient['email'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="8">{{ $patient['occupation'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="9">{{ $patient['address'] ?? 'Chưa cập nhật' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="10">{{ $patient['medical_history'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="11">{{ $patient['reason_for_visit'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="12">{{ $patient['notes'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-center column-data" data-column="13">
                                        {{ \Carbon\Carbon::parse($patient['created_at'])->format('d/m/Y') ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3 text-center column-data" data-column="14">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="#" class="text-blue-600 hover:text-blue-800 p-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="text-red-600 hover:text-red-800 p-1" onclick="return confirm('Xác nhận xóa bệnh nhân?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="15" class="px-4 py-3 text-center text-gray-500">Không có dữ liệu bệnh nhân.</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableBody = document.getElementById('patientTableBody');
        const displayCount = document.getElementById('displayCount');
        const displayOptionsButton = document.getElementById('displayOptionsButton');
        const displayOptionsDropdown = document.getElementById('displayOptionsDropdown');
        const applyDisplayOptions = document.getElementById('applyDisplayOptions');
        const columnToggles = document.querySelectorAll('.column-toggle');

        // Cập nhật số lượng checkbox được chọn
        function updateDisplayCount() {
            const checked = document.querySelectorAll('.column-toggle:checked').length;
            displayCount.textContent = checked;
        }

        // Hiện/ẩn các cột theo checkbox
        function toggleColumns() {
            columnToggles.forEach(toggle => {
                const columnIndex = toggle.dataset.column;
                const isChecked = toggle.checked;

                // Header
                document.querySelectorAll(`th[data-column="${columnIndex}"]`).forEach(th => {
                    th.style.display = isChecked ? 'table-cell' : 'none';
                });

                // Data
                document.querySelectorAll(`td[data-column="${columnIndex}"]`).forEach(td => {
                    td.style.display = isChecked ? 'table-cell' : 'none';
                });
            });
        }

        // Toggle dropdown
        displayOptionsButton.addEventListener('click', function (e) {
            e.stopPropagation();
            displayOptionsDropdown.classList.toggle('hidden');
            displayOptionsDropdown.classList.toggle('scale-95');
            displayOptionsDropdown.classList.toggle('scale-100');
        });

        // Ẩn dropdown nếu click ra ngoài
        document.addEventListener('click', function (e) {
            if (!displayOptionsDropdown.contains(e.target) && !displayOptionsButton.contains(e.target)) {
                displayOptionsDropdown.classList.add('hidden');
                displayOptionsDropdown.classList.remove('scale-100');
                displayOptionsDropdown.classList.add('scale-95');
            }
        });

        // Áp dụng thay đổi
        applyDisplayOptions.addEventListener('click', function () {
            toggleColumns();
            displayOptionsDropdown.classList.add('hidden');
            displayOptionsDropdown.classList.remove('scale-100');
            displayOptionsDropdown.classList.add('scale-95');
        });

        // Tự động update khi tick checkbox
        columnToggles.forEach(toggle => {
            toggle.addEventListener('change', function () {
                toggleColumns();
                updateDisplayCount();
            });
        });

        // Tìm kiếm
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = tableBody.getElementsByTagName('tr');

            for (let row of rows) {
                if (row.cells.length > 1) {
                    const cells = row.getElementsByTagName('td');
                    let match = false;
                    for (let cell of cells) {
                        if (cell.style.display !== 'none' && cell.textContent.toLowerCase().includes(searchTerm)) {
                            match = true;
                            break;
                        }
                    }
                    row.style.display = match ? '' : 'none';
                }
            }
        });

        // Khởi tạo: bật hết cột & đếm
        toggleColumns();
        updateDisplayCount();
    });
</script>

