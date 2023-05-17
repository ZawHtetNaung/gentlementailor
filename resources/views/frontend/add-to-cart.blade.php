@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/add-to-cart.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')

  <section class="cart">
    <!--Breadcrumb-->
    <input type="hidden" style="color:black" id="total">
    <input type="hidden" style="color:black" id="order_id">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class=""><a href="#"><i class='bx bx-arrow-back'></i></a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
      </ol>
    </nav>
    <div class="cart__title-wrapper">
      <h1 class="cart__title">here is your cart</h1>
      <a href="#" class="cart__remove" id="remove_all">remove all</a>
    </div>
    <div class="cart__body-wrapper">
      <div class="row g-5">
        <div class="col-12 col-md-12 col-lg-8 cart__item-detail">
          <div class="row cart__items-title">
            <div class="col-5">
              <p class="cart__item-title">Product</p>
            </div>
            <div class="col-2">
              <p class="cart__item-title text-center">Price</p>
            </div>
            <div class="col-3">
              <p class="cart__item-title text-center">Quantity</p>
            </div>
            <div class="col-2">
              <p class="cart__item-title text-center">Total</p>
            </div>
          </div>
          <!--Loop Below Div-->
          <div class="row cart__item my-2" id="cart_space">
          </div>
          <!--End Loop Div-->
        </div>
        <div class="col-12 col-md-12 col-lg-4">
          <h1 class="cart__title">CART TOTAL</h1>
          <div class="total__items" id="total_item_space">

            <hr>
          </div>
          <div class="cart__total">
            <p class="total__item-name">TOTAL</p>
            <p class="total__item-price">$<span id="total_space"></span></p>

          </div>
          <div class="cart__total my-5">
            <p class="col-md-3">Address : </p>
            @if(!empty($user_info))
               <textarea type="text" class="form-control" rows="2" id="order_address" autofocus onkeyup="store_address(this.value)">{{$user_info->city}} {{$user_info->tsp_street}}</textarea>
            @else
                <textarea type="text" class="form-control" rows="2" id="order_address" autofocus></textarea>
            @endif
          </div>
        </div>
      </div>

      <div class="checkout__wrapper">
        <div>
          <div class="paypal_space">
            <div id="paypal-button-container"></div>
          </div>
          <p class="checkout__info">(delivery fees will include in checkout)</p>
          <button class="btn bg-gold rounded-1 text-uppercase" id="show_paypal" onclick="available_payment()">process to checkout</button>
        </div>
      </div>
    </div>
  </section>

  @include('layouts/footer')
@endsection
@section('js')
  <script>
    // For see more see less
    function store_address(value)
    {
      sessionStorage.setItem('address',value);
      $("#paypal-button-container").hide();
    }

    function available_payment() {

      if(sessionStorage.getItem('address') != null && sessionStorage.getItem('address') != ''){
        if($('#total').val() == ''){
          swal({
              title: "Error",
              text : "Nothing to checkout in cart",
              icon : "error",
          });
          $("#paypal-button-container").hide();
        } else {

          $("#paypal-button-container").show();
        }
      }else{
        swal({
            title: "Error",
            text : "Need to fill Address",
            icon : "error",
        }).then(function() {
        });
        $("#paypal-button-container").hide();
      }

    }
    
    $(document).ready(function () {
      var user_id = @json($user_id);

      var user_info = @json($user_info);
      if(user_info.city == null)
      {
        var user_city = '';
      }
      else
      {
        var user_city = user_info.city;
      }
      if(user_info.tsp_street == null)
      {
        var user_tsp = '';
      }
      else
      {
        var user_tsp = user_info.tsp_street;
      }
      var address = user_city+' '+user_tsp;
      if(user_info.city != null || user_info.tsp_street != null)
      {
        sessionStorage.setItem('address',address);
      }

      // alert(user_id);
      var grandTotal = localStorage.getItem('grandTotal');

      var grandTotal_obj = JSON.parse(grandTotal);
      if(grandTotal_obj != null)
      {
      if(grandTotal_obj.length>=0){
        // alert("in");
        $.each(grandTotal_obj,function(i,v){
          if(v.id == user_id)
          {
            // alert(v.sub_total);
            $('#total').val(v.sub_total);
          }
        });
      }
      }

      $('.paypal_space').hide();
      var showChar = 80;
      var ellipsestext = "...";
      var moretext = "See More";
      var lesstext = "See Less";
      $('.more').each(function () {
        var content = $(this).html();

        if (content.length > showChar) {

          var c = content.substr(0, showChar);
          var h = content.substr(showChar - 1, content.length - showChar);

          var html = c + '<span class="moreelipses">' + ellipsestext + '</span><span class="morecontent"><span>' + h + '</span><a href="" class="morelink">' + moretext + '</a></span>';

          $(this).html(html);
        }

      });

      $(".morelink").click(function () {
        if ($(this).hasClass("less")) {
          $(this).removeClass("less");
          $(this).html(moretext);
        } else {
          $(this).addClass("less");
          $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
      });
    });


    $(document).ready(function(){
      var user_id = @json($user_id);
      showmodal(user_id);
    });


    function showmodal(user_id){

      var mycart = localStorage.getItem('mycart');

      console.log(mycart)

      var grandTotal = localStorage.getItem('grandTotal');

      var grandTotal_obj = JSON.parse(grandTotal);

      if(mycart){

          var mycartobj = JSON.parse(mycart);

          console.log(mycartobj)

          var html='';
          var html_total_item = '';

          if(mycartobj.length>0){
            $.each(mycartobj,function(i,v){
                if(v.id == user_id)
                {


                  var each_sub_total = v.qty * v.price;
                  // <i class="fa fa-plus-circle btnplus font-18" onclick="plusfive(${id})" id="${id}"></i>
                  // <i class="fa fa-minus-circle btnminus font-18   "  onclick="minusfive(${id})" id="${id}"></i>
                  html+=`<div class="col-5 my-4">
                    <div class="cart__item-info row g-2 g-md-4 g-lg-5">`
                      if(v.type == 'additional')
                      {
                      html+=`<div class="col-4">
                        <img src="{{asset('/assets/images/categories/additional/${v.photo}')}}" alt="cart img">
                      </div>`
                      }
                      else if(v.type == 'ready')
                      {
                        html+=`<div class="col-4">
                          <img src="{{asset('/assets/images/categories/ready/${v.photo}')}}" alt="cart img">
                        </div>`
                      }
                      html+=`
                      <div class="col-8">
                        <p class="cart__product-title more">
                          ${v.item_name}
                          </p>

                      </div>
                    </div>
                  </div>
                  <div class="col-2 my-4">
                    <p class="cart__item-price text-center">$ ${v.price}</p>
                  </div>
                  <div class="col-3 my-4">
                    <div class="count__wrapper">
                      <div class="count__wrapper-decrease" id="btn_minus_${v.item_id}">
                        <i class='bx bx-chevron-left' onclick="minus(${v.id},${v.item_id})"></i>
                      </div>
                      <div class="count__wrapper-count">
                        <input type="number" class="form-control" value="${v.qty}">
                      </div>
                      <div class="count__wrapper-increase" id="btn_plus_${v.item_id}">
                        <i class='bx bx-chevron-right' onclick="plus(${v.id},${v.item_id})"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 my-4">
                    <p class="cart__item-total text-center">$ ${each_sub_total}</p>
                  </div>
                `;

                  html_total_item += `
                  <div class="total__item">
                    <p class="total__item-name">${v.item_name}</p>
                    <p class="total__item-price">$ ${each_sub_total}</p>
                  </div>
                  </hr>
                  `;

                }
              });
          }
          $("#cart_space").html(html);
          $("#total_item_space").html(html_total_item);
      }
      //start total
      if(grandTotal){
      var html_total = '';

      if(grandTotal_obj.length>0){

          $.each(grandTotal_obj,function(i,v){
            if(v.id == user_id)
            {


              // var each_sub_total = v.qty * v.price;
              // <i class="fa fa-plus-circle btnplus font-18" onclick="plusfive(${id})" id="${id}"></i>
              // <i class="fa fa-minus-circle btnminus font-18   "  onclick="minusfive(${id})" id="${id}"></i>
              html_total+=`
              ${v.sub_total}
              `;

            }
          });
      }
      $("#total_space").html(html_total);
      }
      //end total
    }

    function plus(user_id,item_id){
     count_change(user_id,item_id,'plus',1);
    }

    function minus(user_id,item_id){
    count_change(user_id,item_id,'minus',1);
    }


    function count_change(user_id,item_id,action,qty){

      var grand_total = localStorage.getItem('grandTotal');

      var mycart=localStorage.getItem('mycart');

      var mycartobj=JSON.parse(mycart);

      var grand_total_obj = JSON.parse(grand_total);

      var item = mycartobj.filter(item =>item.id == user_id && item.item_id == item_id);
      var total = grand_total_obj.filter(total => total.id == user_id);

      if( action == 'plus'){

          if (item[0].qty == item[0].current_qty) {

              swal({
                  title:"Can't Add",
                  text:"Can't Added Anymore!",
                  icon:"info",
              });

              $('#btn_plus_' + item[0].item_id).attr('disabled', 'disabled');
          } else{

              item[0].qty+=qty;
              item[0].each_sub += parseInt(item[0].price) * qty;
              total[0].sub_total += parseInt(item[0].price)* qty;

              total[0].total_qty += parseInt(qty);

              localStorage.setItem('mycart',JSON.stringify(mycartobj));

              localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));


              showmodal(user_id);
              nav_cart_total_qty()

          }
          location.reload();

      } else if (action == 'minus') {

          if(item[0].qty <= qty){

              swal({
                  title: "Are you sure?",
                  text: "The item will be remove from cart list",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Yes',
                  cancelButtonText: "No",
                  closeOnConfirm: false,
                  closeOnCancel: false
              }).then(
              function(isConfirm){
                  if(isConfirm){
            
                  var total_total = grand_total_obj.filter(total => total.id == user_id);
                  let item_cart = mycartobj.filter(item => item.id !== user_id || item.item_id !== item_id);
                  total_total[0].sub_total =parseInt(total[0].sub_total) - parseInt(item[0].price)*parseInt(qty);
                  total_total[0].total_qty -= parseInt(qty);
   
                  console.log(item_cart);
                  console.log("yes");
                  localStorage.setItem('mycart',JSON.stringify(item_cart));
                  localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));
                  showmodal(user_id);
                  nav_cart_total_qty()
                  $('#total').val(total_total[0].sub_total);
                  location.reload();

              }else{
  
                  item[0].qty;
                console.log("no");
                  localStorage.setItem('mycart',JSON.stringify(mycartobj));

                  localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));



                  showmodal(user_id);
                  nav_cart_total_qty()
                  location.reload();
              }
          });

          }else{
              item[0].qty-=qty;

              total[0].sub_total -= parseInt(item[0].price)*qty;
              item[0].each_sub -= parseInt(item[0].price)*qty;
              total[0].total_qty -=qty ;

              localStorage.setItem('mycart',JSON.stringify(mycartobj));

              localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));

              showmodal(user_id);
              nav_cart_total_qty()
          }
      }
      }

      function nav_cart_total_qty() {
        // start cart qty total to nav
        var grand_total = localStorage.getItem('grandTotal');
        var grand_total_obj = JSON.parse(grand_total);
        $.each(grand_total_obj,function(i,v){
          if(v.id == user_id)
          {
            $('#total_cart_qty').html(v.total_qty);
          }
        });
        // end cart qty total to nav
      }
      $('#show_paypal').click(function(){
        $('.paypal_space').show();
      });

      /** Cart Remove All */
      $('#remove_all').click(function(){
        // alert("rall");
        var user_id = @json($user_id);

        var mycart = localStorage.getItem('mycart');

        var grandTotal = localStorage.getItem('grandTotal');

        var grandTotal_obj = JSON.parse(grandTotal);

        var mycartobj = JSON.parse(mycart);
        var item_cart = mycartobj.filter(item =>item.id != user_id);
        var total = grandTotal_obj.filter(total => total.id != user_id);

        localStorage.setItem('mycart',JSON.stringify(item_cart));
        localStorage.setItem('grandTotal',JSON.stringify(total));
        swal({
          title: "Success!",
          text: "Successfully Removed!",
          icon: "success",
        });
        $('#total_cart_qty').html(0);
        $("#paypal-button-container").hide();
        // nav_cart_total_qty();
        showmodal(user_id);
      });
  </script>

@endsection
@push('script_tag')
<script src="https://www.paypal.com/sdk/js?client-id=AdZk-l57yFvQ7HPHNi2-etRRHUOuHHX0kvy96KqHPkIJ7OKclCPm92nI1ZdBCSzVmlaP3KnBUz2B7ChA&currency=USD&disable-funding=paylater" data-namespace="paypal_sdk"></script>

<script>
    var mycart = localStorage.getItem('mycart');

    console.log(mycart)

    console.log('---------my cart -----------------')

    var grandTotal = localStorage.getItem('grandTotal');

    var grandTotal_obj = JSON.parse(grandTotal);

    console.log(grandTotal_obj)
    console.log('-----------------')

    var mycartobj = JSON.parse(mycart);

    // Render the PayPal button into #paypal-button-container
    var user_id = @json($user_id);

    paypal_sdk.Buttons({

        // Call your server to set up the transaction
        createOrder: function(data, actions) {

          var total = $('#total').val();
            return fetch("{{ route('paypal.create')}}", {
                method: 'post',
                headers: {
                  "Content-Type": "application/json",
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body:JSON.stringify({
                    "cart"  : 1,
                    "cart_item" : mycartobj,
                    "grand_total" : grandTotal_obj,
                    "value" : total,
                    "user_id" : user_id,
                    "address" : sessionStorage.getItem('address')
                })
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
              console.log(orderData);
              console.log('-------------------------------');

              console.log(orderData.payorder.id);
              console.log('-------------------------------');
                $('#order_id').val(orderData.cart_order_id);
                return orderData.payorder.id;
            });
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
          console.log(data)
            return fetch("{{ route('paypal.processTransaction')}}", {
                method: 'post',
                headers: {
                  "Content-Type": "application/json",
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body:JSON.stringify({
                  "orderId" : data.orderID,
                  "address" : sessionStorage.getItem('address')
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
                // Or go to another URL:  actions.redirect('thank_you.html');
                //clear associate localstorate data start

                var grand_total = localStorage.getItem('grandTotal');

                var mycart=localStorage.getItem('mycart');

                var mycartobj=JSON.parse(mycart);

                var grand_total_obj = JSON.parse(grand_total);
                let item_cart = mycartobj.filter(item => item.id !== user_id);
                let total = grand_total_obj.filter(total=> total.id != user_id);
                localStorage.setItem('mycart',JSON.stringify(item_cart));
                localStorage.setItem('grandTotal',JSON.stringify(total));
                showmodal(user_id);
                

                // Clear all session
                sessionStorage.clear();
             
            });
        }

    }).render('#paypal-button-container');

</script>
@endpush
@push('whishlist-nav')
@if(isset(Auth::guard('web')->user()->id))
<script>
    $(document).ready(function(){
      getnavData();
      // whishlist();
      // deletedata();
    });
    function getnavData(){
        var loItem = window.localStorage.getItem('Item');
        var arrayFromStroage = JSON.parse(localStorage.getItem('Item'));
        var arrayLength = arrayFromStroage.length;
        // var count = localStorage.length('Item');
        //  alert(arrayLength);
        var html = "";
        if (loItem != null) {

					itemArr = JSON.parse(loItem);
          $.each(itemArr,function(i,v){
            user_id = `{{Auth::guard('web')->user()->id}}`;
            // alert( window.userID )
          $('#fav-space').html(arrayLength);
          if(v.user_id == user_id)
          {
            $('#wishlist'+v.id).hide();
            $('#delete'+v.id).show();
            // alert("right");
            // html += `${arrayLength}`;
            $('#fav-space').html(arrayLength);
          }else{
            html += parseInt('0');
          }

        });
        // $('#fav-space').html(arrayLength);


          // document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) + 1;

				}else{

				}
    }
</script>
@endif
@endpush
