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
        const titleInput = document.getElementById('title');
        const dueDateInput = document.getElementById('dueDate');
        const taskStatusSelect = document.getElementById('status');
        const linkedLeadSelect = document.getElementById('linkedLead');
        const prioritySelect = document.getElementById('priority');
        const saveButton = sidebarForm.querySelector('.save-btn');
        const taskIdInput = document.getElementById('taskId');

        const editTaskButtons = document.querySelectorAll('.edit-task-btn');

        function openSidebar(mode, taskData = {}) {


            if (mode === 'add') {
                
            } else if (mode === 'edit') {

            }

            sidebarForm.classList.add('active');
            sidebarOverlay.classList.add('active');
            if (mainContent) mainContent.classList.add('sidebar-active');
            document.body.style.overflow = 'hidden';
        }

        function clearFormFields() {
           
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

        

    } else {
        console.error("Sidebar form element with ID 'sidebarForm' not found. Sidebar functionality may not work.");
    }
});
