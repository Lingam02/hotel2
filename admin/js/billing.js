
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
  const netamount = parseFloat((ttl_amt + totalgstamt ));
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