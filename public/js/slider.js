document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll('.slider-item');
    let currentSlide = 0;

    function showSlide(index) {
        slides[currentSlide].classList.remove('active');
        currentSlide = (index + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // Auto slide change every 5000 milliseconds (5 seconds)
    setInterval(nextSlide, 1000);

    // Optional: Add event listeners for manual navigation
    // You can customize this based on your UI (e.g., add buttons to navigate)

    // Example with buttons
    document.getElementByClass('prevBtn').addEventListener('click', prevSlide);
    document.getElementByClass('nextBtn').addEventListener('click', nextSlide);
});