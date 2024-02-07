
// Add event listener to room_type select element
document.getElementById("room_type").addEventListener("change", function () {
  var roomTypeSelect = document.getElementById("room_type");
  // console.log(roomTypeSelect.value);
  calculateTotal();

});

/* Room Rent Calculation Starts */
function gst_cal() {
  // egst_cal();
  var gst_no_hotel = document.getElementById("gst_no_hotel").textContent;
  var state_code_hotel = gst_no_hotel.slice(0, 2);
  var gst_no_cust = document.getElementById("gst_no").value;
  var state_code_cust = gst_no_cust.substring(0, 2);

  var tax_amt = parseFloat(document.getElementById("tax-amt").value) || 0;
  var gst_h_input = parseFloat(document.getElementById("gst_h_input").value) || 0;

  var gst_amt = ((tax_amt * gst_h_input) / 100) || 0;

  if (state_code_hotel === state_code_cust || state_code_cust == '') {
    document.getElementById("r_sgst").value = (gst_amt / 2).toFixed(2) || 0;
    document.getElementById("r_cgst").value = (gst_amt / 2).toFixed(2) || 0;
    document.getElementById("igst").value = 0;
  } else {
    document.getElementById("r_sgst").value = 0;
    document.getElementById("r_cgst").value = 0;
    document.getElementById("igst").value = (gst_amt).toFixed(2);
  }
  // var totalRent = roomRent + gst_amt;
  document.getElementById("gstamt").value = gst_amt.toFixed(2) || 0;
  document.getElementById("fnet").value = parseFloat(document.getElementById("gstamt").value) + parseFloat(document.getElementById("tax-amt").value);
}
/* Room Rent Calculation Ends */

// /* Extra Bed Calculation Starts */

// function egst_cal() {

//   var gst_no_hotel = document.getElementById("gst_no_hotel").textContent;
//   var state_code_hotel = gst_no_hotel.slice(0, 2);
//   var gst_no_cust = document.getElementById("gst_no").value;
//   var state_code_cust = gst_no_cust.substring(0, 2);
//   //  -----
//   var extra_bed_amt = parseFloat(document.getElementById('extra_bed_amt').value) || 0;
//   //  -----
//   var gst_h_input = parseFloat(document.getElementById("gst_h_input").value) || 0;

//   var gst_amt = ((extra_bed_amt * gst_h_input) / 100) || 0;

//   if (state_code_hotel === state_code_cust || state_code_cust == '') {
//     document.getElementById("e_sgst").value = (gst_amt / 2).toFixed(2) || 0;
//     document.getElementById("e_cgst").value = (gst_amt / 2).toFixed(2) || 0;
//     document.getElementById("e_igst").value = 0;
//   } else {
//     document.getElementById("e_sgst").value = 0;
//     document.getElementById("e_cgst").value = 0;
//     document.getElementById("e_igst").value = (gst_amt).toFixed(2);
//   }
//   var extra_bed_amt_ttl = extra_bed_amt + gst_amt;
//   document.getElementById("e_ttl_rent").value = extra_bed_amt_ttl.toFixed(2) || 0;
// }

// /* Extra Bed Calculation Ends */

/* Function to calculate the checkout date based on check-in date and number of days Starts */
var checkInDateInput = document.getElementById('check_in_date');
var checkoutNoInput = document.getElementById('checkout_no');
var checkOutDateInput = document.getElementById('check_out_date');

function calculateCheckoutDate() {
  var checkInDate = new Date(checkInDateInput.value);
  if (!isNaN(checkInDate.getTime())) {
    var numberOfDays = parseInt(checkoutNoInput.value);
    if (!isNaN(numberOfDays)) {
      var checkoutDate = new Date(checkInDate.getTime() + numberOfDays * 24 * 60 * 60 * 1000);
      checkOutDateInput.value = checkoutDate.toISOString().slice(0, 10);
    }
  }
}

function calculateCheckinDate() {
  var checkoutDate = new Date(checkOutDateInput.value);
  if (!isNaN(checkoutDate.getTime())) {
    var numberOfDays = parseInt(checkoutNoInput.value);
    if (!isNaN(numberOfDays)) {
      var checkinDate = new Date(checkoutDate.getTime() - numberOfDays * 24 * 60 * 60 * 1000);
      checkInDateInput.value = checkinDate.toISOString().slice(0, 10);
    }
  }
}

function calculateCheckoutNo() {
  var checkInDate = new Date(checkInDateInput.value);
  var checkoutDate = new Date(checkOutDateInput.value);
  if (!isNaN(checkInDate.getTime()) && !isNaN(checkoutDate.getTime())) {
    var numberOfDays = Math.round((checkoutDate.getTime() - checkInDate.getTime()) / (24 * 60 * 60 * 1000));
    checkoutNoInput.value = numberOfDays;
  }
}

checkInDateInput.addEventListener('input', calculateCheckoutDate);
checkoutNoInput.addEventListener('input', calculateCheckoutDate);
checkOutDateInput.addEventListener('input', calculateCheckinDate);
checkOutDateInput.addEventListener('input', calculateCheckoutNo);

// Call the functions initially to set the initial checkout date and number of days if both inputs already have values
calculateCheckoutDate();
calculateCheckinDate();
calculateCheckoutNo();

//----------------------------------------------------------

window.onload = function () {
  var currentDate = new Date();

  // Create a new Date object for the next day
  var nextDate = new Date(currentDate);
  nextDate.setDate(currentDate.getDate() + 1);

  // Get the components of the current date
  var day = currentDate.getDate();
  var month = currentDate.getMonth() + 1; // Month is zero-based
  var year = currentDate.getFullYear();

  // Get the components of the next date
  var day1 = nextDate.getDate();
  var month1 = nextDate.getMonth() + 1; // Month is zero-based
  var year1 = nextDate.getFullYear();

  // Format the current date as YYYY-MM-DD (ISO format)
  var formattedDate = year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');

  // Format the next date as YYYY-MM-DD (ISO format)
  var formattedDate1 = year1 + '-' + month1.toString().padStart(2, '0') + '-' + day1.toString().padStart(2, '0');

  // Set the value of the input fields
  document.getElementById('check_in_date').value = formattedDate;
  document.getElementById('check_out_date').value = formattedDate1;
};

//=============== script for date ends ================= 
function calculateRowAmount(row) {
  var roomPrice = row.querySelector('input[name="room_price[]"]').value;
  var numberOfDays = row.querySelector('input[name="no_of_days[]"]').value;
  var rowAmount = roomPrice * numberOfDays;
  row.querySelector('input[name="row_amt[]"]').value = rowAmount;

}

// Function to calculate row amount for all rows
function multi_rent() {

  var rows = document.querySelectorAll('#table-body tr');
  rows.forEach(function (row) {
    calculateRowAmount(row);
  });
  calculateTotal();
  gst_cal()
}

function fetch_item(rid) {

  const rrow = rid.closest("tr");
  var id = rrow.querySelector("[name='room_type[]']").value
  $.ajax({
    url: 'fetch/fetch_room_price.php',
    method: 'POST',
    data: {
      id: id
    },
    dataType: 'json',
    success: function (item) {
      rrow.querySelector("[name='room_price[]']").value = item.price;
      document.getElementById('gst_h_input').value = item.gst;
      calculateTotal()
    }
  });
}

// Function to clone and add a new row
function addRow() {

  const tableBody = document.getElementById("table-body");
  const lastRow = tableBody.lastElementChild;
  const newRow = lastRow.cloneNode(true);
  const srNoCell = newRow.querySelector("td:first-child");

  // Increment the SR.NO and update the value
  const srNo = parseInt(srNoCell.textContent);
  srNoCell.textContent = srNo + 1;

  // Clear the input fields in the new row
  const inputFields = newRow.querySelectorAll("input[type='text'], input[type='number']");
  inputFields.forEach((input) => (input.value = ""));

  // Make the delete button visible in the new row
  const deleteButton = newRow.querySelector(".btn-danger");
  deleteButton.style.display = "block";

  // Append the new row to the table body
  tableBody.appendChild(newRow);
}

// Function to remove the row when the delete button is clicked
function btndelete(btn) {
  const rowToDelete = btn.parentNode.parentNode;
  const tableBody = document.getElementById("table-body");
  tableBody.removeChild(rowToDelete);
  reorderSRNo();
  calculateTotal();
}

// Function to re-order SR.NO
function reorderSRNo() {
  const tableRows = document.querySelectorAll("#table-body tr");
  tableRows.forEach((row, index) => {
    const srNoCell = row.querySelector("td:first-child");
    srNoCell.textContent = index + 1;
  });
}

// document.addEventListener("focusout", function (event) {
//   const target = event.target;
//   if (target.name === "purh-rate[]") {
//     const allHsnInputs = document.querySelectorAll("input[name='purh-rate[]']");
//     const lastHsnInput = allHsnInputs[allHsnInputs.length - 1];

//     if (target === lastHsnInput) {
//       addRow();
//     }
//   }
// });

// Event listener for dynamically created delete buttons
document.addEventListener("click", function (event) {
  const target = event.target;
  // console.log(target);
  if (target.classList.contains("btn-danger")) {
    btndelete(target);
  }
});

// Hide the delete button in the first row initially
document.addEventListener("DOMContentLoaded", function () {
  const firstDeleteButton = document.querySelector("#table-body tr:first-child .btn-danger");
  firstDeleteButton.style.display = "none";
});

function calculateTotal() {
  const rows = document.querySelectorAll("#invoice-table tbody tr.item-row");
  let totalAmount = 0;
  rows.forEach((row) => {
    const amount = parseFloat(row.querySelector("[name='row_amt[]']").value) || 0;
    totalAmount += amount;
  });

  var amt_row_total = totalAmount;
  var total_input = parseFloat(amt_row_total) || 0;
  var disamt1 = parseFloat(document.getElementById("discount").value) || 0;
  var paramt = parseFloat(document.getElementById("other-charges").value) || 0;
  var ttl_amt = parseFloat((total_input + paramt) - disamt1) || 0;
  var totalgstamt = parseFloat(document.getElementById("gstamt").value) || 0;
  const netamount = parseFloat((ttl_amt + totalgstamt));
  const netamount1 = Math.round(netamount);
  const rndoff = netamount1 - netamount;
  console.log(netamount1);
  console.log(rndoff);
  document.getElementById("total").value = amt_row_total.toFixed(2);
  document.getElementById("tax-amt").value = ttl_amt.toFixed(2);
  // document.getElementById("fnet").value = netamount1.toFixed(2);
  // document.getElementById("rnd-off").value = rndoff.toFixed(2);
  // document.getElementById("gstamt").value = totalgstamt.toFixed(2);
  gst_cal();
}

//====

function updateTime() {
  // Get the current time
  var currentTime = new Date();

  // Format the time as desired (e.g., HH:MM:SS)
  var formattedTime = currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();

  // Set the formatted time to the input field
  document.getElementById("currentTime").value = formattedTime;
}

// Call updateTime initially to set the time immediately
updateTime();

// Update the time every second (1000 milliseconds)
setInterval(updateTime, 1000);


const edit_input = document.getElementById('edit_input');

edit_input.addEventListener('change', function (event) {
  const selectedOption = event.target.value;
  const datalistOptions = document.getElementById('acname');

  const options = datalistOptions.getElementsByTagName('option');
  for (let i = 0; i < options.length; i++) {
    const option = options[i];
    const optionValue = option.value;

    if (optionValue === selectedOption) {
      var selectedAcid = option.getAttribute('data-acid'); // Assign value to selectedAcid

      document.getElementById("edit_input_hidden").value = selectedAcid;
      console.log('edit_input value ->', edit_input.value)
      console.log('hidden id ->', selectedAcid)
      break;
    }
  }

});
function show_form_det() {

  var id = document.getElementById('edit_input_hidden').value;

  $.ajax({
    url: 'fetch/fetch_cust_hd.php',
    method: 'POST',
    data: {
      id: id
    },
    dataType: 'json',
    success: function (item) {
console.table('cust hd',item);
            
      document.getElementById('booking_id').value = item.booking_id;

      document.getElementById('resp').value = item.resp;
      document.getElementById('cust_name').value = item.cust_name;
      document.getElementById('dob').value = item.dob;
      document.getElementById('email').value = item.email;
      document.getElementById('mbl_no').value = item.mbl_no;
      document.getElementById('add1').value = item.add1;
      document.getElementById('city').value = item.city;
      document.getElementById('state').value = item.states;
      document.getElementById('country').value = item.country;
      document.getElementById('gst_no').value = item.gst_no;
      document.getElementById('purpose').value = item.purpose;
      document.getElementById('photo').innerText = item.photo;
      document.getElementById('per_proof').innerText = item.per_proof;
      document.getElementById('per_proof_no').value = item.per_proof_no;
      document.getElementById('check_in_date').value = item.check_in_date;
      document.getElementById('checkout_no').value = item.checkout_no;
      document.getElementById('check_out_date').value = item.check_out_date;
      document.getElementById('adult').value = item.adult;
      document.getElementById('male').value = item.male;
      document.getElementById('female').value = item.female;
      document.getElementById('child').value = item.child;
      document.getElementById('gst_h_input').value = 12;
      document.getElementById('igst').value = item.igst;
      document.getElementById('r_sgst').value = item.sgst;
      document.getElementById('r_cgst').value = item.cgst;
      document.getElementById('total').value = item.total;
      document.getElementById('discount').value = item.discount;
      document.getElementById('other-charges').value = item.other_charges;
      document.getElementById('tax-amt').value = item.tax_amt;
      document.getElementById('gstamt').value = item.gst_amt;
      document.getElementById('rnd-off').value = item.round_off;
      document.getElementById('fnet').value = item.net_amt;
      fetch_cust_det();
      document.getElementById('save').style.display = 'none';
      document.getElementById('update').style.display = 'block';
      document.querySelector('.modal').style.display = 'none';

    }
  });
}

document.getElementById('update').style.display = 'none';



function fetch_cust_det() {
  // alert('ok')
  var id = document.getElementById("edit_input_hidden").value;
  $.ajax({
    url: 'fetch/fetch_cust_det.php',
    method: 'POST',
    data: { id: id },
    dataType: 'json',
    success: function (work) {
      // console.log('cust det',work);

      //-------------------
      let table_body = document.getElementById("table-body");
      let maxrec = work.length;

      // Remove all rows except the last one
      while (table_body.rows.length > 1) {
        table_body.deleteRow(0);
      }
      //-------------------

      work.forEach(function (invoice, index) {
        console.table('inv det', invoice);
        const table = document.getElementById("invoice-table"); // Replace with your table ID
        const lastRow = table.rows[table.rows.length - 1]; // Get the last row

        // Populate the last row with your data
        lastRow.querySelector("[name='room_type[]']").value = invoice.room_type;
        lastRow.querySelector("[name='no_of_days[]']").value = invoice.no_of_days;
        lastRow.querySelector("[name='room_no[]']").value = invoice.room_no;
        lastRow.querySelector("[name='room_price[]']").value = invoice.rent_per_day;
        lastRow.querySelector("[name='row_amt[]']").value = invoice.row_amt;

        if (index < maxrec - 1) {
          addRow();
        }
        //-------------------------
      });
    }
  });
}


// document.getElementById('edit_form').addEventListener('click', function edit_form() {
//   document.getElementById('edit_form_modal').style.display = 'block';
  
// })

// Get the modal element
var modal = document.querySelector('.modal');

// Get the button that opens the modal
var btn = document.querySelector('#edit_form');

// Get the <span> element that closes the modal
var span = document.querySelector('.close');

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = 'block';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = 'none';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}
