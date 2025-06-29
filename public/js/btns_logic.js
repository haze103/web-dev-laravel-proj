document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.querySelector('.filter-dropdown-menu'), 
    table = document.querySelector('.filter-dropdown-menu-item'),
    // cell = table.querySelectorAll('td'), 
    addBtn = document.querySelector('.add-btn'), 
    editBtn = document.querySelectorAll('.edit-btn'),
    cover = document.querySelector('.cover-main-content'), 
    panel = document.querySelector('.side-panel-container'),
    cancelBtn = document.querySelector('.cancel-btn'), 
    saveBtn = document.querySelector('.save-btn');

    // toggle the dropdown - open if closed, close if open
    window.openDropDown = function () {
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        } else {
            dropdown.style.display = 'block';
        }
    }

    // close the dropdown
    function closeDropDown() {
        if (dropdown.style.display === 'block') {
            dropdown.style.display = 'none';
        }
    }

    // close the dropdown if clicked outside
    document.addEventListener('click', function (event) {
        const isClickInside = dropdown.contains(event.target);
        const isIconClicked = event.target.classList.contains('fa-sliders');
        if (!isClickInside && !isIconClicked) {
            closeDropDown();
        }
    });

    // only allow one selection per column
    // cell.forEach(td => {
    //     td.addEventListener('click', function () {
    //         const columnIndex = td.cellIndex;

    //         // deselect selected cell
    //         table.querySelectorAll(`tr`).forEach(row => {
    //             const cell = row.cells[columnIndex];
    //             if (cell) {
    //                 cell.classList.remove('selected');
    //             }
    //         });

    //         // select cell
    //         td.classList.add('selected');
    //     });
    // });

    // show side panel and switch between edit and add 
    addBtn.addEventListener('click', function () {
        panel.style.display = 'block';
        cover.style.display = 'block';
    });

    editBtn.forEach(btn => {
        btn.addEventListener('click', function () {
            panel.style.display = 'block';
            cover.style.display = 'block';
        });
    });

    // close and reset the inputs
    function closeAndResetPanel() {
        panel.style.display = 'none';
        cover.style.display = 'none';

        // clear all input fields
        const inputs = panel.querySelectorAll('input');
        inputs.forEach(input => input.value = '');

        // clear selection
        const selects = panel.querySelectorAll('select');
        selects.forEach(select => {
            select.selectedIndex = 0;
        });
    }

    cancelBtn.addEventListener('click', closeAndResetPanel);
    // saveBtn.addEventListener('click', closeAndResetPanel);
});