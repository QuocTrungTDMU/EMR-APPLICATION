import "./bootstrap";
import "./notifications";

// Lắng nghe sự kiện avatarUpdated để cập nhật avatar trên header
window.addEventListener("avatarUpdated", function (e) {
    var newAvatar = e.detail.avatar;
    // Cập nhật tất cả avatar trên header (class header-avatar)
    document.querySelectorAll(".header-avatar").forEach(function (img) {
        img.src = newAvatar;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    fetch("/api/me", { credentials: "same-origin" })
        .then((res) => res.json())
        .then((data) => {
            if (data && data.avatar) {
                document
                    .querySelectorAll(".header-avatar")
                    .forEach(function (img) {
                        img.src = data.avatar;
                    });
            }
            if (data && (data.firstname || data.lastname)) {
                var fullName =
                    (data.lastname || "") + " " + (data.firstname || "");
                document
                    .querySelectorAll(".header-username")
                    .forEach(function (el) {
                        el.textContent = fullName.trim();
                    });
            }
        });
});
