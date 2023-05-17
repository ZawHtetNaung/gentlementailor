@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/customize.css') }}" rel="stylesheet">
  <link href="{{ asset('css/suit-tips.css') }}" rel="stylesheet">
  <link href="{{ asset('css/ready-to-wear.css') }}" rel="stylesheet">
  <link href="{{ asset('css/search-result.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')

  <section class="result">
    <h5>Search results</h5>
    <!-- <span class="result-total">30 results found</span> -->
    <!-- <div class="result-filter">
      <div class="d-flex align-items-center flex-column">
        <div>
          <div class="d-flex justify-content-start customize-fabric flex-wrap">
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Colour
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="red" name="colour">
                    <label class="form-check-label" for="red">red</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="green"
                           name="colour">
                    <label class="form-check-label" for="green">Green</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="white"
                           name="colour">
                    <label class="form-check-label" for="white">White</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="silver"
                           name="colour">
                    <label class="form-check-label" for="silver">Silver</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Fabrics Type
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pwool"
                           name="fabrics">
                    <label class="form-check-label" for="pwool">Pure Wool</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="cashmere"
                           name="fabrics">
                    <label class="form-check-label" for="cashmere">Cashmere</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="flannel"
                           name="fabrics">
                    <label class="form-check-label" for="flannel">Flannel</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="linen"
                           name="fabrics">
                    <label class="form-check-label" for="linen">linen</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="cotton"
                           name="fabrics">
                    <label class="form-check-label" for="cotton">cotton</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="tweet"
                           name="fabrics">
                    <label class="form-check-label" for="tweet">tweet</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="velvet"
                           name="fabrics">
                    <label class="form-check-label" for="velvet">velvet</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="seesucker"
                           name="fabrics">
                    <label class="form-check-label" for="seesucker">seesucker</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="rcarpet"
                           name="fabrics">
                    <label class="form-check-label" for="rcarpet">red carpet</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Length
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="plaids"
                           name="fabrics">
                    <label class="form-check-label" for="plaids">plaids</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="herringbone"
                           name="fabrics">
                    <label class="form-check-label" for="herringbone">herringbone</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="houndstooth"
                           name="fabrics">
                    <label class="form-check-label" for="houndstooth">houndstooth</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="donegal"
                           name="fabrics">
                    <label class="form-check-label" for="donegal">donegal</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pattern"
                           name="fabrics">
                    <label class="form-check-label" for="pattern">pattern</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Chest Size
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="plaids"
                           name="fabrics">
                    <label class="form-check-label" for="plaids">plaids</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="herringbone"
                           name="fabrics">
                    <label class="form-check-label" for="herringbone">herringbone</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="houndstooth"
                           name="fabrics">
                    <label class="form-check-label" for="houndstooth">houndstooth</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="donegal"
                           name="fabrics">
                    <label class="form-check-label" for="donegal">donegal</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pattern"
                           name="fabrics">
                    <label class="form-check-label" for="pattern">pattern</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Waist Size
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="plaids"
                           name="fabrics">
                    <label class="form-check-label" for="plaids">plaids</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="herringbone"
                           name="fabrics">
                    <label class="form-check-label" for="herringbone">herringbone</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="houndstooth"
                           name="fabrics">
                    <label class="form-check-label" for="houndstooth">houndstooth</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="donegal"
                           name="fabrics">
                    <label class="form-check-label" for="donegal">donegal</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pattern"
                           name="fabrics">
                    <label class="form-check-label" for="pattern">pattern</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="pe-3 mb-3">
              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle d-flex
          justify-content-center align-items-center text-uppercase"
                        data-bs-toggle="dropdown">
                  Price
                  <i class='bx bx-chevron-down ms-3'></i>
                </button>
                <ul class="dropdown-menu text-uppercase">
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="plaids"
                           name="fabrics">
                    <label class="form-check-label" for="plaids">plaids</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="herringbone"
                           name="fabrics">
                    <label class="form-check-label" for="herringbone">herringbone</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="houndstooth"
                           name="fabrics">
                    <label class="form-check-label" for="houndstooth">houndstooth</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="donegal"
                           name="fabrics">
                    <label class="form-check-label" for="donegal">donegal</label>
                  </li>
                  <li class="dropdown-item">
                    <input type="checkbox" class="form-check-input me-3 m-0" id="pattern"
                           name="fabrics">
                    <label class="form-check-label" for="pattern">pattern</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="fabric-filter">
              <button class="btn bg-gold rounded-0" onclick="advance_filter()"><a
                  href="#" class="text-navy text-uppercase">Start Filter</a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="ready__items row" id="ready_space">
     @foreach($texts as $text)
      <div class="col-6 col-md-4 col-lg-3 ready__item">
        <div id="tbody" class="ready__item&#45;&#45;img-group">
          <img src="{{'/assets/images/categories/ready/'. $text->photo_one}}" alt="">
          @if(isset(Auth::guard('web')->user()->id))
          <button id="wishlist{{$text->id}}" onclick="whishlist('{{Auth::guard('web')->user()->id}}','{{$text->id}}','{{$text->photo_one}}','{{$text->name}}','{{$text->price}}')">
          <i id="heart{{$text->id}}" class='bx bx-heart'></i>
          </button>
          <button id="delete{{$text->id}}" onclick="deletedata('{{Auth::guard('web')->user()->id}}','{{$text->id}}','{{$text->photo_one}}','{{$text->name}}','{{$text->price}}')" style="display: none;">
          <i id="heart{{$text->id}}" class='bx bxs-heart'></i>
          </button>
          @else
          <button type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"><i class='bx bx-heart'></i>
          </button>
        @endif
        </div>
        <div class="ready__item&#45;&#45;info">
          <p>{{$text->name}}</p>
          <p><strong>$ {{$text->price}}</strong></p>
        </div>
      </div>
      @endforeach
      <!-- <div class="col-6 col-md-4 col-lg-3 ready__item">
        <div class="ready__item&#45;&#45;img-group">
          <img src="{{asset("assets/images/ready/ready-2.png")}}" alt="">
          <i class='bx bx-heart'></i>
        </div>
        <div class="ready__item&#45;&#45;info">
          <p>Suit Name</p>
          <p><strong>$ 479</strong></p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3 ready__item">
        <div class="ready__item&#45;&#45;img-group">
          <img src="{{asset("assets/images/ready/ready-3.png")}}" alt="">
          <i class='bx bx-heart'></i>
        </div>
        <div class="ready__item&#45;&#45;info">
          <p>Suit Name</p>
          <p><strong>$ 479</strong></p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3 ready__item">
        <div class="ready__item&#45;&#45;img-group">
          <img src="{{asset("assets/images/ready/ready-2.png")}}" alt="">
          <i class='bx bx-heart'></i>
        </div>
        <div class="ready__item&#45;&#45;info">
          <p>Suit Name</p>
          <p><strong>$ 479</strong></p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3 ready__item">
        <div class="ready__item&#45;&#45;img-group">
          <img src="{{asset("assets/images/ready/ready-3.png")}}" alt="">
          <i class='bx bx-heart'></i>
        </div>
        <div class="ready__item&#45;&#45;info">
          <p>Suit Name</p>
          <p><strong>$ 479</strong></p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3 ready__item">
        <div class="ready__item&#45;&#45;img-group">
          <img src="{{asset("assets/images/ready/ready-2.png")}}" alt="">
          <i class='bx bx-heart'></i>
        </div>
        <div class="ready__item&#45;&#45;info">
          <p>Suit Name</p>
          <p><strong>$ 479</strong></p>
        </div>
      </div>
      <div class="col-6 col-md-4 col-lg-3 ready__item">
        <div class="ready__item&#45;&#45;img-group">
          <img src="{{asset("assets/images/ready/ready-3.png")}}" alt="">
          <i class='bx bx-heart'></i>
        </div>
        <div class="ready__item&#45;&#45;info">
          <p>Suit Name</p>
          <p><strong>$ 479</strong></p>
        </div>
      </div> -->
    </div>
  </section>

  @include('layouts/footer')
@endsection
@section('js')
  <script>
     $(document).ready(function(){
      getData();
      // whishlist();
      // deletedata();
    });
    function search() {
      var text = $('#search-input').val();
      console.log(text);
      $.ajax({
        method:"Get",
        url: "{{route('ajex_search')}}",
        cache:false,
        dataType:"json",
        data: {text: $('#search-input').val()},
        success: function(data) {
        
          console.log(data);
          $(document).ready(function(){
            var search_results = '';
            // var j_data = JSON.parse(data);
            $.each(data, function(i,v){


              var name = v.name;
              var price = v.price;
              var photo = v.photo_one;
              console.log(v.name);
              
              
              search_results += `<div class="col-6 col-md-4 col-lg-3 ready__item">
                          <div class="ready__item&#45;&#45;img-group">
                            <img src="{{'/assets/images/categories/ready/${photo}'}}" alt="">
                            <i class='bx bx-heart'></i>
                          </div>
                          <div class="ready__item&#45;&#45;info">
                            <p>${name}</p>
                            <p><strong>$'${price}'</strong></p>
                          </div>
                        </div>`

              })
              $('#ready_space').html(search_results);
          })
        }
      })
    }

    
      function whishlist(user_id,id,photo_one,name,price){
				// alert(`user_id = ${user_id}, id = ${id}, photo = ${photo_one}, name = ${name}, price = ${price}`);
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
        user_id = `@if(isset(Auth::guard('web')->user()->id))
            {{Auth::guard('web')->user()->id}}
            @endif`
        var loItem = window.localStorage.getItem('Item',user_id);
        var arrayFromStroage = JSON.parse(localStorage.getItem('Item'));
        // alert (loItem);
        var arrayLength = arrayFromStroage.length;
        // var count = localStorage.length('Item');
        //  alert(arrayLength);
        var html = "";
        if (loItem != null) {
         
					itemArr = JSON.parse(loItem);
          $.each(itemArr,function(i,v){
          
            // alert( window.userID )
          if(v.user_id == user_id)
          { 
            alert("hello");
            $('#wishlist'+v.id).hide();
            $('#delete'+v.id).show();
            // alert("right");
            
            
          }else{
          //  html += parse('0');
          }
        });
         html += `${arrayLength}`;
          $('#fav-space').html(html);
          // document.getElementById('fav-space').innerHTML = parseInt(document.getElementById('fav-space').innerHTML) + 1;
					
				}else{

				}
      }

    
      

      </script>
@endsection
@push('whishlist-nav')
@if(isset(Auth::guard('web')->user()->id))
<script>
    $(document).ready(function(){
      getnavData();
      // whishlist();
      // deletedata();
    });
    function getnavData(){
        var user_id = `{{Auth::guard('web')->user()->id}}`;
        var loItem = window.localStorage.getItem('Item');
        var arrayFromStroage = JSON.parse(localStorage.getItem('Item'));
        var arrayLength = arrayFromStroage.length;
        // var count = localStorage.length('Item');
        //  alert(arrayLength);
        var html = "";
        if (loItem != null) {
         
					itemArr = JSON.parse(loItem);
          var user = itemArr.includes(user_id);
          // alert(user)
          $.each(itemArr,function(i,v){
            user_id = `{{Auth::guard('web')->user()->id}}`;
            // var user = parseInt(v.user_id);
            // var acc = user.length;
            // console.log(user);
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