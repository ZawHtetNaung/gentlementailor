<section id="step4" class="cus-2 cus-steps-spacing d-none">
  {{-- <input type="text" style="color:black" id="step2_and_fabric_total"> --}}
  <section class="row g-0 my-5 mx-3 mx-md-5 px-0 px-md-2">
    <!-- <div class="col-1 d-flex align-items-center">
    <a href="/customize" class="me-3 pt-1"><i class='bx bx-arrow-back'></i></a>
    </div> -->
    <div class="col-7 mx-0 mx-md-auto d-flex align-items-center d-md-block">
      <h6 class="text-uppercase text-white text-start text-md-center text-wrap ff-mont mb-0
        fabric-filter-text" id="cfTitle">Fitting</h6>
    </div>
    <div class="col-4 three_four_price d-block d-md-none text-end">
      <span class="me-3 text-gold fs-5">$</span><h4
              class="d-inline ff-mont fabric-filter-text" id=""><span>0</span></h4>
    </div>
  </section>

  <section>
    <section class="cus-4-wrapper">
      <div class="circle-wrapper">
          <a href="#fitting" class="box center-flex box-select">Fitting</a>
          <a href="#fabric" class="box center-flex">Fabric</a>
          <a href="#jacket" id="cus1_jacket" class="box center-flex">JACKETS</a>
          <a href="#vest" id="cus1_vest" class="box center-flex">VESTS</a>
          <a href="#pant" id="cus1_pant" class="box center-flex">Pants</a>
      </div>
      <div class="main-content">
        @include('layouts/choose_fitting')
        @include('layouts/choose_fabric')
        @include('layouts/choose_vest')
        @include('layouts/choose_pants')
        @include('layouts/choose_jacket')
      </div>
      <div class="summery">
        <div class="three_four_price d-none d-md-block final-price">
          <span class="me-1 text-gold fs-5">$</span><h4 class="d-inline ff-mont ls-0"
                                                        id="step2_and_fabric_total">100</h4>
        </div>
        <div class="action action-next">
          <a href="#" class="btn bg-gold lh-sm text-navy text-uppercase rounded-0" id="next">Next Step</a>
        </div>
      </div>
    </section>

  </section>

</section>
<script>
    // $(document).ready(function(){
    //   alert("wewewew");
    //   calculate_step4();
    //   // $('#jacket_in').hide();
    //   // $('#jacket_in').addClass('d-none');
    // })

</script>



