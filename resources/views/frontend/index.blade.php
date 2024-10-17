@extends('frontend.master')
@section('content')
<section class="pt-5 pb-5 section products-section">
    <div class="container">
        <div class="text-center section-header">
            <h2>Popular Restaurants</h2>
            <p>Top restaurants, cafes, pubs, and bars in Ludhiana, based on trends</p>
            <span class="line"></span>
        </div>
        <div class="row">
            @php
            $restaurantsData = App\Models\Client::latest()->where('status','active')->limit(4)->get();
            // dd($restaurantsData);
            @endphp

            @foreach ( $restaurantsData as $restaurants)
            @php
            $products = App\Models\Client\Product::where('client_id',$restaurants->id)->limit(3)->get();
            $menusName = $products->map(function($item){
            return $item->menu->menu_name;
            });
            // $menuNames = implode('. ', $menusName);
            $menusName = $menusName->unique();
            if($menusName->count() > 1){
            $menusName = $menusName->implode('* ');
            }else{
            $menusName = $menusName->first();
            }
            //gat coupon data
            $coupons =
            App\Models\Coupon::where('client_id',$restaurants->id)->where('coupon_status',1)->orderBy('id')->first();
            // $couponsDiscount = $coupons->map(function($item){
            // return $item->coupon_discount;
            // });
            // $couponsName = $couponsDiscount->unique();
            // if($couponsDiscount->count() > 1){
            // $couponsDiscount = $couponsName->implode('* ');
            // }else{
            // $couponsDiscount = $couponsName->first();
            // }

            @endphp
            <div class="col-md-3">
                <div class="item pd-3">
                    <div class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i
                                        class="icofont-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i
                                        class="icofont-heart"></i></a></div>
                            @if ($coupons)
                            <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span>
                            </div>
                            @else
                            <div class="member-plan position-absolute"><span class="badge badge-pink">New</span>
                            </div>
                            @endif

                            <a href="#">
                                <img src="{{asset('/upload/clients/'.$restaurants->cover_photo)}}"
                                    class="img-fluid item-img" style="width: 300px; height: 200px;">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="detail.html" class="text-black">{{$restaurants->name}}</a>
                                </h6>
                                <p class="mb-3 text-gray">{{$menusName}}</p>
                                <p class="mb-3 text-gray time"><span
                                        class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                            class="icofont-wall-clock"></i> 20–25 min</span> <span
                                        class="float-right text-black-50"> $250 FOR TWO</span></p>
                            </div>
                            <div class="list-card-badge">
                                @if($coupons)
                                <span class="badge badge-success">OFFER</span> <small>{{$coupons->coupon_discount}} %
                                    off| Use Coupon:
                                    {{$coupons->coupon_code}}</small>
                                @else
                                    <span class="badge badge-success">NO OFFER</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>

@endsection
