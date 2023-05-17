<section id="step7" class="cus-2 custom text-center d-none">
  <h5 class="mb-5 ff-mont text-white ls-0 text-uppercase">
    Your order successfully comfirmed!
  </h5>
  <p class="mb-3">
    @if(!empty($user_info))
    Dear {{$user_info->name}} , thank you for your order !
    @endif
  </p>
  <p class="text-muted">
    We’ve received your order and will contact you as soon as your package is shipped.You can find
    your purchase information in your email .
  </p>

</section>

