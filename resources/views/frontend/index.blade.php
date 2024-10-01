
@extends('frontend.master')
@section('content')
<section class="pt-5 pb-5 bg-white section homepage-add-section">
    <div class="container">
       <div class="row">
          <div class="col-md-3 col-6">
             <div class="products-box">
                <a href="listing.html"><img alt="" src="{{asset('frontend/img/pro1.jpg')}}" class="rounded img-fluid"></a>
             </div>
          </div>
          <div class="col-md-3 col-6">
             <div class="products-box">
                <a href="listing.html"><img alt="" src="{{asset('frontend/img/pro2.jpg')}}" class="rounded img-fluid"></a>
             </div>
          </div>
          <div class="col-md-3 col-6">
             <div class="products-box">
                <a href="listing.html"><img alt="" src="{{asset('frontend/img/pro3.jpg')}}" class="rounded img-fluid"></a>
             </div>
          </div>
          <div class="col-md-3 col-6">
             <div class="products-box">
                <a href="listing.html"><img alt="" src="{{asset('frontend/img/pro4.jpg')}}" class="rounded img-fluid"></a>
             </div>
          </div>
       </div>
    </div>
 </section>
 @endsection
