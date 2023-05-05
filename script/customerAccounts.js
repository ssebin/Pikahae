// searching through search bar
const searchBtn = document.getElementById('customer-search-button');
const searchInput = document.getElementById('customer-search-input');
const tableBody = document.getElementById('customer-table-body');

searchBtn.addEventListener('click', searchTable);
searchInput.addEventListener('input', searchTable);

// sorting the table when the table head is clicked
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

    // loop through all rows of the table
    for (let row of tableBody.rows) {
        let visible = false;
        // loop through all cells of the row
        for (let cell of row.cells) {
            const text = cell.textContent.toLowerCase();
            if (text.includes(searchValue)) {
                visible = true;
                break;
            }
        }
        // hide or show the row based on the search result
        row.style.display = visible ? '' : 'none';
    }
}

function sortTable(columnIndex, ascending) {
    const rows = Array.from(tableBody.rows);
  
    // sort the rows based on the column value
    const sortedRows = rows.sort((a, b) => {
        // get the cell value of the two rows being compared
        const value1 = a.cells[columnIndex].textContent.trim();
        const value2 = b.cells[columnIndex].textContent.trim();
  
        // compare cell values based on their data type
        if (columnIndex === 0) {
            // account number, compare numbers
            return ascending ? value1 - value2 : value2 - value1;
        } else if (columnIndex === 2) {
            // phone number, compare string
            return ascending ? value1.localeCompare(value2) : value2.localeCompare(value1);
        } else if (columnIndex === 4) {
            // birthday, compare date object
            const date1 = new Date(value1.split('/').reverse().join('-'));
            const date2 = new Date(value2.split('/').reverse().join('-'));
            return ascending ? date1 - date2 : date2 - date1;
        } else {
            // else, compare as strings
            return ascending ? value1.localeCompare(value2) : value2.localeCompare(value1);
        }
    });
    // reorder the rows in the table body based on the sorted rows
    sortedRows.forEach(row => tableBody.appendChild(row));
    
}