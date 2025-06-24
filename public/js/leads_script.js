document.addEventListener('DOMContentLoaded', () => {

        // --- Menu Item Logic (from your existing script) ---
        const currentPath = window.location.pathname;
        const menuItems = document.querySelectorAll('.side-menu .menu-item'); // Target the li.menu-item directly

        menuItems.forEach(item => {
            const link = item.querySelector('a');
            if (link && link.getAttribute('href')) {
                // Adjust this logic if your hrefs are dynamic Laravel routes
                // This is a basic check. If routes are like /leads or /dashboard
                const linkHref = link.getAttribute('href').replace(/^\//, ''); // Remove leading slash for comparison
                const currentPathClean = currentPath.replace(/^\//, '');

                if (currentPathClean.includes(linkHref) && linkHref !== '') {
                    item.classList.add('current-page');
                } else if (linkHref === '' && currentPathClean === 'dashboard') { // For dashboard or base path
                    // Assuming empty href is for dashboard, adjust as needed
                    item.classList.add('current-page');
                } else {
                    item.classList.remove('current-page');
                }
            }
        });

        menuItems.forEach(item => {
            item.addEventListener('click', (event) => {
                document.querySelectorAll('.menu-item.current-page').forEach(activeItem => {
                    activeItem.classList.remove('current-page');
                });
                event.currentTarget.classList.add('current-page');
            });
        });

        // --- Sidebar Logic (from your existing script) ---

        // Get references to elements
        // CORRECTED: addLeadBtn ID now matches HTML
        const addLeadBtn = document.getElementById('addLeadBtn');
        const sidebarForm = document.getElementById('sidebarForm');

        // Check if sidebarForm exists before proceeding with its child elements
        if (sidebarForm) {
            // CORRECTED: closeSidebarBtn ID now matches HTML
            const closeSidebarBtn = document.getElementById('closeSidebarBtn');
            // CORRECTED: cancelSidebarBtn ID now matches HTML
            const cancelSidebarBtn = document.getElementById('cancel-sidebar-btn');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            // CORRECTED: mainContent selector now matches HTML
            const mainContent = document.querySelector('.main-content');

            // Form fields inside the sidebar
            const sidebarHeaderH2 = sidebarForm.querySelector('.sidebar-header h2');
            const currentUserP = document.getElementById('current-user');
            const nameInput = document.getElementById('name');
            const companyNameInput = document.getElementById('companyName');
            const assignedToSelect = document.getElementById('assignedTo');
            const stageSelect = document.getElementById('stage');
            const closingDateInput = document.getElementById('closingDate');
            const amountInput = document.getElementById('amount');
            const statusSelect = document.getElementById('status');
            const saveButton = sidebarForm.querySelector('.save-btn');

            // Select all "Edit Lead" buttons
            // CORRECTED: editLeadButtons class now matches HTML
            const editLeadButtons = document.querySelectorAll('.edit-lead-btn');

            // Function to open the sidebar, now accepts data for editing
            function openSidebar(mode, leadData = {}) {
                // Determine if sidebarForm is actually a <form> tag or just a div
                // Your sidebar-form is a div, so .reset() won't work on it.
                // Call clearFormFields() explicitly.
                clearFormFields(); // Always clear fields before populating or for 'add' mode

                if (mode === 'add') {
                    sidebarHeaderH2.textContent = 'Add Lead';
                    currentUserP.textContent = '(Current User)'; // Or actual current user's name
                    saveButton.textContent = 'Save';
                    saveButton.classList.remove('update-btn'); // Remove any edit specific classes
                    // Hidden input for ID is cleared by clearFormFields()
                } else if (mode === 'edit') {
                    sidebarHeaderH2.textContent = 'Edit Lead';
                    // Populate 'Created by' from data attribute if available, otherwise default
                    currentUserP.textContent = leadData.createdBy || '(Existing User)';
                    saveButton.textContent = 'Update';
                    saveButton.classList.add('update-btn');

                    // Populate form fields with leadData
                    const leadIdInput = document.getElementById('leadId');
                    if (leadIdInput) {
                        leadIdInput.value = leadData.id || '';
                    }

                    nameInput.value = leadData.name || '';
                    companyNameInput.value = leadData.company || '';
                    assignedToSelect.value = leadData.assignedTo || '';
                    stageSelect.value = leadData.stage || '';

                    // For date inputs, ensure the format matches
                    // If leadData.closingDate is 'YYYY-MM-DD', it will work directly
                    closingDateInput.value = leadData.closingDate || '';
                    amountInput.value = leadData.amount || '';
                    statusSelect.value = leadData.status || '';
                }

                sidebarForm.classList.add('active');
                sidebarOverlay.classList.add('active');
                if (mainContent) { // Check if mainContent exists before adding class
                     mainContent.classList.add('sidebar-active');
                }
                document.body.style.overflow = 'hidden';
            }

            // Function to clear form fields
            function clearFormFields() {
                nameInput.value = '';
                companyNameInput.value = '';
                assignedToSelect.value = '';
                stageSelect.value = '';
                closingDateInput.value = '';
                amountInput.value = '';
                statusSelect.value = '';
                const leadIdInput = document.getElementById('leadId');
                if (leadIdInput) leadIdInput.value = '';
            }

            // Function to close the sidebar
            function closeSidebar() {
                sidebarForm.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                if (mainContent) { // Check if mainContent exists before removing class
                    mainContent.classList.remove('sidebar-active');
                }
                document.body.style.overflow = '';
                clearFormFields(); // Clear form fields when closing
            }

            // Event listeners for Add Lead button
            if (addLeadBtn) {
                addLeadBtn.addEventListener('click', (event) => {
                    event.preventDefault(); // Prevent default link navigation
                    openSidebar('add');
                });
            }

            // Event listeners for Edit Lead buttons
            editLeadButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    // dataset automatically converts kebab-case (data-closing-date) to camelCase (dataset.closingDate)
                    const leadData = event.currentTarget.dataset;
                    openSidebar('edit', leadData);
                });
            });

            // Event listeners for closing buttons
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', closeSidebar);
            }

            if (cancelSidebarBtn) {
                cancelSidebarBtn.addEventListener('click', closeSidebar);
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }

            // Close sidebar on Escape key press
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && sidebarForm.classList.contains('active')) {
                    closeSidebar();
                }
            });

        } else {
            console.error("Sidebar form element with ID 'sidebarForm' not found. Sidebar functionality may not work.");
        }
    });