@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/ready-to-wear.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')

  <section class="ready-to-wear">
<!--    <div class="ready__header text-uppercase text-center my-5">
      <h3 class="ff-mont text-white mb-2">ready to wear</h3>
      <p>here’s the ready to wear suits outfits form us</p>
      <div class="d-flex justify-content-center flex-wrap text-uppercase mt-4">
        <p class="px-3 py-2 mb-2 me-2 me-md-4 bg-dark">Three pieces suits</p>
        <p class="px-3 py-2 mb-2 me-2 me-md-4 bg-dark">two pieces suits</p>
        <p class="px-3 py-2 mb-2 me-2 me-md-4 bg-dark">tuxedo</p>
        <p class="px-3 py-2 mb-2 me-2 me-md-4 bg-dark">summer jackets</p>
        <p class="px-3 py-2 mb-2 me-2 me-md-4 bg-dark">SHIRTS</p>
        <p class="px-3 py-2 mb-2 me-2 me-md-4 bg-dark">pants</p>
      </div>
    </div>-->
    <div class="ready__body mt-3 mt-md-5">
      <div class="row">
        <div class="col-1 col-md-4 p-0 sticky-top">
          <div class="d-flex justify-content-center d-block d-md-none">
            <button class="" data-bs-toggle="offcanvas" data-bs-target="#filter">
              <i class='bx bx-filter ready__icon--sm'></i>
            </button>
          </div>
          <div class="ready__filter d-none d-md-block">
            <h6 class="ff-mont text-white mb-5 text-uppercase ms-2">Filter</h6>
            @include('layouts/ready_filter')
          </div>
        </div>
        <div class="col-11 col-md-8">
          <div class="ready__items row" id="ready_space">
            {{-- @foreach($readys as $ready)
              <div class="col-6 col-lg-4 ready__item" data-bs-toggle="modal"
                   data-bs-target="#myready{{$ready->id}}" onclick="get_swiper({{$ready->id}})">
                <div class="ready__item--img-group">
                  <img src="{{asset("assets/images/categories/ready/$ready->photo_one")}}" alt="">
                  @if(isset(Auth::guard('web')->user()->id))
                    <button id="wishlist{{$ready->id}}" onclick="whishlist('{{Auth::guard('web')->user()->id}}','{{$ready->id}}','{{$ready->photo_one}}','{{$ready->name}}','{{$ready->price}}')">
                    <i class='bx bx-heart'></i>
                    </button>
                    <button id="delete{{$ready->id}}" onclick="deletedata('{{Auth::guard('web')->user()->id}}','{{$ready->id}}','{{$ready->photo_one}}','{{$ready->name}}','{{$ready->price}}')" style="display: none;">
                    <i class='bx bxs-heart'></i>
                    </button>
                    @else
                    <button type="button" class=""
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class='bx bx-heart'></i>
                    </button>
                  @endif
                </div>
                <div class="ready__item--info">
                  <p>{{$ready->name}}</p>
                  <p><strong>$ {{$ready->price}}</strong></p>
                </div>
              </div>
            @endforeach --}}
          </div>
          <div class="auto-load text-center">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink"
                 x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0"
                 xml:space="preserve">
                      <path fill="#000"
                            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                        <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                          dur="1s"
                                          from="0 50 50" to="360 50 50" repeatCount="indefinite"/>
                      </path>
                  </svg>
          </div>
        </div>
      </div>
    </div>
    {{--Mobile Filter--}}
    <div class="offcanvas offcanvas-start text-bg-dark" id="filter">
      <div class="offcanvas-header">
        <h1 class="offcanvas-title ff-mont text-white text-uppercase">Filter</h1>
        <button type="button" class="btn-close btn-close-white me-3"
                data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        @include('layouts/ready_filter')
      </div>
    </div>
    {{-- modal start --}}
    @foreach($popup_readys as $ready)
      <div class="modal fade" id="myready{{$ready->id}}">
        <div
          class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered modal-fullscreen-lg-down">
          <div class="fabric-pop modal-content" style="width: 80rem !important;
        background-color: var(--bg-main);
        padding-inline: 1rem;
        padding-block-end: 2rem;">
            <div class="modal-header border border-0 d-flex">
              <h5 class="ff-mont text-white text-uppercase text-wrap mb-0">
                {{$ready->name}}
              </h5>
              <button type="button" class="btn-close btn-close-white"
                      data-bs-dismiss="modal"></button>

            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 order-2 order-md-1 mt-4 mt-md-0">

                  <p class="small-text mb-3 mb-md-5 text-wrap">{{$ready->description}}</p>
                  <div class="row mb-4 text-uppercase">
                    <div class="col-md-6">
                      <div class="d-flex align-items-center mb-4">
                        <i class="bx bx-check text-gold me-3"></i>
                        <p class="smaller-text">Made in : {{$ready->made_in}}</p>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                        <i class="bx bx-check text-gold me-3"></i>
                        <p class="smaller-text">Price : $ {{$ready->price}}</p>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="d-flex align-items-center mb-4">
                        <i class="bx bx-check text-gold me-3"></i>
                        <p class="smaller-text">composition : {{$ready->composition}}</p>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                        <i class="bx bx-check text-gold me-3"></i>
                        <p class="smaller-text">softness : {{$ready->softness}}</p>
                      </div>
                      {{-- <div class="d-flex align-items-center mb-4">
                        <i class="bx bx-check text-gold me-3"></i>
                        <p class="smaller-text">Price : $ {{$ready->price}}</p>
                      </div> --}}
                    </div>
                  </div>

                  <div class="row mt-5">
                    <div class="col-6 col-md-6">
                      @if(isset(Auth::guard('web')->user()->id))
                        <button class="btn bg-gold-0"
                                onclick="add_to_cart('{{Auth::guard('web')->user()->id}}','{{$ready->id}}','{{$ready->name}}','{{$ready->price}}','{{$ready->photo_one}}','{{$ready->stock_qty}}')">Add To
                          Cart
                        </button>
                      @else
                        <button type="button" class="btn bg-gold-0"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Add To Cart
                        </button>
                      @endif
                    </div>

                  </div>
                </div>
                <div class="col-md-6 order-1 order-md-2" id="swiper-space{{$ready->id}}">

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    @endforeach
  </section>


  @include('layouts/footer')
@endsection
@section('js')
  <script>
    // {{--See more See less filter--}}
    /*$(document).ready(function () {

      //style filter
      var $listElements = $("#style-filter .ready__filter--item .ready__input--group");
      $listElements.hide();
      $listElements.filter(':lt(2)').show();
      $('#style-filter .ready__filter--item')
        .append(`
          <div class="ready__input--group mb-2">
            <span class="load">View More...</span><span class="load less">View less...</span>
          </div>
        `);
      $("#style-filter .ready__filter--item").find('.ready__input--group:last').click(function () {
        $(this).siblings(':gt(1)').toggle(150);
        $(this).find('span').toggle();
      });

      //Fabric filter
      var $listElements = $("#fabric-filter .ready__filter--item .ready__input--group");
      $listElements.hide();
      $listElements.filter(':lt(2)').show();
      $('#fabric-filter .ready__filter--item')
        .append(`
          <div class="ready__input--group mb-2">
            <span class="load">View More...</span><span class="load less">View less...</span>
          </div>
        `);
      $("#fabric-filter .ready__filter--item").find('.ready__input--group:last').click(function () {
        $(this).siblings(':gt(1)').toggle(150);
        $(this).find('span').toggle();
      });

      //Price filter
      var $listElements = $("#price-filter .ready__filter--item .ready__input--group");
      $listElements.hide();
      $listElements.filter(':lt(2)').show();
      $('#price-filter .ready__filter--item')
        .append(`
          <div class="ready__input--group mb-2">
            <span class="load">View More...</span><span class="load less">View less...</span>
          </div>
        `);
      $("#price-filter .ready__filter--item").find('.ready__input--group:last').click(function () {
        $(this).siblings(':gt(1)').toggle(150);
        $(this).find('span').toggle();
      });


    })*/

    {{--See more See less filter--}}
    $(document).ready(function () {

      let stItems = $('#style-filter .ready__filter--item');
      let stMoreBtn = $('#style-filter #see-more');

      let fbItems = $('#fabric-filter .ready__filter--item');
      let fbMoreBtn = $('#fabric-filter #see-more');

      let originStyleHeight = $('#style-filter .ready__filter--item').height();
      let originFabricHeight = $('#fabric-filter .ready__filter--item').height();

      if($('#style-filter .ready__filter--item').height() > 70 || $('#fabric-filter .ready__filter--item').height() > 70 ) {
        $('.ready__filter--item').addClass('initHeight');
      }
      if(originStyleHeight < 80) {
        $('.ready__filter--item').addClass('he-100');
        stMoreBtn.hide();
      }
      if(originFabricHeight < 80) {
        $('.ready__filter--item').addClass('he-100');
        fbMoreBtn.hide();
      }
      stMoreBtn.click(() => {
        stItems.toggleClass('he-100', 1000);
        if (stMoreBtn.attr('id') === 'see-more') {
          stMoreBtn.attr('id', 'see-less')
          stMoreBtn.html('See Less')
        } else {
          stMoreBtn.attr('id', 'see-more')
          stMoreBtn.html('See More...')
        }
      })

      fbMoreBtn.click(() => {
        fbItems.toggleClass('he-100', 1000);
        if (fbMoreBtn.attr('id') === 'see-more') {
          fbMoreBtn.attr('id', 'see-less')
          fbMoreBtn.html('See Less')
        } else {
          fbMoreBtn.attr('id', 'see-more')
          fbMoreBtn.html('See More...')
        }
      })


    })

  </script>

@endsection

@push('script_tag')
<script>
  $(document).ready(function(){

  });

  function get_swiper(ready_id)
  {
    var html = "";
    $.ajax({
      type: 'POST',
      url: '/get_swiper_photo_ready',
      data: {
        "_token": "{{csrf_token()}}",
        "ready_id": ready_id
      },
      success: function (data) {
        // start swiper
        console.log(data.readys.photo_one);
        if (data.readys.photo_two == null && data.readys.photo_three == null) {
          html += `<div class="d-lg-none">
            <img src="assets/images/categories/ready/${data.readys.photo_one}"/>
            </div>
          <div class="swiper mySwiper2 mb-3 d-none d-md-block" id="mySwiper2${data.readys.id}">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_one}"/>
                  </div>`;
          if (data.readys.photo_two != null) {
            html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_two}"/>
                  </div>`;
          }
          if (data.readys.photo_three != null) {
            html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_three}"/>
                  </div>`;
          }
          html += `
              </div>
          </div>

          `;
        } else {
          html +=
            `
          <div class="swiper mySwiper2 mb-3" id="mySwiper2${data.readys.id}">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_one}"/>
                  </div>`;
          if (data.readys.photo_two != null) {
            html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_two}"/>
                  </div>`;
          }
          if (data.readys.photo_three != null) {
            html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_three}"/>
                  </div>`;
          }
          html += `
              </div>
          </div>`
        }
        html += `
          <div thumbsSlider="" class="swiper mySwiper d-none d-md-block"
              id="mySwiper${data.readys.id}">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_one}"/>
                  </div>`;
        if (data.readys.photo_two != null) {
          html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_two}"/>
                  </div>`
        }
        if (data.readys.photo_three != null) {
          html += `
                  <div class="swiper-slide">
                      <img src="assets/images/categories/ready/${data.readys.photo_three}"/>
                  </div>`;
        }
        html += `
              </div>
          </div>
          `;
        $('#swiper-space' + ready_id).html(html);
        const swiper = new Swiper("#mySwiper" + ready_id, {
          // loop: true,
          spaceBetween: 10,
          slidesPerView: 4,
          freeMode: true,
          watchSlidesProgress: true,
        });
        const swiper2 = new Swiper("#mySwiper2" + ready_id, {
          loop: true,
          spaceBetween: 10,
          thumbs: {
            swiper: swiper,
          },
          breakpoints: {
            // when window width is >= 320px
            0: {
              slidesPerView: 1.7,
              spaceBetween: 15
            },
            769: {
              slidesPerView: 1,
              spaceBetween: 15
            },
          }
        });
        //end swiper
      }
    });
  }
  //add to cart ready to wear start
  function add_to_cart(user_id,value,name,price,photo,stock) {
    // alert(stock);
    console.log(user_id+"--"+value+"--"+name+"--"+photo+"--"+price);
    var total_price = price * 1 ;
    var eachsub = price * 1;
    var item={id:parseInt(user_id),item_id:parseInt(value),item_name:name,current_qty:stock,qty:1,price:price,photo:photo,each_sub:eachsub,type:'ready'};
    var total_amount = {id:parseInt(user_id),sub_total:total_price,total_qty:1};
    var mycart = localStorage.getItem('mycart');
    var grand_total = localStorage.getItem('grandTotal');
    if(mycart == null ){

      mycart = '[]';

      var mycartobj = JSON.parse(mycart);

      mycartobj.push(item);

      localStorage.setItem('mycart',JSON.stringify(mycartobj));

      }else{

      var mycartobj = JSON.parse(mycart);

      var hasid = false;

      $.each(mycartobj,function(i,v){

          if(v.item_id == value && v.id == user_id){

              hasid = true;

              v.qty = parseInt(1) + parseInt(v.qty);
              v.each_sub = parseInt(v.price) * parseInt(v.qty);
              // console.log(v.each_sub);
          }
      })

      if(!hasid){

          mycartobj.push(item);
      }

      localStorage.setItem('mycart',JSON.stringify(mycartobj));
      }
      //start total
      if(grand_total == null ){

        grand_total = '[]';

        var grand_total_obj = JSON.parse(grand_total);

        grand_total_obj.push(total_amount);

        localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));

        }else{

          var grand_total_obj = JSON.parse(grand_total);

        var hasid = false;

        $.each(grand_total_obj,function(i,v){

            if(v.id == user_id){

                hasid = true;

              v.sub_total = total_price + parseInt(v.sub_total);

              v.total_qty = parseInt(1) + parseInt(v.total_qty);
            }
        })
        // alert(hasid);
        if(!hasid){

          grand_total_obj.push(total_amount);
        }

        localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));
        }

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
        swal({
      title: "Success!",
      text: "Successfully Add to cart!",
      icon: "success",
    });
    $('.addi__modal').modal('hide');
  }

  //add to cart ready to wear end
</script>
@endpush
@push('whishlist-scripts-ready-to-wear')
<script>

$(document).ready(function(){
      getData();
      // whishlist();
      // deletedata();
    });
      function whishlist(user_id,id,photo_one,name,price){
				// alert('hello');
        var Item = {user_id:user_id,name:name,id:id,photo:photo_one,price:price};
        console.log(Item);
        // var itemArr;
        var loItem = window.localStorage.getItem(
          'Item'
        ); //String
        if (loItem == null) {
          itemArr = Array();
				}else{
					itemArr = JSON.parse(loItem);
				}
				var exist;
        $.each(itemArr,function(i,v){
          console.log(v.id);
					if (user_id == v.id) {
					v.qty = parseInt(1) +	parseInt(v.qty);
          console.log(v.qty);
						exist = 1;
					}
				})

        if (!exist) {
					itemArr.push(Item);
				}
        localStorage.setItem('Item',JSON.stringify(itemArr));
        // $("#heart"+id).toggleClass("bx-heart bxs-heart");
        // $("#heart"+id).hasClass("bxs-heart")?getData() :deleteData();
        $('#wishlist'+id).hide();
        $('#delete'+id).show();
        getData();
      }


      function deletedata(user_id,id,photo_one,name,price){
        // alert(`user_id = ${user_id}, id = ${id}, photo = ${photo_one}, name = ${name}, price = ${price}`);
				var loItem = window.localStorage.getItem('Item');
				// var removeItem = window.localStorage.getItem('Item','id');
        // alert(removeItem);
				var itemArr = JSON.parse(loItem);
        // var id = 0;
				//delete
				// itemArr.splice(0,1);
        var total_total = itemArr.filter(total=> total.id !== id);
				localStorage.setItem('Item',JSON.stringify(total_total));
        document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) - 1;
        $('#wishlist'+id).show();
        $('#delete'+id).hide();
        getData();
      }


      //remove item from ls
			function deleteData(user_id,id,photo_one,name,price) {

        	// alert(`user_id = ${user_id}, id = ${id}, photo = ${photo_one}, name = ${name}, price = ${price}`);
				var loItem = window.localStorage.getItem('Item');
				var removeItem = window.localStorage.getItem('Item','id');
        // alert(removeItem);
				var itemArr = JSON.parse(loItem);
        var id = 0;
				//delete
				itemArr.splice(0,1);
				localStorage.setItem('Item',JSON.stringify(itemArr));
        document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) - 1;


			}

      function getData(){
        var loItem = window.localStorage.getItem('Item');
        var arrayFromStroage = JSON.parse(localStorage.getItem('Item'));
        var arrayLength = arrayFromStroage.length;
        // var count = localStorage.length('Item');
        //  alert(arrayLength);
        var html = "";
        if (loItem != null) {

					itemArr = JSON.parse(loItem);
          $.each(itemArr,function(i,v){
            user_id = `@if(isset(Auth::guard('web')->user()->id))
            {{Auth::guard('web')->user()->id}}
            @endif`;
            // alert( window.userID )
          if(v.user_id == user_id)
          {
            // alert("right");
            // html += `${arrayLength}`;

          }else{
            // html += parse('0');
          }
        });
         html += `${arrayLength}`;
          $('#fav-space').html(html);


          // document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) + 1;

				}else{

				}
      }
  //start infinite scroll
  var style_arr = [];
  var texture_arr = [];
  var package_arr = [];
  var ENDPOINT = "{{ url('/') }}";
  var page = 1;
  var start = 0;
  var pageNo = 0;
  infinteLoadMore(page,style_arr,texture_arr,package_arr)
  $(window).scroll(function () {
    // alert("jfdkdf");
    if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 300)) {
      page++;
      start = (page * 6) - 6;
      // console.log('Page = ' + page);
      if (page <= 6) {
        infinteLoadMore(page,style_arr,texture_arr,package_arr);
      }
    }
  })
  function infinteLoadMore(page,style_arr,texture_arr,package_arr) {
    // alert("kfdjfdk");
    $.ajax({
      url: ENDPOINT + "/ready-to-wear?page=" + page,
      datatype: "html",
      type: "get",
      history: false,
      data: {
        "_token": "{{csrf_token()}}",
        "style_cate_name" : style_arr,
        "texture_id" : texture_arr,
        "package_id" : package_arr,
        "start" : start
      },
      beforeSend: function () {
        $('.auto-load').show();
      }
    })
      .done(function (response) {
        console.log(response.length);
        if (response.res.length == 0) {
          $('.auto-load').html("");
          return;
        }
        $('.auto-load').hide();

        $("#ready_space").append(response.res);
        // $("#grand_space").fadeIn(3000);
        // console.log("fade")
        // $("#myModal").modal()
      })
      .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log('Server error occured');
      });
  }
  //end infinite scroll

  function getstyle(value,value2,value3)
  {
    // alert("navvvvv");
    $('#ready_space').html("");
    var status = style_arr.includes(value);
    var tstatus = texture_arr.includes(value2);
    var pstatus = package_arr.includes(value3);
    // // alert(status)
    if(status == true)
    {
      let index_style = style_arr.indexOf(value);
      // alert(index_style)
      style_arr.splice(index_style,1)
    }
    else
    {
      if(value != 0)
      {
        style_arr.push(value);
      }
    }
    if(tstatus == true)
    {
      let index_texture = texture_arr.indexOf(value2);
      texture_arr.splice(index_texture,1)
    }
    else
    {
      if(value2 != 0)
      {
        texture_arr.push(value2);
      }
    }
    if(pstatus == true)
    {
      let index_package = package_arr.indexOf(value3);
      // alert(index_style)
      package_arr.splice(index_package,1)
    }
    else
    {
      if(value3 != 0)
      {
        package_arr.push(value3);
      }
    }
    var style_check = $('input[name="style_check"]:checked').val();

    if(style_arr.length != 0 || texture_arr.length != 0 || package_arr.length != 0)
    {
      page = 1;
      start = 0;
      infinteLoadMore(page,style_arr,texture_arr,package_arr);
  //   $.ajax({
  //     type: 'POST',
  //     url: '/get_style_for_ready_ajax',
  //     data: {
  //       "_token": "{{csrf_token()}}",
  //       "style_cate_name" : style_arr,
  //       "texture_id" : texture_arr,
  //       "package_id" : package_arr
  //     },
  //   success: function (data) {
  //       console.log(data.qty);
  //       var html = "";
  //       var i,j=0;
  //       // for(i=0;i<data.readys.length;i++)
  //       // {
  //       //   html +=`
  //       //       <div class="col-6 col-lg-4 ready__item">
  //       //         <div class="ready__item--img-group">
  //       //           <img src="{{asset('/assets/images/categories/ready/${data.readys[i].photo_one}')}}" alt="">
  //       //           <i class='bx bx-heart'></i>
  //       //         </div>
  //       //         <div class="ready__item--info">
  //       //           <p>${data.readys[i].name}</p>
  //       //           <p><strong>$ ${data.readys[i].price}</strong></p>
  //       //         </div>
  //       //       </div>
  //       //       `;
  //       // }
  //       //old start
  //       if(data.qty == 1)
  //       {
  //         for(i=0;i<data.readys.length;i++)
  //         {
  //           for(j=0;j<data.readys[i].length;j++)
  //           {
  //             html +=`
  //             <div class="col-6 col-lg-4 ready__item" data-bs-toggle="modal"
  //                data-bs-target="#myready${data.readys[i][j].id}" onclick="get_swiper(${data.readys[i][j].id})">
  //               <div class="ready__item--img-group">
  //                 <img src="{{asset('/assets/images/categories/ready/${data.readys[i][j].photo_one}')}}" alt="">
  //                 <i class='bx bx-heart'></i>
  //               </div>
  //               <div class="ready__item--info">
  //                 <p>${data.readys[i][j].name}</p>
  //                 <p><strong>$ ${data.readys[i][j].price}</strong></p>
  //               </div>
  //             </div>
  //             `;
  //           }
  //         }
  //       }
  //       else if(data.qty == 2)
  //       {
  //         for(i=0;i<data.readys.length;i++)
  //         {
  //           html +=`
  //           <div class="col-6 col-lg-4 ready__item" data-bs-toggle="modal"
  //              data-bs-target="#myready${data.readys[i].id}" onclick="get_swiper(${data.readys[i].id})">
  //             <div class="ready__item--img-group">
  //               <img src="{{asset('/assets/images/categories/ready/${data.readys[i].photo_one}')}}" alt="">
  //               <i class='bx bx-heart'></i>
  //             </div>
  //             <div class="ready__item--info">
  //               <p>${data.readys[i].name}</p>
  //               <p><strong>$ ${data.readys[i].price}</strong></p>
  //             </div>
  //           </div>
  //           `;
  //         }
  //       }

  //       // end start
  //       $('#ready_space').html(html);
  //   }
  // });
    }
    else
    {
      window.location.reload();
    }
  }
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
          if(v.user_id == user_id)
          {
            $('#wishlist'+v.id).hide();
            $('#delete'+v.id).show();
            // alert("right");
            // html += `${arrayLength}`;
            $('#fav-space').html(arrayLength);
          }else{
            html += parse('0');
          }
        });


          // document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) + 1;

				}else{

				}
    }
</script>
@endif
@endpush
