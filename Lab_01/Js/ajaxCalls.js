const pay = document.getElementById('pay');

const email = document.getElementById('email').value;
const amount = document.getElementById('amount').value;

pay.addEventListener('submit',payWithPaystack,false)

function payWithPaystack(e){

  e.preventDefault();

  // e.preventDefault(e);
  let handler = PaystackPop.setup({
    key: 'pk_test_ebe131dfc1b732bcaa101790b8a935f27b9ebed5',
    email: email,
    amount: amount+"00",
    currency : "GHS",
    // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // metadata: {
    //    custom_fields: [
    //       {
    //           display_name: "Mobile Number",
    //           variable_name: "mobile_number",
    //           value: "+2348012345678"
    //       }
    //    ]
    // },
    callback: function(response){
        // alert('success. transaction ref is ' + response.reference);
          window.location = "./verify_payment.php?ref="+response.reference+"&amount="+amount;
    },
    onClose: function(){
        alert('window closed');

    }
  });
  handler.openIframe();
}




// function payWithPaystack(){
//
//    var handler = PaystackPop.setup({
//      key: 'pk_test_ebe131dfc1b732bcaa101790b8a935f27b9ebed5',
//      email: 'customer@email.com',
//      amount: 10000,
//       // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
//      metadata: {
//         custom_fields: [
//            {
//                display_name: "Isaac",
//                variable_name: "mobile_number",
//                value: "+2348012345678"
//            }
//         ]
//      },
//      callback: function(response){
//          alert('success. transaction ref is ' + response.reference);
//      },
//      onClose: function(){
//          alert('window closed');
//      }
//    });
//    handler.openIframe();
//  }

function addItemToCart(prod_id, qty){
  // alert(prod_id)
    var endpoint =  "../controllers/cart_controller.php?prod_id="+prod_id+"&qty="+qty+"&type=add";


    // TODO : add flash-message to product.php.

  $.ajax({
    type:"GET",
    url:endpoint,
    success: function(data){
      var msg = data.hasOwnProperty('message');
      setInterval('location.reload()', 100);
      // console.log(data);
      var dt = "Item already in cart";
      if (data == dt) {
        swal("Oops!", `${data}`, "error")
      }else{
        swal("Good job!", `${data}`, "success")
      }

    },
    error: (err)=>console.log(err)
  })
}









function removeCartItem(prod_id){
  // alert(prod_id)
    var endpoint =  "../controllers/cart_controller.php?prod_id="+prod_id+"&qty="+"&type=delete";

  $.ajax({
    type:"GET",
    url:endpoint,
    success: function(data){
      var msg = data.hasOwnProperty('message');
      // console.log(data);
      var dt = "Item already in cart";
      setInterval('location.reload()', 100);
      if (data == dt) {
        swal("Oops!", `${data}`, "error")
      }else{
        swal("Good job!", `${data}`, "success")
      }

    },
    error: (err)=>console.log(err)
  })

}

function updateCartItemQty(prod_id){

  // alert(prod_id);
    var qty = document.getElementById("update-qty").value;
    // alert(qty);
    if(qty < 0){
        document.getElementById("qty_span").innerHTML = 'quantity cannot be negative';
        window.setTimeout(function(){location.href="shoppingCart.php"},1000);
    }else {
      var endpoint =  "../controllers/cart_controller.php?prod_id="+prod_id+"&qty="+qty+"&type=update";

      $.ajax({
        type:"GET",
        url:endpoint,
        success: function(data){
          // document.getElementById("total").innerHTML = 'quantity cannot be negative';
          // var msg = data.hasOwnProperty('message');
          // console.log(data);
          var dt = "Item already in cart";
          setInterval('location.reload()', 100);
          if (data == dt) {
            swal("Oops!", `${data}`, "error")
          }else{
            swal("Good job!", `${data}`, "success")
          }

        },
        error: (err)=>console.log(err)
      })

    }


}


function addItemToCartIndex(prod_id, qty){
    var isOkay = true;
    var xhttp;
    if(qty != 1){
        qty = document.getElementById("qty").value;
        if(qty.length == 0){
            isOkay = false;
         document.getElementById("cartResponse").innerHTML = "Please enter a quantity";
        }
    }
    if(isOkay){
        if (window.XMLHttpRequest) {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
        xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            var jsonResponse = JSON.parse(this.responseText);
            if (jsonResponse[0].status == 'success'){
               document.getElementById("cartResponse").style.color = 'green';
               document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
               window.setTimeout(function(){location.reload()},1500);
            } else if (jsonResponse[0].status == 'failed'){
              document.getElementById("cartResponse").style.color = 'red';
              document.getElementById("cartResponse").innerHTML = " " + jsonResponse[0].message;
                window.setTimeout(function(){location.reload()},1000);
            } else{
                console.log(jsonResponse[0].message);
            }
        }
    };
    xhttp.open("GET", "./controller/cart_controller.php?prod_id="+prod_id+"&qty="+qty+"&type=add", true);
    xhttp.send();

    }
}
