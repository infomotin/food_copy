@php
    $banners = App\Models\Admin\Banner::latest()->limit(4)->get();
    // dd($banners);
@endphp
<section class="pt-5 pb-5 bg-white section homepage-add-section">
    <div class="container">
       <div class="row">
        @foreach ($banners as $banner)
        <div class="col-md-3 col-6">
            <div class="products-box">
               <a href="{{$banner->url}}"><img alt="" src="{{asset($banner->image)}}" class="rounded img-fluid"></a>
            </div>
         </div>
        @endforeach


       </div>
    </div>
 </section>
