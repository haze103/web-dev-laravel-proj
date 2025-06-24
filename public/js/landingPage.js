
{{--  document.addEventListener('DOMContentLoaded', () => {
    const heroButton = document.querySelector('.hero-button');

    if (heroButton) {
        heroButton.addEventListener('click', () =>{
            const logInPageURL = 'signup-login.html';

            window.location.href = logInPageURL;
        })
    } 
    else {
        console.warn("Hero button with class 'hero-button' not found on the page.");
    }
}) --}}


document.addEventListener('DOMContentLoaded', () => {
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const prevButton = document.getElementById('prevTestimonial');
    const nextButton = document.getElementById('nextTestimonial');

    let currentIndex = 0; // Start with the first testimonial

    // Function to show a specific testimonial
    function showTestimonial(index) {
        // Remove 'active' class from all cards
        testimonialCards.forEach(card => {
            card.classList.remove('active');
            // Reset position to absolute for inactive cards to prevent layout issues
            // This is important if you toggle position between relative/absolute
            card.style.position = 'absolute';
            card.style.top = '0';
            card.style.left = '0';
            card.style.width = '100%';
        });

        // Add 'active' class to the desired card
        testimonialCards[index].classList.add('active');
        // Set active card back to relative so its height defines the wrapper height
        testimonialCards[index].style.position = 'relative';

        // Update currentIndex
        currentIndex = index;
    }

    // Event listener for the "Next" button
    nextButton.addEventListener('click', () => {
        let nextIndex = currentIndex + 1;
        if (nextIndex >= testimonialCards.length) {
            nextIndex = 0; // Loop back to the first testimonial
        }
        showTestimonial(nextIndex);
    });

    // Event listener for the "Previous" button
    prevButton.addEventListener('click', () => {
        let prevIndex = currentIndex - 1;
        if (prevIndex < 0) {
            prevIndex = testimonialCards.length - 1; // Loop to the last testimonial
        }
        showTestimonial(prevIndex);
    });

    // Initialize: Ensure the first card is visible when the page loads
    // (This is covered by the 'active' class in HTML, but good for robustness)
    showTestimonial(currentIndex);
});