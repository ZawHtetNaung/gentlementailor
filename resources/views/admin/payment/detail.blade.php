@extends('layouts.dashboard')
@section('title','Customer Order Detail')
@section('content')
 <div class="container-fluid">
   <div class="row">
      <div class="col-12">
         @foreach($orders as $order)
             @if($order->order)
               <h3>From Customize</h3>
             @else
                <h3>From Cart</h3>
             @endif
             <p>Pay Pal Account Name - {{ $order->pay_name}}</p>
             <p>Payer paypal Email - {{ $order->payer_email}}</p>
             <p>Order Id - {{ $order->order_id }}</p>
             <p>Status - {{ $order->status}}</p>
             <p>Totla Amount  - $ {{ $order->amount}}</p>
             <p>Currency  - {{ $order->currency}}</p>
             <p>Pay pal fee  - $ {{ $order->paypal_fee}}</p>
             @if($order->order)
                <p>Billing Address - {{ $order->order->address }}</p>
                <p>Shipping Price - $ {{ $order->order->shipping_price }}</p>
                <p>Shipping Country -  {{ $order->order->shipping->country }}</p>
             @else
                <p>Billing Address - {{ $order->cartOrder->address }}</p>
                <p>Total QTY - {{ $order->cartOrder->total_qty }}</p>
             @endif
             <hr>
             <div class="row border">
                @if($order->order != Null)
                   <div class="col-12 col-lg-4 border d-flex justify-content-center">
                      <div class="border">
                         <h1>Step -1</h1>
                         <h2>{{$order->order->CusCategory->name }}</h2>
                         <img src="{{ asset('/assets/images/customize_category/' . $order->order->CusCategory->file)}}" alt="" class="w-50">
                      </div>
                   </div>
                   <div class="col-12 col-lg-4 border d-flex justify-content-center">
                      <div class="border">
                         <h1>Step - 2</h1>
                         <h2>{{$order->order->Package->title }}</h2>
                         <img src="{{ asset('/frontend/package/' . $order->order->Package->photo)}}" alt="" class="w-50">
                      </div>
                   </div>
                   <div class="col-12 col-lg-4 border d-flex justify-content-center">
                      <div class="border">
                         <h1>Step - 3</h1>
                         <h2>{{$order->order->Style->name }}</h2>
                         <img src="{{ asset('/assets/images/categories/style/' . $order->order->Style->photo_one)}}" alt="" class="w-50">
                      </div>
                   </div>
    
                   <div class="row">
                      <div class="col-12">
                        <h1>Step - 4</h1>
                        <h3>STYLE CUSTOMIZATION</h3>
                        @switch($order->order->fitting)
                              @case($order->order->fitting == 1)
                              <span> - EXTRA SLIM FIT</span>
                                 @break
                              @case($order->order->fitting == 2)
                              <span> - SLIM FIT</span>
                                 @break
                              @case($order->order->fitting == 3)
                              <span> - REGULAR FIT</span>
                                 @break
                              @case($order->order->fitting == 4)
                              <span> - LOOSE FIT</span>
                                 @break
                              @default
                                 
                        @endswitch    
                        <hr>
                      </div>
                      {{-- ----------------------------- --}}
                      @if($order->order->Texture)
                         <div class="col-12 col-lg-3">
                            <div>
                            
                               <h4>Fabric</h4>
                               <h2>{{$order->order->Texture->name }}</h2>
                               <img src="{{ asset('/assets/images/categories/texture/' . $order->order->Texture->photo_one)}}" alt="" class="w-50">
                            </div>
                         </div>
                      @endif
    
                      @if($order->order->Pant)
                         <div class="col-12 col-lg-3">
                            <div>
                               <h4>Pants</h4>
                               {{-- <h2>{{$order->order->Pant->name }}</h2> --}}
                               <img src="{{ asset('/assets/images/customize/pant/' . $order->order->Pant->photo_one)}}" alt="" class="w-50">
                            </div>
                         </div>
                      @endif
    
                      @if($order->order->Jacket)
                         <div class="col-12 col-lg-3">
                            <div>
                               <h4>Jecket</h4>
                               {{-- <h2>{{$order->order->Pant->name }}</h2> --}}
                               <img src="{{ asset('/assets/images/customize/top/' . $order->order->Jacket->photo_one)}}" alt="" class="w-50">
                            </div>
                         </div>
                      @endif
    
                      @if($order->order->Vest)
                         <div class="col-12 col-lg-3">
                            <div>
                               <h1>{{$order->order->Vest->type}}</h1>
                               <img src="{{ asset('/assets/images/customize/shirt_button/' . $order->order->Vest->photo_one)}}" alt="" class="w-50">
                            </div>
                           
                         </div>
                      @endif

                     <hr>
                      <div class="col-12 p-3">
                         <h1>Step - 5</h1>
                         
                         @if($order->order->Upper)
                         <h1>Upper MEASUREMENTS</h1>
                            <p>Stomach -   {{$order->order->Upper->stomach}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Biceps -   {{$order->order->Upper->biceps}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Forearm -   {{$order->order->Upper->forearm}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Cuffs -   {{$order->order->Upper->cuffs}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Chest front -   {{$order->order->Upper->chest_front_width}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Chest Back -   {{$order->order->Upper->chest_back_width}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Jacket front length -   {{$order->order->Upper->jacket_front_length}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Chest -   {{$order->order->Upper->chest}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Waist -   {{$order->order->Upper->waist}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Hips -   {{$order->order->Upper->hips}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Shoulder -   {{$order->order->Upper->shoulder}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Sleeve length right -   {{$order->order->Upper->sleeve_length_right}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Sleeve length left -   {{$order->order->Upper->sleeve_length_left}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Vest length -   {{$order->order->Upper->vest_length}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Jacket_back_length -   {{$order->order->Upper->jacket_back_length}} {{ $order->order->Upper->measure_type}}</p>
                            <p>Neck -   {{$order->order->Upper->neck}} {{ $order->order->Upper->measure_type}}</p>
                         @endif
                         @if($order->order->Lower)
                         <h1>Lower MEASUREMENTS</h1>
                            <p>crotch -   {{$order->order->Lower->crotch}} {{ $order->order->Lower->measure_type}}</p>
                            <p>thighs -   {{$order->order->Lower->thighs}} {{ $order->order->Lower->measure_type}}</p>
                            <p>length -   {{$order->order->Lower->length}} {{ $order->order->Lower->measure_type}}</p>
                            <p>bottom -   {{$order->order->Lower->bottom}} {{ $order->order->Lower->measure_type}}</p>
                            <p>waist -   {{$order->order->Lower->waist}} {{ $order->order->Lower->measure_type}}</p>
                            <p>calf -   {{$order->order->Lower->calf}} {{ $order->order->Lower->measure_type}}</p>
                            <p>knees -   {{$order->order->Lower->knees}} {{ $order->order->Lower->measure_type}}</p>
                            <p>stomach -   {{$order->order->Lower->stomach}} {{ $order->order->Lower->measure_type}}</p>
                            <p>shorts -   {{$order->order->Lower->shorts}} {{ $order->order->Lower->measure_type}}</p>
                            <p>hips -   {{$order->order->Lower->hips}} {{ $order->order->Lower->measure_type}}</p>
                            
                         @endif
                      </div>
                      <div class="col-12 p-3">
                        <h1>User Info</h1>
                        <p>User Name - {{ $order->order->User->name}}</p>
                        <p> Email - {{ $order->order->User->email}}</p>
                        <p>Phone - {{ $order->order->User->phone}}</p>
                        <p>Dob - {{ $order->order->User->dob}}</p>
                        <p>Gender - {{ $order->order->User->gender}}</p>
                        <p>City - {{ $order->order->User->City}}</p>
                        <p>TownShip Street - {{ $order->order->User->tsp_street}}</p>
                        <p>Age - {{ $order->order->User->age}} years</p>
                        <p>Weight - {{ $order->order->User->weight}} {{$order->order->User->weight_type}}</p>
                        <p>Height Cm - {{ $order->order->User->height_cm}}</p>
                        <p>Height ft - {{ $order->order->User->height_ft}}</p>
                        <p>Height In - {{ $order->order->User->height_in}}  </p>
                        <p>Height Type {{$order->order->User->height_type}}</p>
                        <p>Shoulder Type - {{ $order->order->User->shoulder_type}}</p>
                        <p>Drop Shoulder - {{ $order->order->User->drop_shoulder}}</p>
                        <p>Arms Position - {{ $order->order->User->arms_position}}</p>
                        <p>Body Shape - {{ $order->order->User->body_shape}}</p>
                        <p>Neck type - {{ $order->order->User->neck_type}}</p>
                        <p>Stomach Shape - {{ $order->order->User->stomach_shape}}</p>
                        <p>Upper Body Shape - {{ $order->order->User->upper_body_shape}}</p>
                        <p>Pant line - {{ $order->order->User->pant_line}}</p>
                        <p>Seat - {{ $order->order->User->seat}}</p>
                     </div>
                   </div>
                @else
                   @foreach($order->products as $p)
                      <div class="col-12 col-lg-4">
                         <div>
                            @if(File::exists(public_path('assets/images/categories/additional/' . $p->photo)))
                            <img src="{{ asset('assets/images/categories/additional/' . $p->photo)}}" alt="" class="w-50">
                            @else
                            <img src="{{ asset('assets/images/categories/ready/' . $p->photo)}}" alt="" class="w-50">
                            @endif
                         </div>
                            <p>Product Name - {{ $p->item_name }}</p>
                            <p>qty - {{ $p->qty }}</p>
                            <p>price  - {{ $p->price }}</p>
                            <hr>
                      </div>
                   @endforeach
                @endif
    
             </div>
         @endforeach
      </div>
   </div>
 </div>
@endsection