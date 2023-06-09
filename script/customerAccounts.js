const SUPABASE_URL = 'https://lrdpllwtkxlqgwcmpjju.supabase.co'
const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImxyZHBsbHd0a3hscWd3Y21wamp1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE2ODU1OTY4MDMsImV4cCI6MjAwMTE3MjgwM30.6VFgPcFj9bYG1b5Tza3O70H-HitdPb9kzjwJ5OnBz9k'
const _supabase = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY)

// Assuming you have Supabase JavaScript SDK already set up

// Fetch user data from Supabase
_supabase
  .from('user')
  .select('user_id, user_fname, user_lname, user_phone, user_email, user_bday, user_pokemon')
  .then(({ data: users, error }) => {
    if (error) {
      console.error(error);
      return;
    }

    // Get the table body element
    const tableBody = document.getElementById('customer-table-body');

    // Iterate over the users and create table rows
    users.forEach((user) => {
      const row = document.createElement('tr');

      // Add the user data to table cells
      row.innerHTML = `
        <td>${user.user_id}</td>
        <td>${user.user_fname} ${user.user_lname}</td>
        <td>${user.user_phone}</td>
        <td>${user.user_email}</td>
        <td>${user.user_bday}</td>
        <td>${user.user_pokemon}</td>
        <td>
          <a href="edit-profile-admin.html">
            <button type="button">
              <img src="../images/manage/edit.png" alt="Edit">
            </button>
          </a>
          <button type="button">
            <img src="../images/manage/delete.png" alt="Delete">
          </button>
        </td>
      `;

      // Append the row to the table body
      tableBody.appendChild(row);
    });
  })
  .catch((error) => {
    console.error(error);
  });



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

