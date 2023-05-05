// searching through search bar
const searchBtn = document.getElementById('menu-search-button');
const searchInput = document.getElementById('menu-search-input');
const tableBody = document.getElementById('menu-table-body');

searchBtn.addEventListener('click', searchTable);
searchInput.addEventListener('input', searchTable);

// sorting the table when the table head is clicked
const idHeader = document.getElementById('menu-table-id');
const nameHeader = document.getElementById('menu-table-name');
const categoryHeader = document.getElementById('menu-table-cat');
const priceHeader = document.getElementById('menu-table-price');

let ascendingId = true;
let ascendingName = true;
let ascendingCategory = true;
let ascendingPrice = true;

idHeader.addEventListener('click', () => {
    sortTable(0, ascendingId);
    ascendingId = !ascendingId;
});

nameHeader.addEventListener('click', () => {
    sortTable(1, ascendingName);
    ascendingName = !ascendingName;
});

categoryHeader.addEventListener('click', () => {
    sortTable(2, ascendingCategory);
    ascendingCategory = !ascendingCategory;
});

priceHeader.addEventListener('click', () => {
    sortTable(3, ascendingPrice);
    ascendingPrice = !ascendingPrice;
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
  
      // columIndex 3 is a float column (price)
      if (columnIndex === 3) {
        return ascending
          ? parseFloat(value1) - parseFloat(value2) : parseFloat(value2) - parseFloat(value1);
      } else {
        // if not, compare the values as strings
        return ascending ? value1.localeCompare(value2) : value2.localeCompare(value1);
      }
    });
    // reorder the rows in the table body based on the sorted rows
    sortedRows.forEach(row => tableBody.appendChild(row));
}

const deleteButton = document.querySelector('#menu-delete-btn');
const deletePopupCard = document.querySelector('.cancel-popup-card');
const deleteConfirmButton = document.querySelector('#cancel-confirm-button');
const deleteBackButton = document.querySelector('#cancel-back-button');
const overlay = document.querySelector('.overlay');

deleteButton.addEventListener('click', () => {
  overlay.style.display = 'block';
  deletePopupCard.style.display = 'block';
  deletePopupCard.style.transform = 'translate(-50%, -100%)';
  setTimeout(() => {
    deletePopupCard.style.transform = 'translate(-50%, 0)';
  }, 100);
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
  window.location.href = '../manage_menu.html';
});


  





