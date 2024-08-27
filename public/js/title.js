document.addEventListener('DOMContentLoaded', function () {
    function truncateText(element, maxLength) {
        var text = element.textContent;
        if (text.length > maxLength) {
            element.textContent = text.slice(0, maxLength) + '...';
        }
    }

    var elements = document.querySelectorAll('.truncate-text');
    elements.forEach(function (element) {
        truncateText(element, 32); 
    });
});

document.addEventListener('DOMContentLoaded', function () {
    function truncateText(element, maxLength) {
        var text = element.textContent;
        if (text.length > maxLength) {
            element.textContent = text.slice(0, maxLength) + '...';
        }
    }

    var elements = document.querySelectorAll('.truncate-text-article');
    elements.forEach(function (element) {
        truncateText(element, 150); 
    });
});