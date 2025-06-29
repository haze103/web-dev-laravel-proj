document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.querySelector('.add-btn');
    const cancelBtn = document.querySelector('.cancel-btn');
    const sidePanel = document.querySelector('.side-panel-container');
    const overlay = document.querySelector('.cover-main-content');
    const mainContent = document.querySelector('.main-content');
    const editBtns = document.querySelectorAll('.edit-btn');
    const form = document.querySelector('.side-panel-container');

    const addHeader = document.querySelector('.add-h1-side-panel');
    const editHeader = document.querySelector('.edit-h1-side-panel');

    // Input fields
    const nameInput = document.getElementById('contact-name');
    const emailInput = document.getElementById('contact-email');
    const phoneInput = document.getElementById('contact-phone');
    const companyInput = document.getElementById('contact-company-name');
    const positionInput = document.getElementById('contact-position');
    const leadSelect = document.getElementById('assigned-lead-dropdown');

    // Add this if you're using a hidden ID input for editing
    let idInput = document.getElementById('contact-id');
    if (!idInput) {
        idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'contact_id';
        idInput.id = 'contact-id';
        form.appendChild(idInput);
    }

    function openSidebar(mode, data = {}) {
        sidePanel.classList.add('active');
        overlay.classList.add('active');
        mainContent.classList.add('sidebar-active');
        document.body.style.overflow = 'hidden';

        if (mode === 'add') {
            addHeader.style.display = 'block';
            editHeader.style.display = 'none';
            form.action = '/contacts'; // adjust to route('contact.store') if needed
            form.querySelector('input[name="_method"]').value = 'post';
            clearFormFields();
        } else if (mode === 'edit') {
            addHeader.style.display = 'none';
            editHeader.style.display = 'block';
            form.action = `/contacts/${data.id}`; // assumes RESTful routes
            form.querySelector('input[name="_method"]').value = 'put';
            populateForm(data);
        }
    }

    function closeSidebar() {
        sidePanel.classList.remove('active');
        overlay.classList.remove('active');
        mainContent.classList.remove('sidebar-active');
        document.body.style.overflow = '';
        clearFormFields();
    }

    function clearFormFields() {
        nameInput.value = '';
        emailInput.value = '';
        phoneInput.value = '';
        companyInput.value = '';
        positionInput.value = '';
        leadSelect.selectedIndex = 0;
        idInput.value = '';
    }

    function populateForm(data) {
        nameInput.value = data.name || '';
        emailInput.value = data.email || '';
        phoneInput.value = data.phone || '';
        companyInput.value = data.company || '';
        positionInput.value = data.position || '';
        leadSelect.value = data.lead || '';
        idInput.value = data.id || '';
    }

    // Event bindings
    addBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        openSidebar('add');
    });

    cancelBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        closeSidebar();
    });

    overlay?.addEventListener('click', closeSidebar);

    editBtns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const contactData = {
                id: btn.dataset.id,
                name: btn.dataset.name,
                email: btn.dataset.email,
                phone: btn.dataset.phone,
                company: btn.dataset.company,
                position: btn.dataset.position,
                lead: btn.dataset.lead
            };
            openSidebar('edit', contactData);
        });
    });

    // --- Filter dropdown logic
    window.openDropDown = function () {
        const dropdown = document.querySelector('.filter-dropdown-menu');
        if (dropdown) dropdown.classList.toggle('show');
    };

    document.addEventListener('click', (e) => {
        const dropdown = document.querySelector('.filter-dropdown-menu');
        const filterIcon = document.querySelector('.fa-sliders');
        if (dropdown && !dropdown.contains(e.target) && !filterIcon.contains(e.target)) {
            dropdown.classList.remove('show');
        }
    });
});
