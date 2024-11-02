@include('frontend.dashboard.header')



<section class="pt-5 pb-5 text-center breadcrumb-osahan bg-dark position-relative">
    <h1 class="text-white">Offers Near You</h1>
    <h6 class="text-white-50">Best deals at your favourite restaurants</h6>
</section>

<section class="pt-5 pb-5 section products-listing">
    <div class="container">
        <div class="row d-none-m">
            <div class="col-md-12">
                <div class="float-right dropdown">
                    <a class="btn btn-outline-info dropdown-toggle btn-sm border-white-btn" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by: <span class="text-theme">Distance</span> &nbsp;&nbsp;
                    </a>
                    <div class="border-0 shadow-sm dropdown-menu dropdown-menu-right ">
                        <a class="dropdown-item" href="#">Distance</a>
                        <a class="dropdown-item" href="#">No Of Offers</a>
                        <a class="dropdown-item" href="#">Rating</a>
                    </div>
                </div>
                @php
                    $count_restaurants = \App\Models\Client::count();
                @endphp
                <h4 class="mt-0 mb-3 font-weight-bold">OFFERS <small class="mb-0 ml-2 h6">{{ $count_restaurants }}
                        restaurants
                    </small>
                </h4>
            </div>
        </div>
        <div class="row">

            {{-- filter  --}}
            <div class="col-md-3">
                <div class="mb-4 bg-white rounded shadow-sm filters">

                    <div class="pt-3 pb-3 pl-4 pr-4 filters-header border-bottom">
                        <h5 class="m-0">Filter By</h5>
                    </div>
                    @php
                        $categories = App\Models\Admin\Category::orderBy('id', 'desc')->limit(10)->get();
                    @endphp
                    <div class="filters-body">
                        <div id="accordion">
                            <div class="p-4 filters-card border-bottom">
                                <div class="filters-card-header" id="headingOne">
                                    <h6 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Category <i class="float-right icofont-arrow-down"></i>
                                        </a>
                                    </h6>
                                </div>


                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        @foreach ($categories as $category)
                                            @php
                                                $categoryProductCount = $products
                                                    ->where('category_id', $category->id)
                                                    ->count();
                                            @endphp
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkboox" id="category-{{$category->id}}" data-type="category" data-id="{{ $category->id }}">
                                                <label class="custom-control-label"
                                                    for="category-{{$category->id}}">{{ $category->category_name }} <small
                                                        class="text-black-50">({{ $categoryProductCount }})</small>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                    @php
                        $cities = App\Models\City::orderBy('id', 'desc')->limit(10)->get();
                    @endphp
                    <div class="filters-body">
                        <div id="accordion">
                            <div class="p-4 filters-card border-bottom">
                                <div class="filters-card-header" id="headingOnecity">
                                    <h6 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse"
                                            data-target="#collapseOnecity" aria-expanded="true"
                                            aria-controls="collapseOnecity">
                                            City <i class="float-right icofont-arrow-down"></i>
                                        </a>
                                    </h6>
                                </div>


                                <div id="collapseOnecity" class="collapse show" aria-labelledby="headingOnecity"
                                    data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        @foreach ($cities as $city)
                                            @php
                                                $cityProductCount = $products->where('city_id', $city->id)->count();
                                            @endphp
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkboox" id="city-{{ $city->id }}" data-type="city" data-id="{{ $city->id }}">
                                                <label class="custom-control-label"
                                                    for="city-{{ $city->id }}">{{ $city->city_name }} <small
                                                        class="text-black-50">({{ $cityProductCount }})</small>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    @php
                        $menus = App\Models\Client\Menu::orderBy('id', 'desc')->limit(10)->get();
                    @endphp
                    <div class="filters-body">
                        <div id="accordion">
                            <div class="p-4 filters-card border-bottom">
                                <div class="filters-card-header" id="headingOnemenu">
                                    <h6 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse"
                                            data-target="#collapseOnemenu" aria-expanded="true"
                                            aria-controls="collapseOnemenu">
                                            Menu <i class="float-right icofont-arrow-down"></i>
                                        </a>
                                    </h6>
                                </div>


                                <div id="collapseOnemenu" class="collapse show" aria-labelledby="headingOnemenu"
                                    data-parent="#accordion">
                                    <div class="filters-card-body card-shop-filters">
                                        @foreach ($menus as $menu)
                                            @php
                                                $menuProductCount = $products->where('menu_id', $menu->id)->count();
                                            @endphp
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkboox" id="menu-{{ $menu->id }}" data-type="menu" data-id="{{ $menu->id }}" >
                                                <label class="custom-control-label"
                                                    for="menu-{{ $menu->id }}">{{ $menu->menu_name }} <small
                                                        class="text-black-50">({{ $menuProductCount }})</small>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="pt-2 filters">
                    <div class="bg-white rounded shadow-sm filters-body">
                        <div class="p-4 filters-card">
                            <div>
                                <div class="pt-0 filters-card-body card-shop-filters">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio"
                                            class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="customRadio1">Gold Partner</label>
                                    </div>
                                    <div class="mt-1 mb-1 custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Order Food
                                            Online</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio"
                                            class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="customRadio3">Osahan Eat</label>
                                    </div>
                                    <hr>
                                    <small class="text-success">Use code OSAHAN50 to get 50% OFF (up to $30) on first 5
                                        orders. T&Cs apply.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- filter End --}}
            {{-- product Strat    --}}
            <div class="col-md-9">
                <div class="mb-4 owl-carousel owl-carousel-category owl-theme list-cate-page">
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="{{ asset('frontend/img/list/1.png') }}" alt="American">
                                <h6>American</h6>
                                <p>156</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/2.png" alt="">
                                <h6>Pizza</h6>
                                <p>120</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/3.png" alt="">
                                <h6>Healthy</h6>
                                <p>130</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/4.png" alt="">
                                <h6>Vegetarian</h6>
                                <p>120</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/5.png" alt="">
                                <h6>Chinese</h6>
                                <p>111</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/6.png" alt="">
                                <h6>Hamburgers</h6>
                                <p>958</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/7.png" alt="">
                                <h6>Dessert</h6>
                                <p>56</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/8.png" alt="">
                                <h6>Chicken</h6>
                                <p>40</p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="osahan-category-item">
                            <a href="#">
                                <img class="img-fluid" src="img/list/9.png" alt="">
                                <h6>Indian</h6>
                                <p>156</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" id="product-list">
                    @foreach ($products as $key => $item)
                        <div class="pb-2 mb-4 col-md-4 col-sm-6">
                            <div class="overflow-hidden bg-white rounded shadow-sm list-card h-100 position-relative">
                                <div class="list-card-image">
                                    <div class="star position-absolute"><span class="badge badge-success"><i
                                                class="icofont-star"></i> 3.1
                                            (300+)
                                        </span></div>
                                    <div class="favourite-heart text-danger position-absolute"><a
                                            href="{{ route('restaurant.detail', $item->client->id) }}"><i
                                                class="icofont-heart"></i></a></div>
                                    <div class="member-plan position-absolute"><span
                                            class="badge badge-dark">Promoted</span></div>
                                    <a href="{{ route('restaurant.detail', $item->client->id) }}">
                                        <img src="{{ asset('upload/products/' . $item->image) }}"
                                            class="img-fluid item-img">
                                    </a>
                                </div>
                                <div class="p-3 position-relative">
                                    <div class="list-card-body">
                                        <h6 class="mb-1"><a
                                                href="{{ route('restaurant.detail', $item->client->id) }}"
                                                class="text-black">{{ $item->name }}</a>
                                        </h6>
                                        <p class="mb-3 text-gray">North Indian • American • Pure veg</p>
                                        <p class="mb-3 text-gray time"><span
                                                class="pt-1 pb-1 pl-2 pr-2 rounded-sm bg-light text-dark"><i
                                                    class="icofont-wall-clock"></i> 20–25 min</span> <span
                                                class="float-right text-black-50">
                                                {{ $item->price }}</span></p>
                                    </div>
                                    <div class="list-card-badge">
                                        <span class="badge badge-success">OFFER</span> <small>65% off | Use
                                            Coupon
                                            OSAHAN50</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="text-center col-md-12 load-more">
                        <button class="btn btn-primary" type="button" disabled>
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </div>
            </div>
            {{-- product Strat    --}}
        </div>
    </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.load-more').on('click', function() {
            console.log('hello');
        });
        $('.filter-checkboox').on('change', function() {
            var filters ={
                categories: [],
                menus: [],
                cities: [],
            };

            $('.filter-checkboox:checkbox').each(function() {
               
                    var type = $(this).data('type');
                    console.log(type);
                    var id = $(this).data('id');
                    console.log(id);
                    if(!filters[type + 's']) {
                        filters[type + 's'] = [];
                    }
                    filters[type + 's'].push(id);
                
            });

            
            // if ($(this).attr('data-type') == 'category') {
            //     filter.categories.push($(this).attr('data-id'));
            // }
            // if ($(this).attr('data-type') == 'city') {
            //     filter.cities.push($(this).attr('data-id'));
            // }
            // if ($(this).attr('data-type') == 'menu') {
            //     filter.menus.push($(this).attr('data-id'));
            // }
            console.log(filters);
            $.ajax({
                url:'{{ route('filter.products') }}',
                method:'GET',
                data:filters,
                success:function(respons) {
                    console.log(respons);
                    // $('#product-list').html(data);
                }
            })
        })
        
    })
</script>

@include('frontend.dashboard.footer')
