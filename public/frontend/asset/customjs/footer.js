// footer-scripts.js

document.addEventListener('DOMContentLoaded', function() {
    // Example: Add a smooth scroll effect to footer navigation links
    const footerLinks = document.querySelectorAll('.footer-nav a');
    
    footerLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default link behavior

            const targetId = this.getAttribute('href').substring(1); // Get the target ID from the href
            const targetElement = document.getElementById(targetId); // Find the target element

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 60, // Offset to account for fixed headers or desired spacing
                    behavior: 'smooth' // Smooth scroll effect
                });
            }
        });
    });
});
