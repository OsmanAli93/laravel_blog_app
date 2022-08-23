const toasts = document.querySelectorAll(".custom-toast");

const hideToast = (timer) => {
    const body = document.querySelector("body");

    toasts.forEach((toast) => {
        if (!toast.classList.contains("show")) return;

        setTimeout(() => {
            toast.classList.remove("show");
        }, timer);

        setTimeout(() => {
            return body.removeChild(toast);
        }, 5000);
    });
};

window.addEventListener("DOMContentLoaded", hideToast(3000));
