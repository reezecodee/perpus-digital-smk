document.addEventListener('DOMContentLoaded', function () {
    function truncateText(selector, maxLength) {
        var elements = document.querySelectorAll(selector);
        elements.forEach(function (element) {
            var text = element.textContent.trim(); // Gunakan textContent untuk mengambil teks
            if (text.length > maxLength) {
                element.textContent = text.slice(0, maxLength) + '...';
            }
        });
    }

    truncateText('.truncate-text', 25);
    truncateText('.truncate-text-author', 10);
    truncateText('.truncate-text-notif', 100);
    truncateText('.truncate-text-article', 150);
});
