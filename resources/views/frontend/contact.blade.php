@extends('layouts.header')
@push('styles')
  <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endpush
@section('content')
  @include('layouts/nav')

  <div class="contact-wrapper">
    <div class="contact__us"
         style="background-image: url('{{asset("assets/images/contact/contact-bg.png")}}')">
      <div class="us__home d-none d-md-block">
        <a href="#">
          <i class='bx bx-left-arrow-alt'></i>Back to home
        </a>
      </div>
      <h1 class="us__heading">Contact Us</h1>
    </div>
    <div class="contact__form">
      <h2 class="form__title">Contact Us</h2>
      <div class="form__group">
        <label for="name" class="form__group-label">Name</label>
        <input type="text" id="name" class="form__group-input">
      </div>
      <div class="form__group">
        <label for="email" class="form__group-label">Email</label>
        <input type="text" id="email" class="form__group-input">
      </div>
      <div class="form__group">
        <label for="ph" class="form__group-label">Phone Number</label>
        <input type="text" id="ph" class="form__group-input">
      </div>
      <div class="form__group">
        <label for="message" class="form__group-label">Message</label>
        <textarea id="message" rows="2" class="form__group-input"></textarea>
      </div>
      <button type="submit" class="form__btn">Send</button>
    </div>
    <div class="contact__detail">
      <div class="detail__items">
        <div class="detail__item">
          <h3 class="detail__item-title">Address</h3>
          <p class="detail__item-desc">
            No. 1186, Pin Lon Road,35 Quarter, North-Dagon Township, Yangon.
          </p>
        </div>
        <div class="detail__item">
          <h3 class="detail__item-title">Contact</h3>
          <p class="detail__item-desc">
            <span>(+95) 9401409915</span>
            <span>info@gentlementailor.shop</span>
          </p>
          <div class="detail__social-wrapper">
            <a href="https://www.facebook.com/Gentlemensuitmm" target="_blank"><i class='bx
          bxl-facebook-circle'></i></a>
            <a href="https://www.messenger.com/t/107385955212078" target="_blank"><i class='bx
          bxl-messenger'></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('js')
  <script>
  </script>
@endsection
