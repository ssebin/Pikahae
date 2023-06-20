document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.getElementById('customer-search-button');
    const searchInput = document.getElementById('customer-search-input');
    const tableBody = document.getElementById('customer-table-body');

    const accountHeader = document.getElementById('customer-acc-num');
    const nameHeader = document.getElementById('customer-acc-name');
    const phoneHeader = document.getElementById('customer-acc-phone');
    const emailHeader = document.getElementById('customer-acc-email');
    const birthdayHeader = document.getElementById('customer-acc-birthday');
    const pokemonHeader = document.getElementById('customer-acc-favpoke');

    let ascendingAccount = true;
    let ascendingName = true;
    let ascendingPhone = true;
    let ascendingEmail = true;
    let ascendingBirthday = true;
    let ascendingPokemon = true;

    accountHeader.addEventListener('click', () => {
        sortTable(0, ascendingAccount);
        ascendingAccount = !ascendingAccount;
    });

    nameHeader.addEventListener('click', () => {
        sortTable(1, ascendingName);
        ascendingName = !ascendingName;
    });

    phoneHeader.addEventListener('click', () => {
        sortTable(2, ascendingPhone);
        ascendingPhone = !ascendingPhone;
    });

    emailHeader.addEventListener('click', () => {
        sortTable(3, ascendingEmail);
        ascendingEmail = !ascendingEmail;
    });

    birthdayHeader.addEventListener('click', () => {
        sortTable(4, ascendingBirthday);
        ascendingBirthday = !ascendingBirthday;
    });

    pokemonHeader.addEventListener('click', () => {
        sortTable(5, ascendingPokemon);
        ascendingPokemon = !ascendingPokemon;
    });

    function searchTable() {
        const searchValue = searchInput.value.toLowerCase();

        for (let row of tableBody.rows) {
            let visible = false;
            const name = row.cells[1].textContent.toLowerCase();
            const email = row.cells[3].textContent.toLowerCase();

            if (name.includes(searchValue) || email.includes(searchValue)) {
                visible = true;
            }

            row.style.display = visible ? '' : 'none';
        }
    }

    searchBtn.addEventListener('click', searchTable);
    searchInput.addEventListener('input', searchTable);
    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            searchTable();
        }
    });

    function sortTable(columnIndex, ascending) {
        const rows = Array.from(tableBody.rows);

        const sortedRows = rows.sort((a, b) => {
            const value1 = a.cells[columnIndex].textContent.trim();
            const value2 = b.cells[columnIndex].textContent.trim();

            if (columnIndex === 0) {
                return ascending ? value1 - value2 : value2 - value1;
            } else if (columnIndex === 2) {
                return ascending ? value1.localeCompare(value2) : value2.localeCompare(value1);
            } else if (columnIndex === 4) {
                const date1 = new Date(value1.split('/').reverse().join('-'));
                const date2 = new Date(value2.split('/').reverse().join('-'));
                return ascending ? date1 - date2 : date2 - date1;
            } else {
                return ascending ? value1.localeCompare(value2) : value2.localeCompare(value1);
            }
        });

        sortedRows.forEach(row => tableBody.appendChild(row));
    }

    const deleteButtons = document.querySelectorAll('tbody tr button:nth-child(2)');
    const deletePopupCard = document.querySelector('.cancel-popup-card');
    const deleteConfirmButton = document.querySelector('#cancel-confirm-button');
    const deleteBackButton = document.querySelector('#cancel-back-button');
    const overlay = document.querySelector('.overlay');

    deleteButtons.forEach((button) => {
        button.addEventListener('click', () => {
            overlay.style.display = 'block';
            deletePopupCard.style.display = 'block';
            deletePopupCard.style.transform = 'translate(-50%, -100%)';
            setTimeout(() => {
                deletePopupCard.style.transform = 'translate(-50%, 0)';
            }, 100);
        });
    });

    deleteBackButton.addEventListener('click', () => {
        overlay.style.display = 'none';
        deletePopupCard.style.display = 'none';
        deletePopupCard.style.transform = 'translate(-50%, -100%)';
        setTimeout(() => {
            overlay.style.display = 'none';
            deletePopupCard.style.display = 'none';
        }, 500);
    });

    deleteConfirmButton.addEventListener('click', () => {
        window.location.href = '../customer_accounts.html';
    });
});
