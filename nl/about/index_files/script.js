document.addEventListener('DOMContentLoaded', function () {
    let lastScrollTop = 0;

    // Alle img elementen selecteren
    let images = document.querySelectorAll('img');
    images.forEach(function (image) {
        image.style.opacity = '0.1';
        image.style.transition = 'opacity 1.0s ease';
    });

    window.addEventListener('scroll', function () {
        let st = window.scrollY;

        images.forEach(function (image) {
            let rect = image.getBoundingClientRect();

            
            let isInViewport = (rect.top >= 0 && rect.bottom <= window.innerHeight);

            if (isInViewport) {
                
                image.style.opacity = '1';
            } else {
                
                image.style.opacity = '0.1';
            }
        });

        lastScrollTop = st;
    });
});


document.addEventListener('DOMContentLoaded', function () {
    let paragraphs = document.querySelectorAll('p');

    window.addEventListener('scroll', function () {
        let windowHeight = window.innerHeight;
        let scrollY = window.scrollY;

        paragraphs.forEach(function (paragraph) {
            let paragraphPosition = paragraph.getBoundingClientRect().top + scrollY;

            // Check if the bottom of the paragraph is within the viewport
            if (paragraphPosition < windowHeight + scrollY) {
                paragraph.style.opacity = '1';
                paragraph.style.transform = 'translateY(0)';
            }
        });
    });
});
