document.addEventListener('DOMContentLoaded', () => {

    // --- Menu Item Logic ---
    const currentPath = window.location.pathname;
    const menuItems = document.querySelectorAll('.side-menu .menu-item');

    menuItems.forEach(item => {
        const link = item.querySelector('a');
        if (link && link.getAttribute('href')) {
            const linkHref = link.getAttribute('href').replace(/^\//, '');
            const currentPathClean = currentPath.replace(/^\//, '');

            if (currentPathClean.includes(linkHref) && linkHref !== '') {
                item.classList.add('current-page');
            } else if (linkHref === '' && currentPathClean === 'dashboard') {
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

    // --- Sidebar Logic ---

    const addTaskBtn = document.getElementById('addTaskBtn');
    const sidebarForm = document.getElementById('sidebarForm');

    if (sidebarForm) {
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');
        const cancelSidebarBtn = document.getElementById('cancel-sidebar-btn');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mainContent = document.querySelector('.main-content');

        const sidebarHeaderH2 = sidebarForm.querySelector('.sidebar-header h2');
        const currentUserP = document.getElementById('current-user');
        const taskCheckbox = document.querySelector('.task-done-checkbox');
        const titleInput = document.getElementById('title');
        const dueDateInput = document.getElementById('dueDate');
        const taskStatusSelect = document.getElementById('status');
        const linkedLeadSelect = document.getElementById('linkedLead');
        const prioritySelect = document.getElementById('priority');
        const saveButton = sidebarForm.querySelector('.save-btn');
        const taskIdInput = document.getElementById('taskId');

        const editTaskButtons = document.querySelectorAll('.edit-task-btn');

        function openSidebar(mode, taskData = {}) {
            clearFormFields();

            if (mode === 'add') {
                sidebarHeaderH2.textContent = 'Add Task';
                currentUserP.textContent = '(Current User)';
                saveButton.textContent = 'Save';
                saveButton.classList.remove('update-btn');
            } else if (mode === 'edit') {
                sidebarHeaderH2.textContent = 'Edit Task';
                currentUserP.textContent = taskData.createdBy || '(Existing User)';
                saveButton.textContent = 'Update';
                saveButton.classList.add('update-btn');

                if (taskIdInput) taskIdInput.value = taskData.id || '';
                taskCheckbox.checked = taskData.isCompleted === 'true';
                titleInput.value = taskData.title || '';
                dueDateInput.value = taskData.dueDate || '';
                taskStatusSelect.value = taskData.status || '';
                linkedLeadSelect.value = taskData.linkedLead || '';
                prioritySelect.value = taskData.priority || '';
            }

            sidebarForm.classList.add('active');
            sidebarOverlay.classList.add('active');
            if (mainContent) mainContent.classList.add('sidebar-active');
            document.body.style.overflow = 'hidden';
        }

        function clearFormFields() {
            if (taskCheckbox) taskCheckbox.checked = false;
            titleInput.value = '';
            dueDateInput.value = '';
            taskStatusSelect.value = '';
            linkedLeadSelect.value = '';
            prioritySelect.value = '';
            if (taskIdInput) taskIdInput.value = '';
        }

        function closeSidebar() {
            sidebarForm.classList.remove('active');
            sidebarOverlay.classList.remove('active');
            if (mainContent) mainContent.classList.remove('sidebar-active');
            document.body.style.overflow = '';
            clearFormFields();
        }

        if (addTaskBtn) {
            addTaskBtn.addEventListener('click', (event) => {
                event.preventDefault();
                openSidebar('add');
            });
        }

        editTaskButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const taskData = {
                    id: button.dataset.id,
                    title: button.dataset.title,
                    dueDate: button.dataset.dueDate,
                    status: button.dataset.status,
                    linkedLead: button.dataset.linkedLead,
                    priority: button.dataset.priority,
                    createdBy: button.dataset.createdBy,
                    isCompleted: button.dataset.isCompleted
                };
                openSidebar('edit', taskData);
            });
        });

        if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
        if (cancelSidebarBtn) cancelSidebarBtn.addEventListener('click', closeSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && sidebarForm.classList.contains('active')) {
                closeSidebar();
            }
        });

        async function populateLinkedLeads() {
            if (!linkedLeadSelect) {
                console.error('Linked Lead select element not found in sidebar.');
                return;
            }

            try {
                const response = await fetch('/api/leads');
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const leads = await response.json();

                linkedLeadSelect.innerHTML = '<option value="">Select Linked Lead</option>';

                leads.forEach(lead => {
                    const option = document.createElement('option');
                    option.value = lead.id;
                    option.textContent = lead.name;
                    linkedLeadSelect.appendChild(option);
                });

            } catch (error) {
                console.error('Error fetching linked leads:', error);
            }
        }

        populateLinkedLeads();

    } else {
        console.error("Sidebar form element with ID 'sidebarForm' not found. Sidebar functionality may not work.");
    }
});
