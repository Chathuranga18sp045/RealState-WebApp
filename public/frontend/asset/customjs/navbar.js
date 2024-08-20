document.addEventListener("DOMContentLoaded", function() {
    function handleDropdowns() {
        const dropdowns = document.querySelectorAll('.dropdown-menu');
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

        dropdownToggles.forEach(toggle => {
            // Click event listener
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const submenu = this.nextElementSibling;

                if (submenu && submenu.classList.contains('dropdown-menu')) {
                    const isVisible = submenu.style.display === 'block';

                    // Close other submenus in the same parent
                    const parentDropdown = this.closest('.nav-item');
                    if (parentDropdown) {
                        parentDropdown.querySelectorAll('.dropdown-menu').forEach(otherMenu => {
                            if (otherMenu !== submenu) {
                                otherMenu.style.display = 'none'; // Hide other submenus
                            }
                        });
                    }

                    // Toggle the current submenu
                    submenu.style.display = isVisible ? 'none' : 'block'; // Toggle visibility
                }
            });

            // Hover event listeners (only for larger screens)
            if (window.innerWidth > 768) {
                const submenu = toggle.nextElementSibling;
                if (submenu && submenu.classList.contains('dropdown-menu')) {
                    toggle.addEventListener('mouseenter', function() {
                        submenu.style.display = 'block'; // Show submenu on hover
                    });

                    toggle.addEventListener('mouseleave', function() {
                        submenu.style.display = 'none'; // Hide submenu when not hovered
                    });

                    submenu.addEventListener('mouseenter', function() {
                        submenu.style.display = 'block'; // Keep submenu visible when hovering over it
                    });

                    submenu.addEventListener('mouseleave', function() {
                        submenu.style.display = 'none'; // Hide submenu when leaving
                    });
                }
            }
        });

        // Optional: Ensure submenus close when clicking outside
        document.addEventListener('click', function(e) {
            const target = e.target;
            if (!target.closest('.dropdown-menu') && !target.closest('.dropdown-toggle')) {
                dropdowns.forEach(menu => {
                    menu.style.display = 'none'; // Hide all dropdowns
                });
            }
        });
    }

    // Initialize dropdown handling
    handleDropdowns();
});
