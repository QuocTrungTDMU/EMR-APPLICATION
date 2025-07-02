/**
 * Medik Notification System - Complete Version
 */

(function () {
    "use strict";

    // Đảm bảo chỉ chạy một lần
    if (window.medikNotificationsLoaded) {
        return;
    }
    window.medikNotificationsLoaded = true;

    console.log("Notifications.js loading...");

    class MedikNotificationSystem {
        constructor() {
            this.apiBase = "/api/notifications";
            this.notifications = [];
            this.unreadCount = 0;
            this.currentNotificationId = null;
            this.init();
        }

        async init() {
            console.log("Initializing notification system...");

            // Đợi DOM load xong
            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", () => {
                    this.setupSystem();
                });
            } else {
                this.setupSystem();
            }
        }

        async setupSystem() {
            try {
                // Setup modal events first
                this.setupModalEvents();

                // Load notifications
                await this.loadNotifications();

                // Setup dropdown
                this.setupDropdown();

                // Setup toast system
                this.setupToastSystem();

                console.log("✅ Notification system initialized successfully");
            } catch (error) {
                console.error("❌ Failed to setup notification system:", error);
            }
        }

        // === API METHODS ===

        async loadNotifications() {
            try {
                console.log("📡 Loading notifications from API...");

                const response = await fetch(`${this.apiBase}?limit=10`, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": this.getCsrfToken(),
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    credentials: "include",
                });

                if (!response.ok) {
                    throw new Error(
                        `HTTP ${response.status}: ${response.statusText}`
                    );
                }

                const data = await response.json();
                console.log("📡 API Response:", data);

                if (data.success) {
                    this.notifications = data.data || [];
                    this.unreadCount = data.unread_count || 0;
                    this.renderNotifications();
                    this.updateBadges();
                    console.log("✅ Notifications loaded successfully");
                } else {
                    console.error("❌ API Error:", data.message);
                    this.showEmptyState();
                }
            } catch (error) {
                console.error(
                    "❌ Failed to load notifications:",
                    error.message
                );
                this.showEmptyState();
            }
        }

        async loadNotificationDetail(notificationId) {
            try {
                console.log("📖 Loading notification detail:", notificationId);

                const response = await fetch(
                    `${this.apiBase}/${notificationId}`,
                    {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": this.getCsrfToken(),
                            "X-Requested-With": "XMLHttpRequest",
                        },
                        credentials: "include",
                    }
                );

                if (!response.ok) {
                    throw new Error(
                        `HTTP ${response.status}: ${response.statusText}`
                    );
                }

                const data = await response.json();
                console.log("📖 Notification detail loaded:", data);

                if (data.success) {
                    return data.data;
                } else {
                    throw new Error(
                        data.message || "Failed to load notification detail"
                    );
                }
            } catch (error) {
                console.error("❌ Failed to load notification detail:", error);
                throw error;
            }
        }

        async markNotificationAsRead(notificationId) {
            try {
                console.log("✅ Marking notification as read:", notificationId);

                const response = await fetch(
                    `${this.apiBase}/${notificationId}/read`,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": this.getCsrfToken(),
                            "X-Requested-With": "XMLHttpRequest",
                        },
                        credentials: "include",
                    }
                );

                if (!response.ok) {
                    throw new Error(
                        `HTTP ${response.status}: ${response.statusText}`
                    );
                }

                const data = await response.json();

                if (data.success) {
                    console.log("✅ Notification marked as read successfully");
                    // Reload notifications to update UI
                    await this.loadNotifications();
                    return data.data;
                } else {
                    throw new Error(
                        data.message || "Failed to mark notification as read"
                    );
                }
            } catch (error) {
                console.error("❌ Failed to mark notification as read:", error);
                throw error;
            }
        }

        async markAllAsRead() {
            try {
                console.log("✅ Marking all notifications as read...");

                const response = await fetch(`${this.apiBase}/mark-all-read`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": this.getCsrfToken(),
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    credentials: "include",
                });

                if (!response.ok) {
                    throw new Error(
                        `HTTP ${response.status}: ${response.statusText}`
                    );
                }

                const data = await response.json();

                if (data.success) {
                    console.log(
                        "✅ All notifications marked as read successfully"
                    );

                    // Update local state
                    this.notifications = this.notifications.map((n) => ({
                        ...n,
                        is_read: true,
                        read_at: new Date().toISOString(),
                        icon_class: "bg-green-500",
                        title_class: "font-normal",
                    }));
                    this.unreadCount = 0;

                    // Update UI
                    this.renderNotifications();
                    this.updateBadges();

                    this.showToast(
                        "success",
                        "Thành công",
                        `Đã đánh dấu ${
                            data.data.updated_count || "tất cả"
                        } thông báo là đã đọc`
                    );
                    return data.data;
                } else {
                    throw new Error(
                        data.message ||
                            "Failed to mark all notifications as read"
                    );
                }
            } catch (error) {
                console.error(
                    "❌ Failed to mark all notifications as read:",
                    error
                );
                this.showToast(
                    "error",
                    "Lỗi",
                    "Không thể đánh dấu tất cả thông báo là đã đọc"
                );
                throw error;
            }
        }

        async deleteNotificationAPI(notificationId) {
            try {
                console.log("🗑️ Deleting notification:", notificationId);

                const response = await fetch(
                    `${this.apiBase}/${notificationId}`,
                    {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": this.getCsrfToken(),
                            "X-Requested-With": "XMLHttpRequest",
                        },
                        credentials: "include",
                    }
                );

                if (!response.ok) {
                    throw new Error(
                        `HTTP ${response.status}: ${response.statusText}`
                    );
                }

                const data = await response.json();

                if (data.success) {
                    console.log("✅ Notification deleted successfully");

                    // Update local state
                    this.notifications = this.notifications.filter(
                        (n) => n.id != notificationId
                    );
                    this.unreadCount = this.notifications.filter(
                        (n) => !n.is_read
                    ).length;

                    // Update UI
                    this.renderNotifications();
                    this.updateBadges();

                    this.showToast("success", "Thành công", "Đã xóa thông báo");
                    return true;
                } else {
                    throw new Error(
                        data.message || "Failed to delete notification"
                    );
                }
            } catch (error) {
                console.error("❌ Failed to delete notification:", error);
                this.showToast("error", "Lỗi", "Không thể xóa thông báo");
                throw error;
            }
        }

        // === UI SETUP METHODS ===

        setupDropdown() {
            const notificationBtn = document.getElementById("notificationBtn");
            const notificationDropdown = document.getElementById(
                "notificationDropdown"
            );

            if (!notificationBtn || !notificationDropdown) {
                console.log("⚠️ Notification elements not found:", {
                    btn: !!notificationBtn,
                    dropdown: !!notificationDropdown,
                });
                return;
            }

            console.log("🔧 Setting up notification dropdown...");

            // Xóa event listeners cũ bằng cách clone node
            const newBtn = notificationBtn.cloneNode(true);
            notificationBtn.parentNode.replaceChild(newBtn, notificationBtn);

            // Toggle dropdown
            if (notificationDropdown)
                notificationDropdown.classList.toggle("hidden");
            newBtn.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();

                console.log("🔔 Notification button clicked");
                if (notificationDropdown)
                    notificationDropdown.classList.toggle("hidden");
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", (e) => {
                if (
                    !newBtn.contains(e.target) &&
                    !notificationDropdown.contains(e.target)
                ) {
                    if (notificationDropdown)
                        notificationDropdown.classList.add("hidden");
                }
            });

            // Mark all as read button
            const markAllReadBtn =
                notificationDropdown.querySelector("#markAllReadBtn");
            if (markAllReadBtn) {
                markAllReadBtn.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    this.markAllAsRead();
                });
            }

            console.log("✅ Notification dropdown setup complete");
        }

        setupModalEvents() {
            // Close modal events
            const closeButtons = document.querySelectorAll(
                "#closeModalBtn, #closeModalFooterBtn"
            );
            closeButtons.forEach((btn) => {
                btn?.addEventListener("click", () => this.closeModal());
            });

            // Close modal when clicking outside
            const modal = document.getElementById("notificationModal");
            modal?.addEventListener("click", (e) => {
                if (e.target === modal) {
                    this.closeModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener("keydown", (e) => {
                if (e.key === "Escape") {
                    this.closeModal();
                }
            });

            console.log("✅ Modal events setup complete");
        }

        setupToastSystem() {
            console.log("✅ Toast system setup complete");
        }

        // === UI RENDER METHODS ===

        renderNotifications() {
            const container = document.getElementById("notificationsList");
            if (!container) {
                console.log("⚠️ Notifications list container not found");
                return;
            }

            if (this.notifications.length === 0) {
                this.showEmptyState();
                return;
            }

            console.log(
                `🎨 Rendering ${this.notifications.length} notifications`
            );

            container.innerHTML = this.notifications
                .map(
                    (notification) => `
                <div class="px-6 py-4 border-b border-gray-100 hover:bg-blue-50 transition-colors notification-item cursor-pointer" 
                     data-id="${notification.id}"
                     onclick="window.notificationSystem.viewDetail(${
                         notification.id
                     })">
                    <div class="text-xs text-gray-500 font-medium mb-2">${
                        notification.formatedCreatedDate || ""
                    }</div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 ${
                                notification.is_read
                                    ? "bg-green-100"
                                    : "bg-red-100"
                            } rounded-full flex items-center justify-center">
                                <div class="w-2 h-2 ${
                                    notification.icon_class || "bg-blue-500"
                                } rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm ${
                                notification.title_class || "font-normal"
                            } text-gray-900 mb-1">${notification.title}</h4>
                            <p class="text-sm text-gray-600 mb-2 line-clamp-2">${
                                notification.body
                            }</p>
                            <div class="flex space-x-2">
                                <span class="text-xs text-blue-600 font-medium">
                                    Xem chi tiết →
                                </span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="w-2 h-2 ${
                                notification.icon_class || "bg-blue-500"
                            } rounded-full"></div>
                        </div>
                    </div>
                </div>
            `
                )
                .join("");

            console.log("✅ Notifications rendered successfully");
        }

        showEmptyState() {
            const container = document.getElementById("notificationsList");
            if (!container) return;

            container.innerHTML = `
                <div class="px-6 py-8 text-center">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4 3h16a1 1 0 011 1v10a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1z" />
                    </svg>
                    <p class="text-gray-500 text-sm">Không có thông báo</p>
                </div>
            `;
        }

        updateBadges() {
            console.log("🏷️ Updating badges with count:", this.unreadCount);

            const badges = document.querySelectorAll(
                "#notificationBadge, #headerBadge"
            );
            badges.forEach((badge) => {
                if (this.unreadCount > 0) {
                    badge.textContent = this.unreadCount;
                    badge.classList.remove("hidden");
                } else {
                    badge.classList.add("hidden");
                }
            });
        }

        // === MODAL METHODS ===

        async viewDetail(notificationId) {
            console.log("📖 Viewing notification detail:", notificationId);

            const modal = document.getElementById("notificationModal");
            const loading = document.getElementById("modalLoading");
            const content = document.getElementById("modalContent");
            const error = document.getElementById("modalError");

            if (!modal) {
                console.error("❌ Modal not found!");
                return;
            }

            // Store current notification ID
            this.currentNotificationId = notificationId;

            // Show modal
            modal.classList.remove("hidden");

            // Show loading state
            loading?.classList.remove("hidden");
            content?.classList.add("hidden");
            error?.classList.add("hidden");

            try {
                const notification = await this.loadNotificationDetail(
                    notificationId
                );
                this.displayNotificationDetail(notification);
            } catch (err) {
                console.error("❌ Failed to load notification detail:", err);
                this.showModalError();
            }
        }

        displayNotificationDetail(notification) {
            const loading = document.getElementById("modalLoading");
            const content = document.getElementById("modalContent");
            const error = document.getElementById("modalError");

            // Hide loading, show content
            loading?.classList.add("hidden");
            content?.classList.remove("hidden");
            error?.classList.add("hidden");

            // Update status icon and text
            const statusIcon = document.getElementById("modalStatusIcon");
            const status = document.getElementById("modalStatus");
            const date = document.getElementById("modalDate");

            if (statusIcon && status) {
                if (notification.is_read) {
                    statusIcon.className =
                        "w-12 h-12 bg-green-100 rounded-full flex items-center justify-center";
                    statusIcon.innerHTML = `
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    `;
                    status.textContent = "Đã đọc";
                } else {
                    statusIcon.className =
                        "w-12 h-12 bg-red-100 rounded-full flex items-center justify-center";
                    statusIcon.innerHTML = `
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    `;
                    status.textContent = "Chưa đọc";
                }
            }

            if (date) {
                date.textContent = notification.formatedCreatedDate || "";
            }

            // Update title and type
            const modalTitle = document.getElementById("modalTitle");
            if (modalTitle) {
                modalTitle.textContent = notification.title || "";
            }

            const typeElement = document.getElementById("modalType");
            if (typeElement) {
                const typeClasses = {
                    promotion: "bg-purple-100 text-purple-800",
                    order: "bg-green-100 text-green-800",
                    system: "bg-yellow-100 text-yellow-800",
                    info: "bg-blue-100 text-blue-800",
                };
                const typeLabels = {
                    promotion: "🎁 Khuyến mãi",
                    order: "📦 Đơn hàng",
                    system: "⚙️ Hệ thống",
                    info: "ℹ️ Thông tin",
                };

                typeElement.className = `inline-block px-3 py-1 rounded-full text-xs font-medium ${
                    typeClasses[notification.type] ||
                    "bg-gray-100 text-gray-800"
                }`;
                typeElement.textContent =
                    typeLabels[notification.type] || "📄 Thông báo";
            }

            // Update body
            const modalBody = document.getElementById("modalBody");
            if (modalBody) {
                modalBody.textContent = notification.body || "";
            }

            // Update additional data
            const additionalData = document.getElementById(
                "modalAdditionalData"
            );
            const dataContent = document.getElementById("modalDataContent");

            if (additionalData && dataContent) {
                if (
                    notification.additional_data &&
                    Object.keys(notification.additional_data).length > 0
                ) {
                    additionalData.classList.remove("hidden");

                    const dataHtml = Object.entries(
                        notification.additional_data
                    )
                        .map(([key, value]) => {
                            const label = key
                                .replace(/_/g, " ")
                                .replace(/\b\w/g, (l) => l.toUpperCase());
                            return `
                            <div class="flex justify-between py-2 border-b border-gray-200 last:border-b-0">
                                <span class="font-medium text-gray-700">${label}:</span>
                                <span class="text-gray-900">${value}</span>
                            </div>
                        `;
                        })
                        .join("");

                    dataContent.innerHTML = dataHtml;
                } else {
                    additionalData.classList.add("hidden");
                }
            }

            // Update buttons
            const markAsReadBtn = document.getElementById("markAsReadBtn");
            const deleteBtn = document.getElementById("deleteNotificationBtn");

            if (markAsReadBtn) {
                if (!notification.is_read) {
                    markAsReadBtn.classList.remove("hidden");
                    markAsReadBtn.onclick = () =>
                        this.markAsReadFromModal(notification.id);
                } else {
                    markAsReadBtn.classList.add("hidden");
                }
            }

            if (deleteBtn) {
                deleteBtn.onclick = () => this.deleteFromModal(notification.id);
            }

            console.log("✅ Notification detail displayed successfully");
        }

        showModalError() {
            const loading = document.getElementById("modalLoading");
            const content = document.getElementById("modalContent");
            const error = document.getElementById("modalError");

            loading?.classList.add("hidden");
            content?.classList.add("hidden");
            error?.classList.remove("hidden");

            const retryBtn = document.getElementById("retryBtn");
            if (retryBtn) {
                retryBtn.onclick = () => {
                    if (this.currentNotificationId) {
                        this.viewDetail(this.currentNotificationId);
                    }
                };
            }
        }

        async markAsReadFromModal(notificationId) {
            try {
                await this.markNotificationAsRead(notificationId);

                // Update modal UI
                const markAsReadBtn = document.getElementById("markAsReadBtn");
                markAsReadBtn?.classList.add("hidden");

                // Update status in modal
                const statusIcon = document.getElementById("modalStatusIcon");
                const status = document.getElementById("modalStatus");

                if (statusIcon && status) {
                    statusIcon.className =
                        "w-12 h-12 bg-green-100 rounded-full flex items-center justify-center";
                    statusIcon.innerHTML = `
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    `;
                    status.textContent = "Đã đọc";
                }

                this.showToast(
                    "success",
                    "Thành công",
                    "Đã đánh dấu thông báo là đã đọc"
                );
            } catch (error) {
                this.showToast("error", "Lỗi", "Không thể đánh dấu đã đọc");
            }
        }

        async deleteFromModal(notificationId) {
            if (!confirm("Bạn có chắc chắn muốn xóa thông báo này?")) {
                return;
            }

            try {
                await this.deleteNotificationAPI(notificationId);

                // Close modal
                this.closeModal();
            } catch (error) {
                // Error already handled in deleteNotificationAPI
            }
        }

        closeModal() {
            const modal = document.getElementById("notificationModal");
            if (modal) {
                modal.classList.add("hidden");
                this.currentNotificationId = null;
            }
        }

        // === LEGACY METHODS (for backward compatibility) ===

        async deleteNotification(notificationId) {
            return await this.deleteNotificationAPI(notificationId);
        }

        // === TOAST SYSTEM ===

        showToast(type, title, message, duration = 4000) {
            console.log(`🍞 Toast: ${type} - ${title}: ${message}`);

            // Create toast element
            const toast = document.createElement("div");
            toast.className = `fixed top-4 right-4 z-50 bg-white shadow-lg rounded-lg border-l-4 ${this.getToastBorderColor(
                type
            )} p-4 max-w-sm transform transition-all duration-300 translate-x-full opacity-0`;

            toast.innerHTML = `
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full ${this.getToastIconBg(
                            type
                        )}">
                            ${this.getToastIcon(type)}
                        </div>
                    </div>
                    <div class="ml-3 flex-1">
                        <h4 class="font-semibold text-gray-900 text-sm">${title}</h4>
                        <p class="text-gray-600 text-sm mt-1">${message}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-gray-400 hover:text-gray-600 flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;

            document.body.appendChild(toast);

            // Animate in
            setTimeout(() => {
                toast.classList.remove("translate-x-full", "opacity-0");
                toast.classList.add("translate-x-0", "opacity-100");
            }, 100);

            // Auto remove
            setTimeout(() => {
                if (toast.parentElement) {
                    toast.classList.add("translate-x-full", "opacity-0");
                    setTimeout(() => {
                        toast.remove();
                    }, 300);
                }
            }, duration);
        }

        getToastBorderColor(type) {
            const colors = {
                success: "border-l-green-500",
                error: "border-l-red-500",
                warning: "border-l-yellow-500",
                info: "border-l-blue-500",
            };
            return colors[type] || "border-l-blue-500";
        }

        getToastIconBg(type) {
            const colors = {
                success: "bg-green-100 text-green-600",
                error: "bg-red-100 text-red-600",
                warning: "bg-yellow-100 text-yellow-600",
                info: "bg-blue-100 text-blue-600",
            };
            return colors[type] || "bg-blue-100 text-blue-600";
        }

        getToastIcon(type) {
            const icons = {
                success: `<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>`,
                error: `<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>`,
                warning: `<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>`,
                info: `<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>`,
            };
            return icons[type] || icons.info;
        }

        // === UTILITY METHODS ===

        getCsrfToken() {
            return (
                document
                    .querySelector('meta[name="csrf-token"]')
                    ?.getAttribute("content") || ""
            );
        }

        // === REFRESH METHOD ===

        async refresh() {
            console.log("🔄 Refreshing notifications...");
            await this.loadNotifications();
        }
    }

    // Initialize when DOM is ready
    document.addEventListener("DOMContentLoaded", () => {
        console.log("🚀 DOM loaded, initializing notification system...");
        window.notificationSystem = new MedikNotificationSystem();
    });

    // Global functions for backward compatibility
    window.showSuccessToast = function (title, message, duration) {
        if (window.notificationSystem) {
            window.notificationSystem.showToast(
                "success",
                title,
                message,
                duration
            );
        }
    };

    window.showErrorToast = function (title, message, duration) {
        if (window.notificationSystem) {
            window.notificationSystem.showToast(
                "error",
                title,
                message,
                duration
            );
        }
    };

    window.showWarningToast = function (title, message, duration) {
        if (window.notificationSystem) {
            window.notificationSystem.showToast(
                "warning",
                title,
                message,
                duration
            );
        }
    };

    window.showInfoToast = function (title, message, duration) {
        if (window.notificationSystem) {
            window.notificationSystem.showToast(
                "info",
                title,
                message,
                duration
            );
        }
    };

    // Global refresh function
    window.refreshNotifications = function () {
        if (window.notificationSystem) {
            window.notificationSystem.refresh();
        }
    };

    console.log("✅ Notifications.js loaded successfully");
})();
