// On page load or when content changes
document.addEventListener('DOMContentLoaded', () => {
    const currentPath = window.location.pathname; // Get current URL path

    // Example: Map paths to menu item IDs or text
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        if (item.getAttribute('href') === currentPath) {
            item.closest('.menu-item').classList.add('current-page');
        } else {
            item.closest('.menu-item').classList.remove('current-page'); // Remove from others
        }
    });

    menuItems.forEach(item => {
        item.addEventListener('click', (event) => {
            // Remove 'current-page' from all existing active items
            document.querySelectorAll('.menu-item.current-page').forEach(activeItem => {
                activeItem.classList.remove('current-page');
            });
            // Add 'current-page' to the clicked item
            event.target.closest('.menu-item').classList.add('current-page');
        });
    });
});
