<div class="bg-dark py-5 px-5 rounded-2">
  <p class="h4 text-uppercase">Order summary</p>
  <hr>
  <div class="row">
    <div class="row mb-2">
      <div class="col-6">Suit Code</div>
      <div class="col-6"><span id="suitCode"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Product</div>
      <div class="col-6"><span id="customize_category_id"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Package</div>
      <div class="col-6"><span id="package"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Style</div>
      <div class="col-6"><span id="style"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Fabric</div>
      <div class="col-6"><span id="texture"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Jacket</div>
      <div class="col-6"><span id="jacketName"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Vest</div>
      <div class="col-6"><span id="vestName"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Pant</div>
      <div class="col-6"><span id="pantName"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Cost</div>
      <div class="col-6">$ <span id="suitTotal"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Shipping Fee</div>
      <div class="col-6">$ <span id="shipping_fee"></span></div>
    </div>
    <div class="row mb-2">
      <div class="col-6">Tax</div>
      <div class="col-6">$ 2</div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-6">
      <p class="mb-2">Total</p>
    </div>
    <div class="col-6">
      <p class="mb-2">$ <span id="total"></span></p>
    </div>
  </div>

    <div id="paypal-button-container"></div>


</div>
@push('script_tag')


<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=ATCq7eYmZSx55GfZFkLJlY4WZSX1aCZxQjm1DHi3kHA1eAyYqAiRiuYDwjZvxLhlTzi9mn_7N2y1x-bK&currency=USD&disable-funding=paylater" data-sdk-integration-source="button-factory" data-namespace="paypal_sdk"></script>

<script>
    // start user chosen data show in order summary
    $(document).ready(() => {
      choosen_order();
    });
    function choosen_order(){
      //start product
      if(sessionStorage.getItem('customize_category_id') == 1)
      {
          $('#customize_category_id').html("Jacket");
          $('#customize_category_id_mo').html("Jacket");
      }
      else if(sessionStorage.getItem('customize_category_id') == 2)
      {
        $('#customize_category_id').html("Vest");
        $('#customize_category_id_mo').html("Vest");
      }
      else if(sessionStorage.getItem('customize_category_id') == 3)
      {
        $('#customize_category_id').html("Pant");
        $('#customize_category_id_mo').html("Pant");
      }
      else if(sessionStorage.getItem('customize_category_id') == 9)
      {
        $('#customize_category_id').html("Suit");
        $('#customize_category_id_mo').html("Suit");
      }
      //end product
      $.ajax({
      type: 'POST',
      url: '/get_order_summary_data',
      data: {
        "_token": "{{csrf_token()}}",
        "package_id":sessionStorage.getItem('package_id'),
        "style_id" : sessionStorage.getItem('style_id'),
        "texture_id":sessionStorage.getItem('texture_id'),
        "jacket_id": sessionStorage.getItem('jacket_id'),
        "vest_id": sessionStorage.getItem('vest_id'),
        "pant_id": sessionStorage.getItem('pant_id'),
      },
      success: function (data) {
        if(data.package_name != null)
        {
          $('#package').html(data.package_name);
          $('#package_mo').html(data.package_name);
        }
        else
        {
          $('#package').html("-");
          $('#package_mo').html("-")
        }

        if(data.style_name != null)
        {
          $('#style').html(data.style_name);
          $('#style_mo').html(data.style_name)
        }
        else
        {
          $('#style').html('-');
          $('#style_mo').html('-')
        }

        if(data.texture_name != null)
        {
          $('#texture').html(data.texture_name);
          $('#texture_mo').html(data.texture_name)
        }
        else
        {
          $('#texture').html('-');
          $('#texture_mo').html(data.texture_name)
        }

        if(data.jacket_name != null)
        {
          $('#jacketName').html(data.jacket_name);
          $('#jacketName_mo').html(data.jacket_name)
        }
        else
        {
          $('#jacketName').html('-');
          $('#jacketName_mo').html('-')
        }

        if(data.vest_name != null)
        {
          $('#vestName').html(data.vest_name);
          $('#vestName_mo').html(data.vest_name)
        }
        else
        {
          $('#vestName').html('-');
          $('#vestName_mo').html('-')
        }

        if(data.pant_name != null)
        {
          $('#pantName').html(data.pant_name);
          $('#vestName_mo').html('-');
        }
        else
        {
          $('#pantName').html('-');
          $('#pantName_mo').html('-')
        }

      }
      });
    }
    // end user chosen data show in order summary
    var user_id = @json($user);
    // Render the PayPal button into #paypal-button-container
    paypal_sdk.Buttons({
        // Call your server to set up the transaction
        createOrder: function(data, actions) {
            return fetch('{{route("paypal.create")}}', {
                method: 'post',
                headers: {
                  "Content-Type": "application/json",
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body:JSON.stringify({
                    "cart"  : 0,
                    "user_id" : user_id,
                    "suit_code" : sessionStorage.getItem('suit_code'),
                    "cus_cate_id" : sessionStorage.getItem('customize_category_id'),
                    "package_id" : sessionStorage.getItem('package_id'),
                    "style_id" : sessionStorage.getItem('style_id'),
                    "pant_id" : sessionStorage.getItem('pant_id'),
                    "jacket_id" : sessionStorage.getItem('jacket_id'),
                    "vest_id" : sessionStorage.getItem('vest_id'),
                    "texture_id" : sessionStorage.getItem('texture_id'),
                    "suit_piece" : sessionStorage.getItem('suit_piece'),
                    "jacket_in" : sessionStorage.getItem('jacket_in'),
                    "vest_in" : sessionStorage.getItem('vest_in'),
                    "pant_in" : sessionStorage.getItem('pant_in'),
                    "shipping_id" : sessionStorage.getItem('shipping_id'),
                    "shipping_price" : sessionStorage.getItem('shipping_price'),
                    "fitting" : sessionStorage.getItem('fitting'),
                    "suit_total" : sessionStorage.getItem('cus_total_price'),
                    "address" : sessionStorage.getItem('address'),
                })
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                return orderData.payorder.id;
            });
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            return fetch("{{ route('paypal.processTransaction')}}", {
                method: 'post',
                headers: {
                  "Content-Type": "application/json",
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body:JSON.stringify({
                  orderId : data.orderID
              })
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                // Three cases to handle:
                //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                //   (2) Other non-recoverable errors -> Show a failure message
                //   (3) Successful transaction -> Show confirmation or thank you

                // This example reads a v2/checkout/orders capture response, propagated from the server
                // You could use a different API or structure for your 'orderData'
                var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                    return actions.restart(); // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                }

                if (errorDetail) {
                    var msg = 'Sorry, your transaction could not be processed.';
                    if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                    if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                    return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                }

                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                const element = document.getElementById('paypal-button-container');
                element.innerHTML = '';
                element.innerHTML = '<p>Thank you for your payment!</p>';

                $('#step_title').html('Order confirmed');
                $('#step' + 6).addClass('d-none');
                $('#ind' + 7).addClass('indicator-select')
                $('#step' + 7).removeClass('d-none');
                $('#step' + 7).addClass('d-block');
                $('#step_no').html(7);
                $('#back').hide();

                //delete temporary start

                $.ajax({
                  type: 'POST',
                  url: '/delete_customize_step_data',
                  data: {
                    "_token": "{{csrf_token()}}",
                    "temporary_id": sessionStorage.getItem('has_step'),
                  },
                  success: function (data) {
                    sessionStorage.clear();
                  }
              });

           

            });
        }

    }).render('#paypal-button-container');

</script>
@endpush
