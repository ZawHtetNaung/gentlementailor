@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/faq.css ') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')

  <section class="faq">
    <h5 class="faq__title">Frequently ask questions</h5>
    <!--    <section class="faq__section">
          <p class="faq__section-title">Payments</p>
          <div class="row g-0 faq-item">
            <div class="faq__icon col-2">
              Q
            </div>
    &lt;!&ndash;        <div class="faq__items col-10 d-block">
              <div class="faq__section mt-0 mt-md-2 mb-3">
                <a href="#pay" class="faq__section-ques" data-bs-toggle="collapse">
                  What payments can we use to purchase at gentlemen?
                </a>

              </div>
              <div class="faq__ans">
                <div class="collapse" id="pay">
                  We accept Visa Card and PayPal Only .
                </div>
              </div>
            </div>&ndash;&gt;
            <div class="faq__item col-10 d-block">
              <div class="faq__item-ques">
                <p>What is JS ?</p>
                <i class='bx bxs-chevron-down'></i>
              </div>
              <div class="faq__item-ans">
                <p>We accept Visa Card and PayPal Only .</p>
              </div>
            </div>
          </div>

        </section>-->
      @foreach($faq_titles as $title => $question)
    <section class="faq__section">
      <p class="faq__section-title">{{$title}}</p>
      @foreach($question as $q => $answer)
      <div class="faq__item">
        <div class="row align-items-center mb- cursor-pointer">
          <div class="col-2 col-md-1">
            <div class="faq__icon col-2">
              Q
            </div>
          </div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ques">
              <p>{{$q}}</p>
              <i class='bx bxs-chevron-down'></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 col-md-1"></div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ans">
              @foreach($answer as $ans)
              <p>{{$ans->name}}</p>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- <div class="faq__item">
        <div class="row align-items-center mb-2">
          <div class="col-2 col-md-1">
            <div class="faq__icon col-2">
              Q
            </div>
          </div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ques">
              <p>What is JS ?</p>
              <i class='bx bxs-chevron-down'></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 col-md-1"></div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ans">
              <p>We accept Visa Card and PayPal Only .</p>
            </div>
          </div>
        </div>
      </div>
      <div class="faq__item">
        <div class="row align-items-center mb-2">
          <div class="col-2 col-md-1">
            <div class="faq__icon col-2">
              Q
            </div>
          </div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ques">
              <p>What is JS ?</p>
              <i class='bx bxs-chevron-down'></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 col-md-1"></div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ans">
              <p>We accept Visa Card and PayPal Only .</p>
            </div>
          </div>
        </div>
      </div> -->
    </section>
    @endforeach
    <!-- <section class="faq__section">
      <p class="faq__section-title">Payments</p>
      <div class="faq__item">
        <div class="row align-items-center mb-2">
          <div class="col-2 col-md-1">
            <div class="faq__icon col-2">
              Q
            </div>
          </div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ques">
              <p>What is JS ?</p>
              <i class='bx bxs-chevron-down'></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 col-md-1"></div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ans">
              <p>We accept Visa Card and PayPal Only .</p>
            </div>
          </div>
        </div>
      </div>
      <div class="faq__item">
        <div class="row align-items-center mb-2">
          <div class="col-2 col-md-1">
            <div class="faq__icon col-2">
              Q
            </div>
          </div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ques">
              <p>What is JS ?</p>
              <i class='bx bxs-chevron-down'></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 col-md-1"></div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ans">
              <p>We accept Visa Card and PayPal Only .</p>
            </div>
          </div>
        </div>
      </div>
      <div class="faq__item">
        <div class="row align-items-center mb-2">
          <div class="col-2 col-md-1">
            <div class="faq__icon col-2">
              Q
            </div>
          </div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ques">
              <p>What is JS ?</p>
              <i class='bx bxs-chevron-down'></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2 col-md-1"></div>
          <div class="col-10 col-md-11">
            <div class="faq__item-ans">
              <p>We accept Visa Card and PayPal Only .</p>
            </div>
          </div>
        </div>
      </div>
    </section> -->
  </section>

  @include('layouts/footer')
@endsection
@section('js')
  <script>

    const faqs = document.querySelectorAll(".faq__item");

    faqs.forEach(faq => {
      faq.addEventListener("click", () => {
        faq.classList.toggle("active");
      })
    })

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