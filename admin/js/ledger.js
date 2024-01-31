// function getcrdr(){
//   var crdr = document.getElementById('count').value;
//   console.log(crdr);
// }

//===========================
// function getgstn() {
//   const sup_key = "fa2ef6b4-2e3e-4c61-94d0-276296d8f966";
//   gstin_val = document.getElementById("gst").value;
//   $.ajax({
//       url: 'https://einv.dsserp.in/trial/api/invoice/DetailsByGstin',
//       method: 'GET',
//       data: {
//           'dss-Subscription-Key': sup_key, // Use quotes around property name
//           gstin: gstin_val
//       },
//       dataType: 'json',
//       success: function (cust) {
//           console.log(cust);
//       }
//   });
// }
//----------------------------------------------------------------------------




// async function getGstinDetails1(gstin, chkGSTIN) {
//   const subkey = "fa2ef6b4-2e3e-4c61-94d0-276296d8f966";
//   const url = `https://einv.dsserp.in/prod/api/invoice/GetGstinDetails?chkGSTIN=${chkGSTIN}`;

//   try {
//       const response = await fetch(url, {
//           method: 'GET',
//           headers: {
//               'dss-Subscription-Key': subkey,
//               'gstin': gstin
//           }
//       });

//       const decodedResponse = await response.json();
//       return decodedResponse;
//   } catch (error) {
//       const payer = {
//           status: "0",
//           ErrorDetails: []
//       };

//       const errorDetails = {
//           ErrorCode: "dss001",
//           ErrorMessage: error.message
//       };

//       payer.ErrorDetails.push(errorDetails);

//       return payer;
//   }
// }
// //-----------------------------------------------------------
// function searchGSTIN() {
//   const ourGstin = "33AADFF5524B1Z2";
//   const custGstin = document.getElementById("gst").value;
//   let res = getGstinDetails1(ourGstin,custGstin);
//   console.log(res);
// }
// //------------------------------------------------------------------
// function searchGSTN() {
//   const sup_key = "fa2ef6b4-2e3e-4c61-94d0-276296d8f966";
//   const gstin_val = document.getElementById("gst").value;

//   // Define the request data object
//   const requestData = {
//     "dss-Subscription-Key": sup_key,
//     "gstin": gstin_val
//   };

//   $.ajax({
//     url: 'https://einv.dsserp.in/trial/api/invoice/DetailsByGstin',
//     method: 'GET',
//     data: requestData,
//     dataType: 'json',
//     success: function (response) {
//       // Handle the response data here
//       console.log(response);
//       if (response.Status === 'ACT') {
//         // GSTIN is active, you can access other data in 'response.Data'
//         console.log('GSTIN is active.');
//         console.log('GSTIN Data:', response.Data);
//       } else if (response.Status === 'CNL') {
//         // GSTIN is cancelled
//         console.log('GSTIN is cancelled.');
//       } else {
//         // Handle other statuses or errors
//         console.log('Error: ', response.ErrorMessage);
//       }
//     },
//     error: function (error) {
//       // Handle any AJAX request errors here
//       console.error('Error:', error);
//     }
//   });
// }



document.getElementById("acid").value;

function handleEnterKey(event, nextElementId) {
  //console.log('yes');
  if (event.key === 'Enter') {
    event.preventDefault();
    const nextElement = document.getElementById(nextElementId);
    nextElement.focus();
  }
}


const txtacnam = document.getElementById("ac_nam");

txtacnam.addEventListener('blur', handleLostFocus);

function handleLostFocus() {
  const bankacname = document.getElementById("bank_acname");
  const printname = document.getElementById("forme");

  if (bankacname.value === "") {
    bankacname.value = (txtacnam.value).toUpperCase();
  }
  if (printname.value === "") {
    printname.value = (txtacnam.value).toUpperCase();
  }

}

const input = document.getElementById('grpnames');

input.addEventListener('input', function (event) {
  const selectedOption = event.target.value;
  const datalistOptions = document.getElementById('grpname');

  const options = datalistOptions.getElementsByTagName('option');
  for (let i = 0; i < options.length; i++) {
    const option = options[i];
    const optionValue = option.value;

    if (optionValue === selectedOption) {
      var selectedAcid = option.getAttribute('data-grpid'); // Assign value to selectedAcid

      document.getElementById("grpid").value = selectedAcid;
      console.log(selectedAcid)
      break;
    }
  }
  var id = document.getElementById("grpid").value;
  //  console.log(id);
  //console.log(input.value);
});


const eacname = document.getElementById('acnames');

eacname.addEventListener('change', function (event) {
  const selectedOption = event.target.value;
  const datalistOptions = document.getElementById('acname');

  const options = datalistOptions.getElementsByTagName('option');
  for (let i = 0; i < options.length; i++) {
    const option = options[i];
    const optionValue = option.value;

    if (optionValue === selectedOption) {
      var selectedAcid = option.getAttribute('data-acid'); // Assign value to selectedAcid

      document.getElementById("acid").value = selectedAcid;

      break;
    }
  }
  var id = document.getElementById("acid").value;
  console.log(id);
  console.log(eacname.value);
});


function funedit() {
  document.getElementById("yModal").style.display = "block";
}

function funclose() {
  document.getElementById("yModal").style.display = "none";
}

function fundisplay() {
  document.getElementById("yModal").style.display = "none";
  // const select = document.getElementById("ledger_nam");
  // console.log(select.value);
  id = document.getElementById("acid").value;

  $.ajax({
    url: 'fetch/ac_fetch.php',
    method: 'POST',
    data: {
      id: id
    },
    dataType: 'json',
    success: function (cust) {
      console.log(cust);
      var myData = cust.gstin;
      console.log(myData);
      // var myData = row.otpno;

      document.getElementById("ac_nam").value = cust.ac_name;
      document.getElementById("grpnames").value = cust.ac_grp_nam;
      var ac_opb = parseFloat(cust.ac_op_bal);

      if (ac_opb < 0) {
        var selectElement = document.getElementById('count');
        // Set the value of the select element
        selectElement.value = 'dr';
        // Trigger a change event to notify any listeners
        var event = new Event('change');
        selectElement.dispatchEvent(event);
      } else {
        var selectElement = document.getElementById('count');
        // Set the value of the select element
        selectElement.value = 'cr';
        // Trigger a change event to notify any listeners
        var event = new Event('change');
        selectElement.dispatchEvent(event);
      }


      document.getElementById("ac_op_bal").value = Math.abs(cust.ac_op_bal);
      document.getElementById("gst").value = cust.gstin;
      document.getElementById("pan").value = cust.pan;
      document.getElementById("bank_acname").value = cust.bank_ac_nam;
      document.getElementById("bank_acno").value = cust.bank_ac_no;
      document.getElementById("ifsc").value = cust.bank_ifsc;
      document.getElementById("bank_name").value = cust.bank_nam;
      document.getElementById("bank_brnch").value = cust.bank_branch;
      document.getElementById("ac_cr_days").value = cust.ac_cr_days;
      document.getElementById("ac_cr_limt").value = cust.ac_cr_limt;
      document.getElementById("forme").value = cust.print_name;
      document.getElementById("billwise").value = cust.billwise;
      document.getElementById("add1").value = cust.add1;
      document.getElementById("area").value = cust.area;
      document.getElementById("location").value = cust.location;

      document.getElementById("pin").value = cust.pin;
      document.getElementById("contact-no").value = cust.ph;
      document.getElementById("email-id").value = cust.email;
      document.getElementById("cell-no").value = cust.cell;
      document.getElementById("person_name").value = cust.person_name;
      document.getElementById("person_cell").value = cust.person_cell;
      document.getElementById("acid").value = cust.id;
      document.getElementById("grpid").value = cust.grpid;

    }
  });
  //  window.location.href = "./index.html";
}

function formsave() {
  document.getElementById("frmacct").submit();
  console.log("saved")
  console.log(document.getElementById("acid").value);
}