
  // Add event listener to room_type select element
  document.getElementById("room_type").addEventListener("change", function() {
    var roomTypeSelect = document.getElementById("room_type");
    console.log(roomTypeSelect.value);
});




function dis_price() {

    id = document.getElementById("room_type").value;
  
    $.ajax({
      url: 'fetch/fetch_room_price.php',
      method: 'POST',
      data: {
        id: id
      },
      dataType: 'json',
      success: function (cust) {
        console.log(cust);
        var myData = cust.price;
        console.log(myData);
  
        document.getElementById("room_rent").value = cust.price;
        document.getElementById("gst_h_input").value = cust.gst;
      
      }
    });
    
  }


  document.getElementById("room_type").addEventListener('blur',function gst_cal() {
    var roomRent = parseFloat(document.getElementById("room_rent").value);
    var gst_h_input = parseFloat(document.getElementById("gst_h_input").value);
  
    var split_gst = gst_h_input / 2;
    var sgst = (roomRent / 100) * split_gst;
    var cgst = sgst;
  
    document.getElementById("r_sgst").value = sgst.toFixed(2);
    document.getElementById("r_cgst").value = cgst.toFixed(2);
  
    var totalRent = roomRent + sgst + cgst;
    document.getElementById("r_ttl_rent").value = totalRent.toFixed(2);
  });
  // document.getElementById("r_ttl_rent").value = 0.00;
  // document.getElementById("r_sgst").value = 0.00;
  //   document.getElementById("r_cgst").value = 0.00;

  //   function gst_cal() {

  //     var roomRent = parseFloat(document.getElementById("room_rent").value);
  //     var gst_h_input = parseFloat(document.getElementById("gst_h_input").value);
    
  //     var split_gst = gst_h_input / 2;
  //     var sgst = (roomRent / 100) * split_gst;
  //     var cgst = sgst;
    
  //     document.getElementById("r_sgst").value = sgst.toFixed(2);
  //     document.getElementById("r_cgst").value = cgst.toFixed(2);
    
  //     var totalRent = roomRent + sgst + cgst;
  //     document.getElementById("r_ttl_rent").value = totalRent.toFixed(2);
  //   }

