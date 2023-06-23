

//to allow user to check only 1 box/table
function uncheckOthers(checkbox) {
  var checkboxes = document.getElementsByName(checkbox.name);
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] !== checkbox) {
      checkboxes[i].checked = false;
    }
  }
} //end


//This jsis to chenge color of the selected table
// Get all checkbox elements
const checkboxes = document.querySelectorAll('input[type=checkbox]');

// Add event listener to each checkbox
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', (event) => {
    // Get the card element containing the checkbox
    const card = event.target.closest('.card');

    // If the checkbox is checked, add a class to the card to change its background color
    if (event.target.checked) {
      card.classList.add('selected');
    } else {
      card.classList.remove('selected');
    }

    // add the highlighting to this card
    if (this.checked) {
      card.classList.add('selected');
    } 
  });
}); //end


// confirming table selection
$('#confirmBtn').on('click', function() {
  var numSelected = Object.keys(selectedTables).length;
  if (numSelected === 0) {
    alert('Please select at least one table.');
  } else {
    var tableList = Object.keys(selectedTables).join(', ');
    var confirmMsg = 'You have selected the following tables: ' + tableList;
    alert(confirmMsg);
  }
}); //end
// });
